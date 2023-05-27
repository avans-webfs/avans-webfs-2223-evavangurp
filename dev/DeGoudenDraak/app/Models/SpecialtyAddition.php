<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpecialtyAddition extends Model
{
    use HasFactory;

    public function specialties(): HasMany
    {
        return $this->hasMany(Specialty::class);
    }
}
