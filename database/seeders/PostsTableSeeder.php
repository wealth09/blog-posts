<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert(

         [
            [
                'title' => 'Post One',
                'body' => 'This is the body of post one. Read through carefully',
                'image_path' => 'Empty',
                'user_id' => 1

             ],


            [
                'title' => 'Post Two',
                'body' => 'This is the body of post two. Read through carefully',
                'image_path' => 'Empty',
                'user_id' => 1

            ],

            [
                'title' => 'Post Three',
                'body' => 'This is the body of post Three. Read through carefully',
                'image_path' => 'Empty',
                'user_id' => 1

            ],

         ]
    );

    }
}
