<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker = Faker::create('bg_BG');

        foreach (range(1, 100) as $index) {

            \DB::table('patients')->insert([

                'name' => explode(' ', $faker->name)[0],
                'species' => $faker->randomElement(['Куче', 'Котка', 'Птичка', 'Змия', 'Зайче', 'Морско свинче', 'Кон', 'Крава']),
                'color' => $faker->randomElement(['кафяв', 'черен', 'бял', 'оранжев', 'шарен', 'зелен', 'бежов']),
                'birthday' => $faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
                'gender' => $faker->randomElement(['женско', 'мъжко']),
                'weight' => mt_rand(1, 50) / 10,
            ]);

        }
    }
}
