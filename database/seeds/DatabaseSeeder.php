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
        // $this->call(UsersTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(SpecialistsTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(TextsTableSeeder::class);
        $this->call(SocialsTableSeeder::class);

    }
}
