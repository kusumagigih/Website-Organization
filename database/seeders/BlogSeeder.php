<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = DB::table('users')->insertGetID([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $data = [
            [
                'title' => 'Beep beep boop tu',
                'content' => 'Blog pertama ini seru\nSangat seru',
                'slug' => 'beep-beep-boop-tu',
                'image' => 'https://picsum.photos/id/10/400/400',
                'author_id' => $id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ], 
            [
                'title' => 'Beep beep boop wa',
                'content' => 'Blog kedua Sangat seru\nSeru sangat',
                'slug' => 'beep-beep-boop-wa',
                'image' => 'https://picsum.photos/id/20/400/400',
                'author_id' => $id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]
        ];
            foreach ($data as $item) {
                DB::table('blogs')->insert($item);
            }
    }
}
