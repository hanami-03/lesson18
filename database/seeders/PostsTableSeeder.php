<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $userName = Auth::user()->name;
    DB::table('posts')->insert([
        'user_name' => $userName,
        'contents' => '1つ目の投稿です',
    ]);
    }
}
