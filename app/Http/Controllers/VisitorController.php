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
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Cek apakah nomor telepon sudah ada di database
        $existingVisitor = Visitor::where('phone', $request->phone)->first();

        if ($existingVisitor) {
            // Jika nomor telepon sudah terdaftar, kembalikan ke form dengan pesan error
            return redirect()->back()->with('error', 'Nomor telepon ini sudah terdaftar. Silakan gunakan nomor yang berbeda.');
        }

        // Buat entry baru jika nomor belum ada
        $visitor = new Visitor();
        $visitor->name = $request->name;
        $visitor->instansi = $request->instansi;
        $visitor->phone = $request->phone;
        $visitor->save(); // Simpan data pengunjung baru

        // Kembalikan ke form dengan pesan sukses
        return redirect()->back()->with('message', 'Biodata berhasil disimpan');
    }





    }

