<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends \CloudinaryLabs\CloudinaryLaravel\Model\Media
{
    // we did made this custom media class that ovveride cloudinary's
    //to allow usage of factory for the model
    //and possibly add more features for the model in the future
    use HasFactory;

    public static function fromCloudinaryUploadresponse(CloudinaryEngine $response_file): self
    {

        $media = new Media;
        $media->file_name = $response_file->getFileName();
        $media->file_url = $response_file->getSecurePath();
        $media->size = $response_file->getSize();
        $media->file_type = $response_file->getFileType();

        return $media;
    }

    protected $table = 'media';
}
