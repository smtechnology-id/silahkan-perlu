<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder {
    public function run() {
        DB::table('events')->insert([
            [
                'maksud_perjalanan_dinas' => 'Perjalanan dinas ke Jakarta',
                'tujuan' => 'Kantor Pusat',
                'tanggal_mulai' => Carbon::create('2024', '07', '01'),
                'tanggal_selesai' => Carbon::create('2024', '07', '05'),
                'pelaksana_peserta' => 'Budi Santoso',
                'latar_belakang' => 'Menghadiri rapat tahunan',
                'nomor_surat' => '123/ABC/2024',
                'tanggal_surat' => Carbon::create('2024', '06', '25'),
                'hasil_kegiatan' => 'Rapat berjalan dengan lancar',
                'status_tindak_lanjut' => 'Sudah ditindaklanjuti',
                'rencana_kegiatan' => 'Rapat lanjutan',
                'rencana_waktu' => Carbon::create('2024', '08', '01'),
                'pelaksanaan_kegiatan' => 'Tindak lanjut hasil rapat',
                'pelaksanaan_waktu' => Carbon::create('2024', '08', '15'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
