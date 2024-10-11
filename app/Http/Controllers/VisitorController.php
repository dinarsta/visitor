<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    // Menampilkan form jika visitor belum mengisi biodata
    public function showForm($qr_code)
    {
        // Cari visitor berdasarkan qr_code
        $visitor = Visitor::where('qr_code', $qr_code)->first();

        // Jika visitor sudah ada dan form sudah terisi
        if ($visitor && $visitor->form_filled) {
            return view('form_already_filled'); // Halaman validasi
        }

        // Jika visitor belum ada atau belum isi form
        return view('visitor_form', ['qr_code' => $qr_code]);
    }

    // Proses submit form
    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'qr_code' => 'required|string',
        ]);

        // Cek apakah visitor sudah ada
        $visitor = Visitor::where('qr_code', $request->qr_code)->first();

        // Jika form sudah terisi
        if ($visitor && $visitor->form_filled) {
            return redirect()->back()->with('error', 'Form sudah diisi sebelumnya');
        }

        // Jika visitor tidak ada, buat baru
        if (!$visitor) {
            $visitor = new Visitor();
        }

        // Isi data visitor
        $visitor->name = $request->name;
        $visitor->instansi = $request->instansi;
        $visitor->phone = $request->phone;
        $visitor->qr_code = $request->qr_code;
        $visitor->form_filled = true;
        $visitor->save();

        return redirect()->back()->with('message', 'Biodata berhasil disimpan');
    }
}
