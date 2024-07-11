<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $divisions = ["HR", "Finance", "Marketing", "IT", "Operations"];
        $names = [
            "Adi", "Budi", "Cici", "Dedi", "Evi", "Fani", "Gina", "Hani", "Iwan", "Joko",
            "Kiki", "Lia", "Maya", "Nina", "Oki", "Pipit", "Qori", "Rini", "Sari", "Tina",
            "Umi", "Vivi", "Wulan", "Xena", "Yani", "Zaki", "Bayu", "Dewi", "Rudi", "Siti"
        ];

        for ($i = 0; $i < 30; $i++) {
            DB::table('karyawan')->insert([
                'nama_karyawan' => $names[array_rand($names)],
                'divisi' => $divisions[array_rand($divisions)],
                'bobot1' => rand(1, 5),
                'bobot2' => rand(1, 5),
                'bobot3' => rand(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('kriteria')->insert([
            [
                'nama_kriteria' => 'Pencapaian Target',
                'tipe' => 'Benefit',
                'bobot' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'Kerjasama dan kolaborasi',
                'tipe' => 'Benefit',
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'pengembangan diri',
                'tipe' => 'Benefit',
                'bobot' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }


}
