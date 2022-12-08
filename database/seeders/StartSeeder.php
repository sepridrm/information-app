<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pangkat;
use App\Models\Welcome;
use App\Models\VideoInformation;
use App\Models\Pengumuman;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super admin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'aktif' => 1,
        ]);
        
        Welcome::create([
            'isi' => 'Selamat Datang',
        ]);

        VideoInformation::create([
            'nama' => 'Video Satu',
            'path' => 'public/video//gsmp.MP4',
        ]);

        Pengumuman::create([
            'isi' => 'Pengumuman Satu',
        ]);

        Pangkat::create([
            'nama' => 'Juru Muda',
            'golongan' => 'I/a',
        ]);
        Pangkat::create([
            'nama' => 'Juru Muda Tk.I',
            'golongan' => 'I/b',
        ]);
        Pangkat::create([
            'nama' => 'Juru',
            'golongan' => 'I/c',
        ]);
        Pangkat::create([
            'nama' => 'Juru Tk.I',
            'golongan' => 'I/d',
        ]);
        Pangkat::create([
            'nama' => 'Pengatur Muda',
            'golongan' => 'II/a',
        ]);
        Pangkat::create([
            'nama' => 'Pengatur Muda Tk.I',
            'golongan' => 'II/b',
        ]);
        Pangkat::create([
            'nama' => 'Pengatur',
            'golongan' => 'II/c',
        ]);
        Pangkat::create([
            'nama' => 'Pengatur Tk.I',
            'golongan' => 'II/d',
        ]);
        Pangkat::create([
            'nama' => 'Penata Muda',
            'golongan' => 'III/a',
        ]);
        Pangkat::create([
            'nama' => 'Penata Muda Tk.I',
            'golongan' => 'III/b',
        ]);
        Pangkat::create([
            'nama' => 'Penata',
            'golongan' => 'III/c',
        ]);
        Pangkat::create([
            'nama' => 'Penata Tk.I',
            'golongan' => 'III/d',
        ]);
        Pangkat::create([
            'nama' => 'Pembina',
            'golongan' => 'IV/a',
        ]);
        Pangkat::create([
            'nama' => 'Pembina Tk.I',
            'golongan' => 'IV/b',
        ]);
        Pangkat::create([
            'nama' => 'Pembina Utama Muda',
            'golongan' => 'IV/c',
        ]);
        Pangkat::create([
            'nama' => 'Pembina Utama Madya',
            'golongan' => 'IV/d',
        ]);
        Pangkat::create([
            'nama' => 'Pembina Utama',
            'golongan' => 'IV/e',
        ]);
    }
}
