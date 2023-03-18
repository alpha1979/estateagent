<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['beds', 'baths', 'area', 'city', 'code', 'street', 'postcode', 'price'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'by_user_id'
        );
    }

    public function scopeMostRecent(Builder $query): Builder
    {
        return $query->orderByDesc('created_at');
    }

    public function scopeFilterParam(Builder $query, array $filters)
    {
        return $query
            ->when(
                $filters['priceFrom'] ?? false,
                fn ($listings, $value) => $listings->where('price', '>=', $value)
            )
            ->when(
                $filters['priceTo'] ?? false,
                fn ($listings, $value) => $listings->where('price','<=', $value)
            )
            ->when(
                $filters['beds'] ?? false,
                fn ($listings, $value) => $listings->where('beds', '<=', $value < 6 ? $value : 10)
            )
            ->when(
                $filters['baths'] ?? false,
                fn ($listings, $value) => $listings->where('baths','<=',  $value < 6 ? $value : 10)
            )
            ->when(
                $filters['areaFrom'] ?? false,
                fn ($listings, $value) => $listings->where('area','>=', $value)
            )
            ->when(
                $filters['areaTo'] ?? false,
                fn ($listings, $value) => $listings->where('area','<=', $value)
            );
    }
}
