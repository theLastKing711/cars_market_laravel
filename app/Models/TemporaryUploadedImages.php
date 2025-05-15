<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Workbench\App\Models\User;

class TemporaryUploadedImages extends Model
{
    /** @use HasFactory<\Database\Factories\TemporaryUploadedImagesFactory> */
    use HasFactory;

    /**
     * Get the user that owns the TemporaryUploadedImages
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function fromCloudinaryUploadResponse(CloudinaryEngine $response_file, int $user_id): self
    {

        $response =
            $response_file
                ->getResponse();

        // first transformed file
        $first_eager_response =
            $response['eager'][0];

        // $media->file_url = $response_file->getSecurePath();
        // $media->size = $first_eager_response->getSize();

        $media = new TemporaryUploadedImages;
        $media->user_id = $user_id;
        $media->file_name = $response_file->getFileName();
        $media->file_url = $first_eager_response['secure_url'];
        $media->size = $first_eager_response['bytes'];
        $media->file_type = $response_file->getFileType();

        return $media;
    }
}
