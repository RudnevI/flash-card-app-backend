<?php

namespace Database\Factories;


use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{


    public function definition(): array
    {
        return [
            'name' => 'Capitals',
            'exp' => 0,
            'profile_id' => Profile::factory()->create()
        ];
    }
}
