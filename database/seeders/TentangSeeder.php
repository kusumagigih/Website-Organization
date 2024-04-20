<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\DB;

class TentangSeeder extends Seeder
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
                    'nama' => 'RB Moh Raka Pratama Putra',
                    'kaderisasi' => 'Kaderisasi Tingkat Dasar 2022',
                    // 'record' => 'Kepala Depertemen HIMATIF FT-UTM 2022',
                    'slug' => 'Bung-Raka',
                    'image' => 'https://picsum.photos/id/55/400/400',
                    'tentang_id' => $user->id, // gunakan $user->id untuk mendapatkan ID pengguna
                    "created_at" => now(), // menggunakan helper now() untuk mendapatkan timestamp saat ini
                    "updated_at" => now(),
                ],
                [
                    'nama' => 'Mycel Ndruru',
                    'kaderisasi' => 'Kaderisasi tingkat dasar 2023',
                    'slug' => 'Bung-Mycel',
                    'image' => 'https://picsum.photos/id/66/400/400',
                    'tentang_id' => $user->id, // gunakan $user->id untuk mendapatkan ID pengguna
                    "created_at" => now(),
                    "updated_at" => now(),
                ]
            ];

            // Masukkan data ke dalam tabel tentangs untuk setiap pengguna
            foreach ($data as $item) {
                DB::table('tentangs')->insert($item);
            }
        }
    }
}
