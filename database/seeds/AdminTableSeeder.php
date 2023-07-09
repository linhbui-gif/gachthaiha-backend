<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\Administrator::where('email', 'loilinh1990@gmail.com')->first();

        if (empty($admin)) {
            factory(\App\Models\Administrator::class)->create([
                'name' => 'Admin',
                'email' => 'loilinh1990@gmail.com'
            ]);
        }
    }
}
