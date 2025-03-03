<?php

namespace App\Http\Controllers\User\Car;

use App\Data\Shared\File\UploadFileListData;
use App\Data\Shared\File\UploadFileResponseData;
use App\Data\Shared\Media\DeletableMediaData;
use App\Data\Shared\Swagger\Request\FormDataRequestBody;
use App\Data\Shared\Swagger\Response\SuccessListResponse;
use App\Data\User\Car\PathParameters\CarIdPathParameterData;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Media as ModelsMedia;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use CloudinaryLabs\CloudinaryLaravel\Model\Media;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use OpenApi\Attributes as OAT;

#[
    OAT\PathItem(
        path: '/users/cars/{id}/images',
        parameters: [
            new OAT\PathParameter(
                ref: '#/components/parameters/usersCarIdPathParameterData',
            ),
        ],
    ),
]
class UpdateCarOfferImagesController extends Controller
{

    #[OAT\Patch(path: '/users/cars/{id}/images', tags: ['usersCars'])]
    #[FormDataRequestBody(UploadFileListData::class)]
    #[SuccessListResponse(DeletableMediaData::class, 'Files uploaded successfully')]
    public function __invoke(UploadFileListData $uploadFileData, CarIdPathParameterData $request_path_data)
    {

        $request_car_id =
            $request_path_data
                ->id;

        $car = Car::query()->firstWhere('id', $request_car_id);

        Log::info('hello world');

        $files = $uploadFileData->files;

        $car->detachMedia();

        /** @var Collection<int, Media> $new_media_to_add*/
        $new_media_to_add = collect([]);

        /** @var Collection<int, Media> $uploaded_medias */
        $uploaded_medias_data = $files->map(
            function ($file) use ($new_media_to_add) {

                Log::info(
                    'accessing FileController with files {files}',
                    ['files' => $file]
                );

                $file_path = $file->getRealPath();

                $response = Cloudinary::upload($file_path, [
                    'eager' => [ //list of transformation objects -> https://cloudinary.com/documentation/transformation_reference
                        [
                            'width' => 500,
                            // 'height' => 500,
                            'crop' => 'pad',
                        ],
                    ],
                ]);

                $uploaded_media = ModelsMedia::fromCloudinaryUploadResponse($response);

                $new_media_to_add->push($uploaded_media);

                return new DeletableMediaData(
                    file_url: $uploaded_media->file_url,
                    public_id: $response->getPublicId()
                );
            }
        );

        $car->medially()->saveMany($new_media_to_add);

        return $uploaded_medias_data;

    }
}
