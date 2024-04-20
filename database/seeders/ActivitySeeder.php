<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua pengguna
        $users = User::all();
        
        // Looping melalui setiap pengguna
        foreach ($users as $user) {
            $data = [
                [
                    'title' => 'Beep beep',
                    'content' => 'ini informasi kegiatan ke satu',
                    'slug' => 'beep-beep',
                    'image' => 'https://picsum.photos/id/50/400/400',
                    'activity_id' => $user->id, // gunakan $user->id untuk mendapatkan ID pengguna
                    "created_at" => now(), // menggunakan helper now() untuk mendapatkan timestamp saat ini
                    "updated_at" => now(),
                ], 
                [
                    'title' => 'Beep boop',
                    'content' => 'ini informasi kegiatan kedua',
                    'slug' => 'beep-boop',
                    'image' => 'https://picsum.photos/id/60/400/400',
                    'activity_id' => $user->id, // gunakan $user->id untuk mendapatkan ID pengguna
                    "created_at" => now(),
                    "updated_at" => now(),
                ]
            ];
            
            // Masukkan data ke dalam tabel activities untuk setiap pengguna
            foreach ($data as $item) {
                DB::table('activities')->insert($item);
            }
        }
    }
}
