<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class MediaService
{
    public function upload(UploadedFile $file, string $folder = "uploads", string $name = ""): int
    {
        // Get File Name
        if (empty($name)) {
            $name = Str::slug($file->getClientOriginalName());
        }


        //Get File Extension
        $ext = $file->extension();

        //Get File Type
        $type = $file->getMimeType();

        //File path and folder
        $folderPath = "public/" . $folder;
        $filePath = str::random(10) . "." . $ext;

        //Save File to disk
        $file->storeAs($folderPath, $filePath);

        //Record uploaded file in Media Table
        $media = Media::create([
            'name' => $name,
            'path' => $folder . "/" . $filePath,
            'type' => $type,
        ]);
        //Media ID Retrurn
        return $media->id;
    }
}

