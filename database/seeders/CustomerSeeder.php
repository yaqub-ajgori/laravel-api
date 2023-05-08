<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Customer::factory()
            ->count(25)
            ->create()
            ->each(function (\App\Models\Customer $customer) {
                $customer->invoices()->saveMany(\App\Models\Invoice::factory()->count(10)->make());
            });

        \App\Models\Customer::factory()
            ->count(100)
            ->create(['type' => 'business'])
            ->each(function (\App\Models\Customer $customer) {
                $customer->invoices()->saveMany(\App\Models\Invoice::factory()->count(5)->make());
            });

        \App\Models\Customer::factory()
            ->count(100)
            ->create(['type' => 'individual'])
            ->each(function (\App\Models\Customer $customer) {
                $customer->invoices()->saveMany(\App\Models\Invoice::factory()->count(3)->make());
            });


        \App\Models\Customer::factory()
            ->count(5)
            ->create();
    }
}
