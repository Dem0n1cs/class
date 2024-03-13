<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peoples extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'photo',
        'school_class_id'
    ];

    protected function PhotoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => asset('storage/' . $this->photo)
        );
    }
}
