<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\Main\Config\MainUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\Main\Config\MainUserCreatedMail;
use App\Mail\Main\Config\MainUserResetPasswordMail;


class MainUserHelper
{

    static function setUserpassword(MainUser $utilizador, $account, $new = null)
    {
        $password = bin2hex(openssl_random_pseudo_bytes(4));

        MainUser::withoutEvents(function () use ($utilizador, $password) {
            $utilizador->update(['password' => $password]);
        });

        if ($new) {
            Mail::to($utilizador->email)->send(new MainUserCreatedMail($utilizador, $password, $account));
        } else {
            Mail::to($utilizador->email)->send(new MainUserResetPasswordMail($utilizador, $password, $account));
        }
    }

    public static function saveAvatar(String $avatar, $account)
    {
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $avatar));
        $filename = 'user_' . rand() . '-' . now()->timestamp . '.png';
        Storage::disk('clientes')->put("$account/users/" . $filename, $data);

        $imagick = new \Imagick();
        $imagick->readImageBlob($data);
        $imagick->scaleImage(48, 48, true);
        $cropImage = $imagick->getimageblob();

        Storage::disk('images')->put('clientes/min-' . $filename, $cropImage);

        return $filename;
    }

    public static function deleteFile(String $filename, $account)
    {
        Storage::disk('clientes')->delete("$account/users/" . $filename);
        Storage::disk('images')->delete('clientes/min-' . $filename);
    }
}
