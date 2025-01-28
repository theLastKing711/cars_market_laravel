<?php

use App\Enum\Auth\RolesEnum;
use App\Http\Controllers\FileController;
use App\Http\Controllers\User\Car\CarOfferDetailsController;
use App\Http\Controllers\User\Car\CreateCarOfferController;
use App\Http\Controllers\User\Car\FavouriteCarController;
use App\Http\Controllers\User\Car\SearchCarOfferController;
use App\Http\Controllers\User\Car\SellCarController;
use Illuminate\Support\Facades\Route;

Route::prefix('files')
    ->middleware(['api'])
    ->group(function () {
        Route::get('', [FileController::class, 'index']);
        Route::post('', [FileController::class, 'store']);
        Route::post('many', [FileController::class, 'storeMany']);
    });

Route::prefix('admin')
    ->middleware(['api'])
    ->group(function () {
        $adminRole = RolesEnum::ADMIN->value;

        Route::middleware(['auth:sanctum', "role:{$adminRole}"])
            //auth:sanctum check if user is logged in (middleware('auth')),
            ->group(function () {

                Route::prefix('tests')
                    ->group(function () {});

            });

    });

Route::prefix('users')
    ->middleware(['api'])
    ->group(function () {

        Route::prefix('auth')->group(function () {
            // Route::post('signup', SignUpController::class);
            // Route::post('login', UserLoginController::class);
            // Route::post('logout', UserLogoutController::class);
        });

        $userRole = RolesEnum::USER->value;

        //sanctum middleware
        //allows Auth::user->id to return value for user and id in controller
        // Route::middleware(['auth:sanctum', "role:{$userRole}"])
        Route::middleware([])
            ->group(function () {
                Route::prefix('cars')->group(function () {
                    Route::post('', CreateCarOfferController::class);
                    Route::get('', SearchCarOfferController::class);
                    Route::post('favourite/{id}', FavouriteCarController::class);
                    Route::post('', CreateCarOfferController::class);
                    Route::get('/{id}', CarOfferDetailsController::class);
                    Route::patch('users/cars/sell/{id}', SellCarController::class);
                });
            });
    });
