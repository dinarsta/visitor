<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    // Menampilkan form jika visitor belum mengisi biodata
   public function showForm(){
    return view('visitor_form'); // Tampilkan form visitor tanpa validasi
   }


    // Proses submit form
    public function submitForm(Request $request)
    {
        // Tambahkan validasi dengan pesan kustom untuk nomor telepon yang sudah ada
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:visitors,phone',
        ], [
            'phone.unique' => 'Nomor telepon ini sudah terdaftar. Silakan gunakan nomor yang berbeda.', // Pesan kustom
        ]);

        // Buat entry baru untuk setiap pengisian form
        $visitor = new Visitor();

        // Isi data visitor
        $visitor->name = $request->name;
        $visitor->instansi = $request->instansi;
        $visitor->phone = $request->phone;
        $visitor->save(); // Simpan data pengunjung baru

        return redirect()->back()->with('message', 'Biodata berhasil disimpan');
    }



    }

