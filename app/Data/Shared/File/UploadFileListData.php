<?php

namespace App\Data\Shared\File;

use App\Data\Shared\Swagger\Property\ArrayProperty;
use Illuminate\Http\UploadedFile;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class UploadFileListData extends Data
{
    /** @param UploadedFile[] $files */
    public function __construct(
        #[ArrayProperty(UploadedFile::class)]
        /** @var UploadedFile[] */
        public array $files,
    ) {}
}
