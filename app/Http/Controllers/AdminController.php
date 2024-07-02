<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $total = Event::all()->count();
        $belumAdaInstruksi = Event::where('status_tindak_lanjut', 'Belum Ada Instruksi')->count();
        $sudahAdaInstruksi = Event::where('status_tindak_lanjut', 'Sudah Ada Instruksi')->count();
        $terlaksana = Event::where('status_tindak_lanjut', 'Tindak Lanjut Terlaksana')->count();
        return view('admin.dashboard', compact('terlaksana', 'belumAdaInstruksi', 'sudahAdaInstruksi', 'total'));
    }

    public function event()
    {
        Carbon::setLocale('id');
        $events = Event::where('status_tindak_lanjut', 'Belum Ada Instruksi')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.event', compact('events'));
    }
    public function eventImplementedShow()
    {
        Carbon::setLocale('id');
        $events = Event::where('status_tindak_lanjut', 'Tindak Lanjut Terlaksana')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.eventImplemented', compact('events'));
    }
    public function addEvent()
    {
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
            'status_tindak_lanjut' => 'Belum Ada Instruksi',
        ]);

        // Simpan data ke database
        $event->save();

        // Redirect kembali ke halaman form dengan pesan sukses
        return redirect()->route('admin.event')->with('success', 'Event added successfully.');
    }
    public function updateEventPost(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'id' => 'required|integer|exists:events,id',
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

        // Cari event berdasarkan ID
        $event = Event::findOrFail($request->id);

        // Update data event
        $event->maksud_perjalanan_dinas = $request->maksud_perjalanan_dinas;
        $event->tujuan = $request->tujuan;
        $event->tanggal_mulai = $request->tanggal_mulai;
        $event->tanggal_selesai = $request->tanggal_selesai;
        $event->pelaksana_peserta = $request->pelaksana_peserta;
        $event->latar_belakang = $request->latar_belakang;
        $event->nomor_surat = $request->nomor_surat;
        $event->tanggal_surat = $request->tanggal_surat;
        $event->hasil_kegiatan = $request->hasil_kegiatan;

        // Simpan perubahan ke database
        $event->save();

        // Redirect kembali ke halaman yang diinginkan dengan pesan sukses
        return redirect()->back()->with('success', 'Perjalanan Dinas updated successfully.');
    }
    public function deleteEventPost(Request $request)
    {
        // Validasi ID yang dikirim dari form
        $request->validate([
            'id' => 'required|integer|exists:events,id',
        ]);

        // Cari event berdasarkan ID dan hapus
        $event = Event::findOrFail($request->id);
        $event->delete();

        // Redirect kembali ke halaman yang diinginkan dengan pesan sukses
        return redirect()->back()->with('success', 'Event deleted successfully.');
    }

    public function eventConfirm()
    {
        Carbon::setLocale('id');
        $events = Event::where('status_tindak_lanjut', 'Sudah Ada Instruksi')
            ->orWhere('status_tindak_lanjut', 'Belum Ada Instruksi')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.eventConfirm', compact('events'));
    }

    public function eventImplemented(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'id' => 'required|integer|exists:events,id',
            'pelaksanaan_kegiatan' => 'required|string',
            'pelaksanaan_waktu' => 'required|date',
        ]);

        // Cari event berdasarkan ID
        $event = Event::findOrFail($request->id);

        // Update data pelaksanaan kegiatan
        $event->pelaksanaan_kegiatan = $request->pelaksanaan_kegiatan;
        $event->pelaksanaan_waktu = $request->pelaksanaan_waktu;
        $event->status_tindak_lanjut = 'Tindak Lanjut Terlaksana';

        // Simpan perubahan ke database
        $event->save();

        // Redirect kembali ke halaman yang diinginkan dengan pesan sukses
        return redirect()->back()->with('success', 'Event implementation details updated successfully.');
    }

    public function addInstruction(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'id' => 'required|integer|exists:events,id',
            'status_tindak_lanjut' => 'required|string',
            'rencana_kegiatan' => 'required|string',
            'rencana_waktu' => 'required|date_format:Y-m', // Sesuaikan dengan format bulan dan tahun (YYYY-MM)
        ]);


        // Cari event berdasarkan ID
        $event = Event::findOrFail($request->id);

        // Update data dengan instruksi dan rencana kegiatan
        $event->status_tindak_lanjut = $request->status_tindak_lanjut;
        $event->rencana_kegiatan = $request->rencana_kegiatan;

        // Ganti format tanggal dari input month (YYYY-MM) menjadi format yang bisa disimpan di database
        $rencana_waktu = $request->rencana_waktu . '-01'; // Tambahkan tanggal 01 untuk formatkan menjadi 'YYYY-MM-DD'
        $event->rencana_waktu = $rencana_waktu;

        // Simpan perubahan ke database
        $event->save();


        // Redirect kembali ke halaman yang diinginkan dengan pesan sukses
        return redirect()->back()->with('success', 'Instruksi berhasil ditambahkan.');
    }
}
