<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Laravel\Scout\Searchable;

/**
 * 
 *
 * @property int $id
 * @property int $model_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Model $Model
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
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereUpdatedAt($value)
 * @property int $manufacturer_id
 * @property int $user_id
 * @property int $is_new_car
 * @property string $model
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
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarImportType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarLabelOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarSellCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCarSellLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereFaraghaJahzeh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereFuelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereHasTufCheckPassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereIsCarShippableToADifferentCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereIsNewCar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereIsTajrobeh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereManufacturerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereMilesTravelledInKm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereTransmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereUserHasLegalCarPapers($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereYearManufactured($value)
 * @property-read \App\Models\Manufacturer $Manufacturer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Media> $medially
 * @property-read int|null $medially_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShippableToCity> $shippable_to
 * @property-read int|null $shippable_to_count
 * @mixin Eloquent
 */
class Car extends Eloquent
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory, MediaAlly;

    use Searchable;

    protected $guarded = ['id'];

    public function medially(): MorphMany
    {
        return $this->morphMany(Media::class, 'medially');
    }

    /**
     * Get the User that owns the Car
     */
    public function Model(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Manufacturer that owns the Car
     */
    public function Manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    /**
     * Get all of the shippable_to for the Car
     */
    public function shippable_to(): HasMany
    {
        return $this->hasMany(ShippableToCity::class);
    }

    // #[SearchUsingFullText(['model', 'description'])]
    public function toSearchableArray(): array
    {
        return [
            'model' => $this->model,
            'description' => $this->name,
        ];

        // Customize the data array...

        return $array;
    }
}
