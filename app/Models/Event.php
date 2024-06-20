<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    use HasFactory;

    protected $fillable = [
        'maksud_perjalanan_dinas',
        'tujuan',
        'tanggal_mulai',
        'tanggal_selesai',
        'pelaksana_peserta',
        'latar_belakang',
        'nomor_surat',
        'tanggal_surat',
        'hasil_kegiatan',
        'status_tindak_lanjut',
        'rencana_kegiatan',
        'rencana_waktu',
        'pelaksanaan_kegiatan',
        'pelaksanaan_waktu',
    ];

    protected $dates = [
        'tanggal_mulai',
        'tanggal_selesai',
        'tanggal_surat',
        'rencana_waktu',
        'pelaksanaan_waktu',
    ];
}
