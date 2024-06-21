<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }
    
    public function event() {
        Carbon::setLocale('id');
        $events = Event::all();
        return view('admin.event', compact('events'));
    }
    public function addEvent () {
        return view('admin.addEvent');
    }

    public function addEventPost(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'maksud_perjalanan_dinas' => 'required|string',
            'tujuan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'pelaksana_peserta' => 'required|string',
            'latar_belakang' => 'required|string',
            'nomor_surat' => 'nullable|string',
            'tanggal_surat' => 'nullable|date',
            'hasil_kegiatan' => 'required|string',
        ]);

        // Buat objek Event untuk menyimpan data baru
        $event = new Event([
            'maksud_perjalanan_dinas' => $request->maksud_perjalanan_dinas,
            'tujuan' => $request->tujuan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'pelaksana_peserta' => $request->pelaksana_peserta,
            'latar_belakang' => $request->latar_belakang,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'hasil_kegiatan' => $request->hasil_kegiatan,
            'status_tindak_lanjut' => 'pending',
        ]);

        // Simpan data ke database
        $event->save();

        // Redirect kembali ke halaman form dengan pesan sukses
        return redirect()->route('admin.event')->with('success', 'Event added successfully.');
    }
}
