<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        factory(App\User::class, 100)->create([]);
        App\User::create([
            'givenName' => "Ala",
            'familyName' => "Ala",
            'email' => "ala@example.com",
            'email_verified_at' => now(),
            'password' => "pw-123456",
            'remember_token' => str_random(10),
            'sex' => "male",
        ]);
    }

}
