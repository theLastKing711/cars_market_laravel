<?php

namespace App\Models;

use App\Enum\Language;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Eloquent;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Laravel\Scout\Searchable;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name_ar
 * @property int $is_new_car
 * @property string $
 * @property string|null $year_manufactured
 * @property int|null $car_color
 * @property string|null $description
 * @property int $car_price
 * @property int $car_sell_currency
 * @property int|null $fuel_type
 * @property int|null $car_sell_location
 * @property int|null $is_car_shippable_to_a_different_city
 * @property int $car_import_type
 * @property int $car_label_origin
 * @property int|null $transmission
 * @property int $miles_travelled_in_km
 * @property int|null $has_tuf_check_passed
 * @property int|null $user_has_legal_car_papers
 * @property int|null $faragha_jahzeh
 * @property int $is_tajrobeh
 * @property int $is_sold
 * @property int $is_recommended
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Data\Shared\ModelwithPivotCollection<\App\Models\User,\Illuminate\Database\Eloquent\Relations\Pivot> $favourited_by_users
 * @property-read int|null $favourited_by_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Media> $medially
 * @property-read int|null $medially_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShippableToCity> $shippable_to
 * @property-read int|null $shippable_to_count
 *
 * @method static \Database\Factories\CarFactory factory($count = null, $state = [])
 * @method static Illuminate\Database\Eloquent\Builder<static> joinRelationship(string $relations, \Closure(Illuminate\Database\Query\JoinClause $join)|array $join_callback_or_array)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car newQuery()
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByLeftPowerJoins(string|array<string, \Illuminate\Contracts\Database\Query\Expression> $column)
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByLeftPowerJoinsCount(string $column, string|null $order)
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByPowerJoins(string|array<string, \Illuminate\Contracts\Database\Query\Expression> $column)
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByPowerJoinsAvg(string $column, string|null $order)
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByPowerJoinsCount(string $column, string|null $order)
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByPowerJoinsMax(string $column, string|null $order)
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByPowerJoinsMin(string $column, string|null $order)
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByPowerJoinsSum(string $column, string|null $order)
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByPowerLeftJoinsAvg(string $column, string|null $order)
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByPowerLeftJoinsMax(string $column, string|null $order)
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByPowerLeftJoinsMin(string $column, string|null $order)
 * @method static Illuminate\Database\Eloquent\Builder<static> orderByPowerLeftJoinsSum(string $column, string|null $order)
 * @method static Illuminate\Database\Eloquent\Builder<static> powerJoinHas(string $relations, mixed operater, mixed value)
 * @method static Illuminate\Database\Eloquent\Builder<static> powerJoinWhereHas(string $relations, \Closure(Illuminate\Database\Query\JoinClause $join)|array $join_callback_or_array)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarImportType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarLabelOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarSellCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarSellLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereFaraghaJahzeh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereFuelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereHasTufCheckPassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereIsCarShippableToADifferentCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereIsNewCar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereIsRecommended($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereIsSold($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereIsTajrobeh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereManufacturerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereManufacturerNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereManufacturerNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereMilesTravelledInKm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereTransmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereUserHasLegalCarPapers($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereYearManufactured($value)
 *
 * @property int|null $is_faragha_jahzeh
 * @property int $is_kassah
 * @property int $is_khalyeh
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereIsFaraghaJahzeh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereIsKassah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereIsKhalyeh($value)
 *
 * @mixin Eloquent
 */
class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory, MediaAlly, Searchable;

    public function medially(): MorphMany
    {
        return $this->morphMany(Media::class, 'medially');
    }

    /**
     * Get the user that owns the Car
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the shippable_to for the Car
     */
    public function shippable_to(): HasMany
    {
        return $this->hasMany(ShippableToCity::class);
    }

    /**
     * The favourited_by_users that belong to the Car
     */
    public function favourited_by_users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_favourites_cars');
    }

    protected function nameAr(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['car_name_language_when_uploaded'] === Language::EN
                 ?
                 $attributes['name_ar']
                 :
                 $attributes['name_en']
        );
    }

    public function scopeIsNotSold($query): Builder
    {
        return $query->where('is_sold', false);
    }

    // #[SearchUsingFullText(['model', 'description'])]
    public function toSearchableArray(): array
    {

        $index_attributes_array = [
            'user_id' => $this->user_id,
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,
            'car_price' => $this->car_price,
            'year_manufactured' => $this->year_manufactured,
            'fuel_type' => $this->fuel_type,
            'car_label_origin' => $this->car_label_origin,
            'fuel_type' => $this->fuel_type,
            'miles_travelled_in_km' => $this->miles_travelled_in_km,
            'user_has_legal_car_papers' => $this->user_has_legal_car_papers,
            'is_new_car' => $this->is_new_car,
            'is_faragha_jahzeh' => $this->is_faragha_jahzeh,
            'is_kassah' => $this->is_kassah,
            'is_khalyeh' => $this->is_khalyeh,
            'car_import_type' => $this->car_import_type,
        ];

        // $index_attributes_array['manufacturer_id'] =
        //     $this->Manufacturer->id; // foriegn key, it works but its not needed here

        // load shippable city to this remote table(cars) index
        $index_attributes_array['city'] =
            $this->shippable_to
                ->map(function ($data) {
                    return $data['city'];
                });

        $index_attributes_array['favourited_by_users'] =
            $this->favourited_by_users
                ->map(function ($data) {
                    return $data['id'];
                });

        return $index_attributes_array;
    }

    // /**
    //  * Modify the collection of models being made searchable.
    //  */
    // public function makeSearchableUsing(Collection $models): Collection
    // {
    //     return $models->load('shippable_to');
    // }

    // add to remote search index if it does return true
    public function shouldBeSearchable()
    {
        $is_car_not_sold = ! $this->is_sold;

        return $is_car_not_sold;
    }
}
