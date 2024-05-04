<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\DB;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user){
            $data = [
                [
                    'nomer' => '(+62) 82273002691',
                    'linkwa' => 'https://wa.link/d3lnje',
                    'kontak_id' => $user->id,
                    'slug' => '082273002691',
                    "created_at" => now(),
                    "updated_at" => now(),
                    "email" => 'dpkteknik@gmail.com',
                    "sekret" => 'Kontrakan Bung Raka'
                ]
            ];
            foreach ($data as $item) {
                DB::table('kontaks')->insert($item);
            }
        }
    }
}
