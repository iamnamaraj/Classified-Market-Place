<?

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
        $text = $file->extension();

        //Get File Type
        $type = $file->getMimeType();

        //File path and folder
        $folderpath = "pulic/" . $folder;
        $filePath = str::random(10) . "." . $text;

        //Save File to disk
        $file->storeAs($folderpath, $filePath);

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
