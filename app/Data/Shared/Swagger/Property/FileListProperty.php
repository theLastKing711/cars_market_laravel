<?php

namespace App\Data\Shared\Swagger\Property;

use OpenApi\Attributes as OAT;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY | \Attribute::TARGET_PARAMETER | \Attribute::TARGET_CLASS_CONSTANT | \Attribute::IS_REPEATABLE)]
class FileListProperty extends OAT\Property
{
    public function __construct()
    {
        parent::__construct(
            type: 'array',
            items: new OAT\Items(type: 'string', format: 'binary'),
            // format: 'binary',
        );
    }
}
