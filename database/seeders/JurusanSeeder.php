<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftar_jurusan_smk = [
            'Rekayasa Perangkat Lunak' => 'RPL',
            'Teknik Komputer dan Jaringan' => 'TKJ',
            'Teknik Elektronika Industri' => 'TEI',
            'Teknik Otomasi Industri' => 'TOI',
            'Teknik Kendaraan Ringan' => 'TKR',
            'Teknik Sepeda Motor' => 'TSM',
            // 'Multimedia' => 'MM',
            'Desain Komunikasi Visual' => 'DKV',
            'Teknik Audio Video' => 'TAV',
            'Teknik Instalasi Tenaga Listrik' => 'TITL',
            'Teknik Pendingin dan Tata Udara' => 'TPTU',
            'Teknik Permesinan' => 'TPM',
            'Teknik Pengelasan' => 'TP',
            'Teknik Pemesinan Kapal' => 'TPK',
            'Teknik Kimia Industri' => 'TKI',
        ];

        foreach ($daftar_jurusan_smk as $nama_jurusan => $singkatan) {
            Jurusan::create([
                'nama' => $nama_jurusan,
                'singkatan' => $singkatan,
                'slug' => Str::slug($nama_jurusan),
            ]);
        }

    }
}
