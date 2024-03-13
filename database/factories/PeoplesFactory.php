<?php

namespace Database\Factories;

use App\Models\Peoples;
use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeoplesFactory extends Factory
{
    protected $model = Peoples::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'birth_date' => $this->faker->date(),
            'photo' => 'photo/default.jpg',
            'school_class_id' => SchoolClass::get()->random()->id,
        ];
    }
}
