<?php

namespace Database\Factories;


use App\Models\Profile;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends AbstractFactory
{
    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->currentModel = new \App\Models\Collection();
    }

    public function definition(): array
    {
        $result =  parent::definition();
        $result += ['profile_id' => Profile::factory()->create()];
        return $result;

    }

}
