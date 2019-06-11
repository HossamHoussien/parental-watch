<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Tutor;
use Faker\Generator as Faker;

$factory->define(Tutor::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'name' => $faker->name,
        'about' => $faker->realText(),
        'avatar' => $faker->imageUrl(),
        'address' => $faker->address,
        'city' => $faker->city,

        'phone' => $faker->phoneNumber,
        'gender'  => $faker->randomElement(['m', 'f']),
        'age' => $faker->numberBetween(18, 70),
        'education' => $faker->realText(),
        'subject' => $faker->word,
        'experience' => $faker->realText(),
        'email' => $faker->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});