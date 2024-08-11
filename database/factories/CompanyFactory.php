<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->company;
        $code = strtoupper(substr(preg_replace('/[^A-Z]/', '', $name), 0, 3)); // Generate code based on the company name
        
        return [
            'name' => $name,
            'code' => $code,
            'alamat' => $this->faker->address,
            'npwp' => $this->faker->numerify('##.###.###.#-###.###'),
            'bpjs' => $this->faker->numerify('#############'),
            'nama_bank' => $this->faker->randomElement(['Bank A', 'Bank B', 'Bank C']),
            'nama_akun' => $this->faker->name,
            'no_rekening' => $this->faker->bankAccountNumber,
        ];
    }
}
