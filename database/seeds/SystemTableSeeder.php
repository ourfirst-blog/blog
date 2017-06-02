<?php

use Illuminate\Database\Seeder;

class SystemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system')->insert([
            'key' => 'title',
            'value' => '青春博客系列',
        ]);
    }
}
