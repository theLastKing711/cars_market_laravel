<?php

namespace App\Data\Shared\Media;

use App\Models\Media;
use CloudinaryLabs\CloudinaryLaravel\Model\Media as ModelMedia;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class DeletableMediaData extends Data
{
    public function __construct(
        #[OAT\Property()]
        public string $file_url,
        #[OAT\Property()]
        public string $public_id,
    ) {}

    public static function fromModel(?Media $media): self
    {

        return new self(
            file_url: $media->file_url,
            public_id: $media->file_name
        );
    }
}
