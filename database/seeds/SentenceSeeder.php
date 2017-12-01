<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class SentenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('make:sentences', ['--userId' => 1]);
    }
}
