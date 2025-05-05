<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

// Load Models
use App\Models\Agama;
use App\Models\JenisKelamin;
use App\Models\PenghasilanOrangtua;
use App\Models\PekerjaanOrangtua;
use App\Models\PesertaPPDB;
use App\Models\BiodataOrtu;
use App\Models\Hasil;

class DaftarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $agama = Agama::all();
        $jenkel = JenisKelamin::all();
        $hasil_ortu = PenghasilanOrangtua::all();
        $pekerjaan_ortu = PekerjaanOrangtua::all();
        return view('pages.user-flow.pendaftaran', compact(
            'agama', 'jenkel', 'hasil_ortu', 'pekerjaan_ortu'
        ));
    }

    public function daftar(Request $request)
    {
        DB::beginTransaction();

        $validator = \Validator::make($request->all(), [
            'id_jenis_kelamin' => 'required|exists:tbl_jenis_kelamin,id',
            'id_agama' => 'required|exists:tbl_agama,id',
            'nama' => 'required',
            'tanggal_lahir' => 'date|before:yesterday',
            'tempat_lahir' => 'required',
            'asal_sekolah' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'id_pekerjaan_ayah' => 'required|exists:tbl_pekerjaan_ortu,id',
            'id_pekerjaan_ibu' => 'required|exists:tbl_pekerjaan_ortu,id',
            'id_penghasilan_ayah' => 'required|exists:tbl_penghasilan_ortu,id',
            'id_penghasilan_ibu' => 'required|exists:tbl_penghasilan_ortu,id',
            'no_telp_ortu' => 'required',
            'foto_siswa' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $data = [
            'nama' => $request->nama,
            'id_jenis_kelamin' => $request->id_jenis_kelamin,
            'id_agama' => $request->id_agama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'nama_ortu' => $request->nama_ayah,
            'id_pekerjaan_ortu' => $request->id_pekerjaan_ayah,
            'id_penghasilan_ortu' => $request->id_penghasilan_ayah,
        ];

        // Handle foto upload
        if ($request->hasFile('foto_siswa')) {
            $foto = $request->file('foto_siswa');
            $namaFile = time() . '_' . str_replace(' ', '_', $request->nama) . '.' . $foto->getClientOriginalExtension();

            // Simpan foto ke folder public/uploads/siswa
            $path = $foto->storeAs('siswa', $namaFile, 'public');

            // Tambahkan path foto ke data
            $data['foto'] = $path;
        }

        $daftar = PesertaPPDB::create($data);
        if(!$daftar){
            DB::rollBack();
            Alert::error('Error', 'Please check your form again!');
            return redirect()->back();
        }

        $data2 = [
            'id_peserta_ppdb' => $daftar->id,
            'id_pekerjaan_ayah' => $request->id_pekerjaan_ayah,
            'id_penghasilan_ayah' => $request->id_penghasilan_ayah,
            'id_pekerjaan_ibu' => $request->id_pekerjaan_ibu,
            'id_penghasilan_ibu' => $request->id_penghasilan_ibu,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_tlp' => $request->no_telp_ortu
        ];

        $ortu = BiodataOrtu::create($data2);
        if(!$ortu){
            DB::rollBack();
            Alert::error('Error', 'Please check your form again!');
            return redirect()->back();
        }

        $data3 = [
            'nis' => $daftar->id
        ];

        $hasil = Hasil::create($data3);
        if(!$hasil){
            DB::rollBack();
            Alert::error('Error', 'Please check your form again!');
            return redirect()->back();
        }

        DB::commit();
        Alert::success('Success', 'Terima kasih telah mendaftar!');
        return redirect()->route('landing-page');
    }

    public function hasil()
    {
        $items = Hasil::with(['peserta.orang_tua'])->get();
        return view('pages.user-flow.hasil', compact('items'));
    }

    public function download($id = null)
    {
        try {
            if ($id) {
                // Download surat untuk peserta spesifik dengan eager loading
                $hasil = Hasil::with([
                    'peserta.orang_tua',
                    'peserta.jenkel',
                    'peserta.agama'
                ])->findOrFail($id);

                // Log data yang diambil untuk debugging
                Log::info('Data hasil:', ['id' => $id, 'hasil' => $hasil->toArray()]);

                // Validasi status
                if ($hasil->status != 'DITERIMA') {
                    Alert::error('Error', 'Maaf, surat penerimaan hanya tersedia untuk pendaftar yang diterima');
                    return redirect()->back();
                }

                // Menyiapkan data dalam bentuk objek untuk template
                $item = (object)[
                    'id' => $hasil->id,
                    'peserta' => (object)[
                        'nama' => $hasil->peserta->nama,
                        'tempat_lahir' => $hasil->peserta->tempat_lahir,
                        'tanggal_lahir' => $hasil->peserta->tanggal_lahir,
                        'asal_sekolah' => $hasil->peserta->asal_sekolah,
                        'alamat' => $hasil->peserta->alamat,
                        'foto' => $hasil->peserta->foto,
                        'jenkel' => (object)[
                            'jenis_kelamin' => $hasil->peserta->jenkel->jenis_kelamin
                        ],
                        'agama' => (object)[
                            'nama_agama' => $hasil->peserta->agama->nama_agama
                        ],
                        'orang_tua' => (object)[
                            'nama_ayah' => $hasil->peserta->orang_tua->nama_ayah,
                            'nama_ibu' => $hasil->peserta->orang_tua->nama_ibu
                        ]
                    ]
                ];

                // Tambahkan foto jika ada
                $foto = null;
                if (!empty($hasil->peserta->foto)) {
                    $foto = $hasil->peserta->foto;
                    // Periksa jika file ada
                    if (!Storage::disk('public')->exists($foto)) {
                        Log::warning('Foto tidak ditemukan: ' . $foto);
                        $foto = null;
                    }
                }

                // Data untuk view
                $data = [
                    'item' => $item,
                    'foto' => $foto
                ];

                // Generate PDF
                $pdf = \PDF::loadView('pdf.lulus', $data);
                $pdf->setPaper('a4', 'portrait');
                $pdf->setOptions([
                    'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,
                ]);

                return $pdf->download('Surat_Penerimaan_'.$hasil->peserta->nama.'.pdf');
            } else {
                // Download surat defaultnya
                $pdf = \PDF::loadView('pdf.lulus');
                return $pdf->download('lulus.pdf');
            }
        } catch (\Exception $e) {
            // Log error
            Log::error('Error mencetak PDF: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString()
            ]);

            Alert::error('Error', 'Terjadi kesalahan saat mencetak surat: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
