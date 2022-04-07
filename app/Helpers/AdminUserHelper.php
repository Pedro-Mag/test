<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class AdminUserHelper
{

    public static function saveAvatar(String $avatar)
    {
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $avatar));
        $filename = 'user_' . rand() . '-' . now()->timestamp . '.png';
        Storage::disk('admin')->put('users/' . $filename, $data);

        $imagick = new \Imagick();
        $imagick->readImageBlob($data);
        $imagick->scaleImage(48, 48, true);
        $cropImage = $imagick->getimageblob();

        Storage::disk('images')->put('admin/min-' . $filename, $cropImage);

        return $filename;
    }

    public static function deleteFile(String $filename)
    {
        Storage::disk('admin')->delete('users/' . $filename);
        Storage::disk('images')->delete('admin/min-' . $filename);
    }
}
