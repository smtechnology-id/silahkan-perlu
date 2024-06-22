<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PimpinanController extends Controller
{
    public function index()
    {
        $total = Event::all()->count();
        $belumAdaInstruksi = Event::where('status_tindak_lanjut', 'Belum Ada Instruksi')->count();
        $sudahAdaInstruksi = Event::where('status_tindak_lanjut', 'Sudah Ada Instruksi')->count();
        $terlaksana = Event::where('status_tindak_lanjut', 'Tindak Lanjut Terlaksana')->count();
        return view('pimpinan.dashboard', compact('terlaksana', 'belumAdaInstruksi', 'sudahAdaInstruksi', 'total'));
    }
    public function event()
    {
        Carbon::setLocale('id');
        $events = Event::where('status_tindak_lanjut', 'Belum Ada Instruksi')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pimpinan.event', compact('events'));
    }

    public function addInstruction(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'id' => 'required|integer|exists:events,id',
            'status_tindak_lanjut' => 'required|string',
            'rencana_kegiatan' => 'required|string',
            'rencana_waktu' => 'required|date',
        ]);

        // Cari event berdasarkan ID
        $event = Event::findOrFail($request->id);

        // Update data dengan instruksi dan rencana kegiatan
        $event->status_tindak_lanjut = $request->status_tindak_lanjut;
        $event->rencana_kegiatan = $request->rencana_kegiatan;
        $event->rencana_waktu = $request->rencana_waktu;

        // Simpan perubahan ke database
        $event->save();

        // Redirect kembali ke halaman yang diinginkan dengan pesan sukses
        return redirect()->back()->with('success', 'Instruksi berhasil ditambahkan.');
    }
    public function eventHistory()
    {
        Carbon::setLocale('id');
        $events = Event::where('status_tindak_lanjut', 'Tindak Lanjut Terlaksana')
            ->orWhere('status_tindak_lanjut', 'Sudah Ada Instruksi')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pimpinan.eventHistory', compact('events'));
    }
}
