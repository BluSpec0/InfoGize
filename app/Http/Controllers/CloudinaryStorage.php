<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CloudinaryStorage extends Controller
{
    private const folder_avatar = 'avatar';
    private const folder_product = 'produk';

    public static function path($path){
        return pathinfo($path, PATHINFO_FILENAME);
    }

    public static function uploadAvatar($image, $filename){
        $newFilename = str_replace(' ', '_', $filename);
        $public_id = date('Y-m-d_His').'_'.$newFilename;
        $result = cloudinary()->upload($image, [
            "public_id" => self::path($public_id),
            "folder"    => self::folder_avatar
        ])->getSecurePath();

        return $result;
    }

    public static function uploadProduct($image, $filename){
        $newFilename = str_replace(' ', '_', $filename);
        $public_id = date('Y-m-d_His').'_'.$newFilename;
        $result = cloudinary()->upload($image, [
            "public_id" => self::path($public_id),
            "folder"    => self::folder_product
        ])->getSecurePath();

        return $result;
    }

    public static function replaceAvatar($path, $image, $public_id){
        self::deleteAvatar($path);
        return self::uploadAvatar($image, $public_id);
    }

    public static function deleteAvatar($path){
        $public_id = self::folder_avatar.'/'.self::path($path);
        return cloudinary()->destroy($public_id);
    }

    public static function replaceProduct($path, $image, $public_id){
        self::deleteProduct($path);
        return self::uploadProduct($image, $public_id);
    }

    public static function deleteProduct($path){
        $public_id = self::folder_product.'/'.self::path($path);
        return cloudinary()->destroy($public_id);
    }
}