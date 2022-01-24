<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CotizacionFactory extends Factory
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
            'codigo' => $this->faker->numerify(),
            'descripcion' => $this->faker->text(),
            'estado' => $this->faker->name(),
        ];
    }
}
