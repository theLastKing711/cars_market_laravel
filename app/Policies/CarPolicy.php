<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarPolicy
{
    // /**
    //  * Determine whether the user can view any models.
    //  */
    // public function viewAny(User $user): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can view the model.
    //  */
    // public function view(User $user, Car $car): bool
    // {
    //     return false;
    // }

    /**
     * Determine whether the user can create models.
     */
    public function upload(User $user): Response
    {
        return
            $user
                ->max_number_of_car_upload
                >
                0
            ?
            Response::allow()
            :
            Response::denyWithStatus(
                403,
                'عدد السيارات المسموح تحميلها استنفذ, يرجى شحن الحساب.عدد السيارات المسموح تحميلها استنفذ, يرجى شحن الحساب.'
            );
    }

    // /**
    //  * Determine whether the user can update the model.
    //  */
    // public function update(User $user, Car $car): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can delete the model.
    //  */
    // public function delete(User $user, Car $car): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, Car $car): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Car $car): bool
    // {
    //     return false;
}
