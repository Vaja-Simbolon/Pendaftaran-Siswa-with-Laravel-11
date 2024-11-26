<?php
namespace App\Http\Controllers;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran.create');
    }
    public function create()
    {
    }
    public function terima($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->status_daftar = 'Diterima';
        $pendaftaran->save();

        return redirect()->route('pendaftaran.tampil')->with('success', 'Status pendaftaran berhasil diubah menjadi Diterima.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gender' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required|date',
            'alamat' => 'required',
            'asal' => 'required',
            'foto_izajah' => 'required|file',
            'foto_bukti' => 'required|file'
        ], [
            'nama.required' => 'Nama tidak boleh kosong!',
            'gender.required' => 'Jenis kelamin tidak boleh kosong!',
            'tempat.required' => 'Tempat Lahir tidak boleh kosong!',
            'tanggal.required' => 'Tanggal lahir tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'asal.required' => 'Kota asal tidak boleh kosong!',
            'foto_izajah.required' => 'Foto izajah tidak boleh kosong!',
            'foto_izajah.file' => 'Format foto izajah harus bertipe file!',
            'foto_bukti.required' => 'Foto bukti bayar tidak boleh kosong!',
            'foto_bukti.file' => 'Format foto bukti bayar harus bertipe file!'
        ]);
    

        $noPendaftaran = Pendaftaran::generateRegistrationNumber();
    
        // Upload izajah
        $foto_izajah = $request->file('foto_izajah');
        $izajahName = $foto_izajah->hashName();
        $foto_izajah->move(public_path('/Foto_izajah'), $izajahName);
    
        // Upload bukti bayar
        $foto_bukti = $request->file('foto_bukti');
        $buktiName = $foto_bukti->hashName();
        $foto_bukti->move(public_path('/Foto_buktiBayar'), $buktiName);
    
        Pendaftaran::create([
            'no' => $noPendaftaran,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'ttl' => $request->tempat . ', ' . $request->tanggal,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal,
            'izajah' => $izajahName,
            'bukti_bayar' => $buktiName,
            'status_daftar' => 'Terdaftar',
        ]);
    
        session()->flash('success', 'Data anda berhasil di daftarkan!');
        return redirect()->route('pendaftaran.tampil');
    }
    public function show(string $id)
    {
    }
    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('pendaftaran.edit', compact('pendaftaran'));
    }
    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
    
        $request->validate([
            'no' => 'required',
            'nama' => 'required',
            'gender' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required|date',
            'alamat' => 'required',
            'asal' => 'required',
            'foto_izajah' => 'nullable|file',
            'foto_bukti' => 'nullable|file'
        ]);
        $pendaftaran->update([
            'no' => $request->no,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal,
        ]);
        if ($request->hasFile('foto_izajah')) {
            $foto_izajah = $request->file('foto_izajah');
            $izajahName = $foto_izajah->hashName();
            $foto_izajah->move(public_path('/Foto_izajah'), $izajahName);
            $pendaftaran->update(['foto_izajah' => $izajahName]);
        }
        if ($request->hasFile('foto_bukti')) {
            $foto_bukti = $request->file('foto_bukti');
            $buktiName = $foto_bukti->hashName();
            $foto_bukti->move(public_path('/Foto_buktiBayar'), $buktiName);
            $pendaftaran->update(['foto_bukti' => $buktiName]);
        }
        session()->flash('success', 'Data berhasil diperbarui!');
        return redirect()->route('mahasiswa.tampil');
    }
    public function destroy(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        if ($pendaftaran->foto_izajah) {
            $izajahPath = public_path('Foto_izajah/' . $pendaftaran->foto_izajah);
            if (file_exists($izajahPath)) {
                unlink($izajahPath);
            }
        }
    
        if ($pendaftaran->foto_bukti) {
            $buktiBayarPath = public_path('Foto_buktiBayar/' . $pendaftaran->foto_bukti);
            if (file_exists($buktiBayarPath)) {
                unlink($buktiBayarPath);
            }
        }
    
        $pendaftaran->delete();
    
        return redirect()->route('mahasiswa.tampil')->with('success', 'Data berhasil dihapus!');
    }
}
