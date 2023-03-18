<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['beds', 'baths', 'area', 'city', 'code', 'street', 'postcode', 'price'];

    public function owner()
    {
        return $this->belongsTo(
            User::class,
            'by_user_id'
        );
    }
}
