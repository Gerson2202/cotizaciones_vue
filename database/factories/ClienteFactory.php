<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'tiempo_camioneta' => $this->faker->text(),
        ];
    }
}
