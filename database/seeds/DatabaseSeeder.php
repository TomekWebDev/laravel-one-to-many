<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                PostSeeder::class,
                CategorySeeder::class,
                TagSeeder::class // l'ordine con cui li scrivo è importante a seconda delle relazioni della tabella
            ]
        );
    }
}
