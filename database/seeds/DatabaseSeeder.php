<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SocialNetworkSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SentenceSeeder::class);
    }
}
