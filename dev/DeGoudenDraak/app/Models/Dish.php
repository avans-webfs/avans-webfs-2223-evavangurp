<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dish extends Model
{
    use HasFactory;

    protected $guarded = ['$id'];

    public function specialties(): BelongsToMany
    {
        return $this->belongsToMany(Specialty::class, 'dish_in_specialty');
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'dish_in_order');
    }

    public function dishType(): BelongsTo
    {
        return $this->belongsTo(DishType::class);
    }
}
