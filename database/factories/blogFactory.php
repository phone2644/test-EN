<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\blog>
 */
class blogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->name(), //เสกชื่อขึ้นมา (สุ่ม)
            'content'=>fake()->text(),
            'status'=>rand(0,1) //สุ่มเลข 0-1
        ];
    }
}
