<?php

use App\Enum\Auth\RolesEnum;
use App\Http\Controllers\FileController;
use App\Http\Controllers\User\Auth\CreatePasswordController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\VerifyPasswordController;
use App\Http\Controllers\User\Car\CarOfferDetailsController;
use App\Http\Controllers\User\Car\CreateCarOfferController;
use App\Http\Controllers\User\Car\DeleteCarOfferController;
use App\Http\Controllers\User\Car\FavouriteCarController;
use App\Http\Controllers\User\Car\getUpdateCarOfferController;
use App\Http\Controllers\User\Car\GetUserMaxCarUploadController;
use App\Http\Controllers\User\Car\SearchCarOfferController;
use App\Http\Controllers\User\Car\SearchMyCarController;
use App\Http\Controllers\User\Car\SearchMyFavouriteCarsController;
use App\Http\Controllers\User\Car\SellCarController;
use App\Http\Controllers\User\Car\UpdateCarOfferController;
use App\Http\Controllers\User\Car\UpdateCarOfferImagesController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

Route::prefix('files')
    ->middleware(['api'])
    ->group(function () {
        Route::get('', [FileController::class, 'index']);
        Route::post('', [FileController::class, 'store']);
        Route::post('many', [FileController::class, 'storeMany']);
        Route::delete('{public_id}', [FileController::class, 'delete']);
    });

// Route::prefix('admin')
//     ->middleware(['api'])
//     ->group(function () {
//         $adminRole = RolesEnum::ADMIN->value;

//         Route::middleware(['auth:sanctum', "role:{$adminRole}"])
//             // auth:sanctum check if user is logged in (middleware('auth')),
//             ->group(function () {

//                 Route::prefix('tests')
//                     ->group(function () {});

//             });

//     });

Route::prefix('users')
    ->middleware(['api'])
    ->group(function () {

        Route::prefix('auth')->group(function () {
            Route::post('register', RegisterController::class);
            Route::post('create-password', CreatePasswordController::class);
            Route::post('verify-password', VerifyPasswordController::class);

            // Route::post('login', UserLoginController::class);
            // Route::post('logout', UserLogoutController::class);
        });

        $userRole = RolesEnum::USER->value;

        // sanctum middleware
        // allows Auth::user->id to return value for user and id in controller
        // Route::middleware(['auth:sanctum', "role:{$userRole}"])

        // // Route::middleware(['auth:sanctum'])

        // // ->prefix('cars')
        // // ->group(function () {
        // Route::post('', CreateCarOfferController::class);

        // // });

        Route::prefix('cars')->group(function () {
            Route::get('maxCarUpload', GetUserMaxCarUploadController::class);
            Route::get('searchMyFavouriteCars', SearchMyFavouriteCarsController::class);
            Route::get('updateDetails/{id}', getUpdateCarOfferController::class);
            Route::patch('sell/{id}', SellCarController::class);
            Route::patch('{id}/favourite', FavouriteCarController::class);
            Route::post('', CreateCarOfferController::class);
            // ->can('upload', Car::class);
            Route::post('{id}/images', UpdateCarOfferImagesController::class);
            Route::get('searchMyCars', SearchMyCarController::class);
            Route::get('', SearchCarOfferController::class);
            Route::get('{id}', CarOfferDetailsController::class);
            Route::patch('{id}', UpdateCarOfferController::class);
            Route::delete('{id}', DeleteCarOfferController::class);

        });

    });
