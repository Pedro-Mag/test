<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Module;


class AdminClienteHelper
{

    public static function saveImage(String $image)
    {
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));
        $filename = 'cliente_' . rand() . '-' . now()->timestamp . '.png';
        Storage::disk('images')->put('admin/' . $filename, $data);

        $imagick = new \Imagick();
        $imagick->readImageBlob($data);
        $imagick->scaleImage(48, 48, true);
        $cropImage = $imagick->getimageblob();

        Storage::disk('images')->put('admin/min-' . $filename, $cropImage);

        return $filename;
    }

    public static function deleteFile(String $filename)
    {
        Storage::disk('images')->delete('admin/' . $filename);
        Storage::disk('images')->delete('admin/min-' . $filename);
    }

    public static function checkDataBase($database)
    {
        $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME =  ?";
        $db = DB::select($query, [$database]);
        if (!empty($db)) return true;

        return false;
    }


    public static function toggleChilds($adminCliente, $childsModules, $value) {
        foreach($childsModules as $child) {
            if($value) {
                $adminCliente->modules()->attach($child);
            } else {
                $adminCliente->modules()->detach($child);
            }

            if ($child->childModules) self::toggleChilds($adminCliente, $child->childModules, $value);
        }
    }

    public static function toggleParent($adminCliente, $modulo, $value)
    {

        $parent = Module::parent($modulo->parent_id)->first();

        if(!is_null($parent)) {
            $adminCliente->modules()->attach($parent);
            self::toggleParent($adminCliente, $parent, $value);
        }
    }
}
