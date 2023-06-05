<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Specialty extends Model
{
    use HasFactory;
    protected $guarded = ['$id'];
    
    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class, 'dish_in_specialty');
    }
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'specialty_in_order');
    }

    public function addition(): BelongsTo
    {
        return $this->belongsTo(SpecialtyAddition::class);
    }
}
