<?php

if (!function_exists('imageUploadHelper')) {
    function imageUploadHelper(\Illuminate\Http\UploadedFile $image, $directoryName): string
    {
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path($directoryName), $imageName);
        return public_path($directoryName) . "\\" . $imageName;
    }
}
