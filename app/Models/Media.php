<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends \CloudinaryLabs\CloudinaryLaravel\Model\Media
{
    protected $table = 'media';

    // we did made this custom media class that ovveride cloudinary's
    //to allow usage of factory for the model
    //and possibly add more features for the model in the future
    use HasFactory;

    public static function fromCloudinaryUploadResponse(CloudinaryEngine $response_file): self
    {

        $response =
            $response_file
                ->getResponse();

        $first_eager_response =
            $response['eager'][0];

        $media = new Media;
        $media->file_name = $response_file->getFileName();
        // $media->file_url = $response_file->getSecurePath();
        // $media->file_url = $response_file->getSecurePath();
        $media->file_url = $first_eager_response['secure_url'];
        // $media->size = $first_eager_response->getSize();
        $media->size = $first_eager_response['bytes'];
        $media->file_type = $response_file->getFileType();

        return $media;
    }
}
