<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['paid', 'billed', 'void']);

        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(1000, 100000),
            'status' => $status,
            'paid_date' => $status == 'paid' ? $this->faker->dateTimeBetween('-1 year') : null,
            'billed_date' => $status == 'billed' ? $this->faker->dateTimeBetween('-1 year') : null,

        ];
    }
}
