<?php
namespace Database\Factories;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\Factories\Factory;

abstract class AbstractFactory extends Factory {

    protected AbstractModel $currentModel;


    public function definition(): array
    {

        $result = [];

        foreach ($this->currentModel->getTextFields() as $textField) {
            $result+=[$textField => $this->faker->word()];
        }

        foreach ($this->currentModel->getNumericFields() as $numericField) {
            $result+=[$numericField => $this->faker->numberBetween(0, 100)];
        }

        return $result;
    }


}
