<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatMenikah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RiwayatMenikahController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'status_perkawinan' => 'required|string|max:255',
            'tanggal_menikah_cerai' => 'required|date',
            'nama_pasangan' => 'required|string|max:255',
            'pekerjaan_pasangan' => 'required|string|max:255',
            'jumlah_anak' => 'required|integer|min:0',
            'akta_nikah' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
        ]);
    
        // Mengecek apakah user sudah memiliki data riwayat menikah
        $existingRiwayat = RiwayatMenikah::where('user_id', auth()->id())->first();
        if ($existingRiwayat) {
            // Jika sudah ada, arahkan ke output dengan pesan dan data riwayat menikah
            return redirect()->route('riwayatMenikah.output')
                ->with('info', 'Data riwayat menikah Anda sudah ada.')
                ->with('riwayatMenikah', $existingRiwayat);  // Pastikan mengirimkan data yang ada
        }
    
        // Default null untuk akta nikah
        $filename = null;
    
        // Jika ada file di-upload
        if ($request->hasFile('akta_nikah')) {
            $file = $request->file('akta_nikah');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/akta_nikah', $filename);
        }
    
        // Simpan data
        RiwayatMenikah::create([
            'user_id' => auth()->id(),
            'status_perkawinan' => $request->status_perkawinan,
            'tanggal_menikah_cerai' => $request->tanggal_menikah_cerai,
            'nama_pasangan' => $request->nama_pasangan,
            'pekerjaan_pasangan' => $request->pekerjaan_pasangan,
            'jumlah_anak' => $request->jumlah_anak,
            'akta_nikah' => $filename, // null kalau tidak upload
        ]);
    
        // Setelah data disimpan, arahkan ke output
        return redirect()->route('riwayatMenikah.output')->with('success', 'Data berhasil disimpan!');
    }
    
    
    public function output()
    {
        $user = Auth::user();
        $riwayatMenikah = RiwayatMenikah::where('user_id', $user->id)->first();
       
        // Jika data ada, tampilkan output
        if ($riwayatMenikah) {
            return view('users.menikah.outputM', compact('riwayatMenikah'));
        }
        
        // Jika tidak ada data, arahkan ke form input dengan pesan
        return redirect()->route('users.menikah.outputM3456789')->with('info', 'Silakan isi data riwayat menikah Anda.');
    }

    public function create()
    {
        return view('users.menikah.menikah'); // pastikan view ini ada
    }

    



    public function showRiwayatMenikah()
{
    // Mengambil data RiwayatMenikah berdasarkan user_id
    $riwayatMenikah = RiwayatMenikah::where('user_id', auth()->id())->first();

    // Mengecek jika data ada, jika tidak akan menampilkan pesan
    if (!$riwayatMenikah) {
        return view('output', ['message' => 'Data riwayat menikah tidak ditemukan']);
    }

    return view('users.menikah.outputM', compact('riwayatMenikah'));
}
    

    
       // Fungsi untuk menampilkan form edit
       public function edit($id)
       {
           // Mengambil data riwayatMenikah berdasarkan ID
           $riwayatMenikah = RiwayatMenikah::find($id);
   
           // Jika data tidak ditemukan, redirect dengan pesan error
           if (!$riwayatMenikah) {
               return redirect()->route('riwayatMenikah.index')->with('error', 'Data tidak ditemukan.');
           }
   
           // Mengirim data ke view edit
           return view('users.menikah.edit_menikah', compact('riwayatMenikah'));
       }
   
       // Fungsi untuk update data
       public function update(Request $request, $id)
       {
           $request->validate([
               'status_perkawinan' => 'required|string',
               'tanggal_menikah_cerai' => 'nullable|date',
               'nama_pasangan' => 'nullable|string|max:255',
               'pekerjaan_pasangan' => 'nullable|string|max:255',
               'jumlah_anak' => 'nullable|integer|min:0',
               'akta_nikah' => 'nullable|mimes:pdf,jpeg,jpg,png|max:2048',
           ]);
       
           // Cek role admin atau user
           if (Auth::user()->role === 'admin') {
               $riwayatMenikah = RiwayatMenikah::findOrFail($id);
               $userId = $riwayatMenikah->user_id ?? null;
           } else {
               $riwayatMenikah = RiwayatMenikah::where('user_id', Auth::id())->findOrFail($id);
           }
       
           // Assign input ke model
           $riwayatMenikah->status_perkawinan = $request->status_perkawinan;
           $riwayatMenikah->tanggal_menikah_cerai = $request->tanggal_menikah_cerai;
           $riwayatMenikah->nama_pasangan = $request->nama_pasangan;
           $riwayatMenikah->pekerjaan_pasangan = $request->pekerjaan_pasangan;
           $riwayatMenikah->jumlah_anak = $request->jumlah_anak;
       
           // Handle file upload
           if ($request->hasFile('akta_nikah')) {
               // Hapus file lama jika ada
               if ($riwayatMenikah->akta_nikah && \Storage::disk('public')->exists($riwayatMenikah->akta_nikah)) {
                   \Storage::disk('public')->delete($riwayatMenikah->akta_nikah);
               }
       
               // Simpan file baru
               $riwayatMenikah->akta_nikah = $request->file('akta_nikah')->store('akta_nikah', 'public');
           }
       
           // Simpan ke DB
           $riwayatMenikah->save();
       
           // Redirect berdasarkan role
           if (Auth::user()->role === 'admin') {
               return redirect()->route('akun.lihat', $userId)->with('success', 'Data pernikahan berhasil diperbarui.');
           } else {
               return redirect()->route('users.menikah.menikah')->with('success', 'Data berhasil diperbarui.');
           }
       }
       
    
       public function destroy($id)
       {
           $riwayatMenikah = RiwayatMenikah::findOrFail($id);
           
           // Opsional: Cek agar hanya user terkait yang bisa hapus
           if ($riwayatMenikah->user_id !== Auth::user()->id) {
               return redirect()->back()->with('error', 'Akses ditolak.');
           }
           
           // Hapus file jika ada
           if ($riwayatMenikah->akta_nikah && Storage::disk('public')->exists($riwayatMenikah->akta_nikah)) {
               Storage::disk('public')->delete($riwayatMenikah->akta_nikah);
           }
           
           // Hapus data riwayat menikah
           $riwayatMenikah->delete();
           
           // Setelah data dihapus, arahkan kembali ke form input
           return redirect()->route('riwayatMenikah.create')->with('success', 'Data riwayat menikah berhasil dihapus!');
       }

    
}
