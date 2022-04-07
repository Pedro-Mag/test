<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class serveAssetsController extends Controller
{

    public function image($clienteDomain, $folder, $file)
    {
        $this->checkImage($file);

        $exists = Storage::disk('clientes')->exists("$clienteDomain/$folder/$file");


        if(!$exists) abort(404);

        $path = Storage::disk('clientes')->get("$clienteDomain/$folder/$file");

        $response = Response::make($path, 200);
        $response->header("Content-Type", 'image/png');

        return $response;
    }

    private function checkImage($file)
    {
        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'svg'];

        $explodeImage = explode('.', $file);
        $extension = end($explodeImage);

        if (in_array($extension, $imageExtensions)) {
            return true;
        } else {
            abort(404);
        }
    }
}
