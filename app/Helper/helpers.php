<?php
use Illuminate\Support\Facades\File;

if(!function_exists('uploadImage')){
    function uploadImage ($file, $path = null) {
        if($path == null){
            $folderPath = public_path('upload/product/');
            $compressfolderPath = public_path('upload/product/compress/');
            $compressfolderMedPath = public_path('upload/product/med-compress/');
        }else{
            $folderPath = public_path($path);
            $compressfolderPath = public_path('upload/product/compress/');
            $compressfolderMedPath = public_path('upload/product/med-compress/');
        }
        $image_parts = explode(";base64,", $file);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath.$imageName;
        if(File::isDirectory($folderPath)){
            file_put_contents($imageFullPath, $image_base64);
        } else {
            File::makeDirectory($folderPath, 0777, true, true);
            file_put_contents($imageFullPath, $image_base64);
        }

        if(File::isDirectory($compressfolderPath)){
            compressImage($file,$imageFullPath,$compressfolderPath.$imageName,0.05);
        } else {
            File::makeDirectory($compressfolderPath, 0777, true, true);
            compressImage($file,$imageFullPath,$compressfolderPath.$imageName,0.05);
        }

        if(File::isDirectory($compressfolderMedPath)){
            compressImage($file,$imageFullPath,$compressfolderMedPath.$imageName,0.25);
        } else {
            File::makeDirectory($compressfolderMedPath, 0777, true, true);
            compressImage($file,$imageFullPath,$compressfolderMedPath.$imageName,0.25);
        }

        if($path == null){
            return '/upload/product/'.$imageName;
        }else{
            return $path.$imageName;
        }

    }
}
if(!function_exists('fn_resize')){
    function fn_resize($image_resource_id, $width, $height,$qulaity)
    {

        if($width >= 800){
            $target_width = $width * $qulaity;
            $target_height = $height * $qulaity;
        }else{
            $target_width = $width;
            $target_height = $height;
        }

        $target_layer = imagecreatetruecolor($target_width, $target_height);
        imagecopyresampled($target_layer, $image_resource_id, 0, 0, 0, 0, $target_width, $target_height, $width, $height);
        return $target_layer;
    }
}
if(!function_exists('compressImage')){
    function compressImage($file,$imageFullPath,$imageDestinationPath,$qulaity){
        $source_properties = getimagesize($imageFullPath);
        $image_type = $source_properties[2];

        if ($image_type == IMAGETYPE_JPEG) {
            $image_resource_id = imagecreatefromjpeg($file);
            $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1],$qulaity);
            imagejpeg($target_layer, $imageDestinationPath);
        } elseif ($image_type == IMAGETYPE_GIF) {
            $image_resource_id = imagecreatefromgif($file);
            $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1],$qulaity);
            imagegif($target_layer, $imageDestinationPath);
        } elseif ($image_type == IMAGETYPE_PNG) {
            $image_resource_id = imagecreatefrompng($file);
            $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1],$qulaity);
            imagepng($target_layer,  $imageDestinationPath);
        }
    }
}

if(!function_exists('insertAtPosition')){
    function insertAtPosition($string,$med=null) {

        if($string != null){
            $stringArr = explode('/',$string);
            $stringArr[3] = $stringArr[2];

            if($med == null){
                $stringArr[2] = 'compress';
            }else{
                $stringArr[2] = $med.'-compress';
            }
            return implode('/',$stringArr);
        }else{
            return $string;
        }
    }
}

if(!function_exists('isValidUrl')){
    function isValidUrl($url){
        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            return true;
        } else {
            return false;
        }
    }
}


if(!function_exists('pusherCredentials')){
    function pusherCredentials($key){
        $pusher = [
                'id' => '1387883',
                'key' => 'e73e6b100edacfb69dc4',
                'secret' => '0b750d9e56ccc50e28cd',
                'cluster' => 'mt1',
        ];

        return $pusher[$key];
    }
}

?>
