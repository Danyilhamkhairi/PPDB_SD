@extends('layouts.index')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Peserta</h1>
        <a href="{{ route('home') }}" class="btn btn-danger shadow-sm">
            <i class="fas fa-arrow-left fa-sm mr-2"></i>Kembali
        </a>
    </div>

    <div class="card shadow mb-4 border-0">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
            <h6 class="m-0 font-weight-bold text-primary">Data Lengkap Peserta</h6>
            <div>
                @if ($item->status == 'DITERIMA')
                    <span class="badge badge-success px-3 py-2">DITERIMA</span>
                @elseif ($item->status == 'DITOLAK')
                    <span class="badge badge-danger px-3 py-2">DITOLAK</span>
                @else
                    <span class="badge badge-warning px-3 py-2">MENUNGGU</span>
                @endif
            </div>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-3 text-center">
                    <div class="student-photo-container mb-3">
                        @if ($item->peserta->foto)
                            <img src="{{ asset('storage/'.$item->peserta->foto) }}" alt="Foto {{ $item->peserta->nama }}" class="img-thumbnail student-photo">
                        @else
                            <div class="no-photo">
                                <i class="fas fa-user"></i>
                                <p>Tidak ada foto</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <!-- Personal Information Section -->
                                <tr class="bg-light">
                                    <th colspan="2" class="text-primary">Informasi Peserta</th>
                                </tr>
                                <tr>
                                    <td width="25%" class="font-weight-bold">Nama Lengkap</td>
                                    <td>{{ $item->peserta->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tempat, Tanggal Lahir</td>
                                    <td>{{ $item->peserta->tempat_lahir }}, {{ $item->peserta->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Jenis Kelamin</td>
                                    <td>{{ $item->peserta->jenkel->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Agama</td>
                                    <td>{{ $item->peserta->agama->nama_agama }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Alamat</td>
                                    <td>{{ $item->peserta->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">No Telepon</td>
                                    <td>{{ $item->peserta->no_telp }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <!-- Education Section -->
                                <tr class="bg-light">
                                    <th colspan="2" class="text-primary">Informasi Pendidikan</th>
                                </tr>
                                <tr>
                                    <td width="25%" class="font-weight-bold">Asal Sekolah</td>
                                    <td>{{ $item->peserta->asal_sekolah }}</td>
                                </tr>

                                <!-- Parents Information Section -->
                                <tr class="bg-light">
                                    <th colspan="2" class="text-primary">Informasi Orang Tua</th>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Nama Ayah</td>
                                    <td>{{ $item->peserta->orang_tua->nama_ayah }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pekerjaan Ayah</td>
                                    <td>{{ $item->peserta->orang_tua->pekerjaan_ayah->nama_pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Penghasilan Ayah</td>
                                    <td>{{ $item->peserta->orang_tua->penghasilan_ayah->penghasilan_ortu }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Nama Ibu</td>
                                    <td>{{ $item->peserta->orang_tua->nama_ibu }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pekerjaan Ibu</td>
                                    <td>{{ $item->peserta->orang_tua->pekerjaan_ibu->nama_pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Penghasilan Ibu</td>
                                    <td>{{ $item->peserta->orang_tua->penghasilan_ibu->penghasilan_ortu }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">No Telepon Orang Tua</td>
                                    <td>{{ $item->peserta->orang_tua->no_tlp }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            @if ($item->status == 'MENUNGGU')
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <form method="post" class="d-inline-block" action="{{ route('peserta-diterima', $item->id) }}">
                        @method('PATCH')
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg px-5 mr-3">
                            <i class="fas fa-check-circle mr-2"></i> TERIMA
                        </button>
                    </form>
                    <form method="post" class="d-inline-block" action="{{ route('peserta-ditolak', $item->id) }}">
                        @method('PATCH')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg px-5">
                            <i class="fas fa-times-circle mr-2"></i> TOLAK
                        </button>
                    </form>
                </div>
            </div>
            @else
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <button class="btn btn-success btn-lg px-5 mr-3" disabled>
                        <i class="fas fa-check-circle mr-2"></i> TERIMA
                    </button>
                    <button class="btn btn-danger btn-lg px-5" disabled>
                        <i class="fas fa-times-circle mr-2"></i> TOLAK
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    .table tr td {
        padding: 12px 20px;
        vertical-align: middle;
    }
    .table tr th {
        padding: 12px 20px;
        font-weight: 600;
    }
    .bg-light {
        background-color: #f8f9fc !important;
    }
    .badge {
        font-size: 0.85rem;
        font-weight: 600;
        border-radius: 30px;
    }
    .btn {
        border-radius: 5px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn:hover:not([disabled]) {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .btn-lg {
        padding: 0.75rem 1.25rem;
    }
    .card {
        border-radius: 10px;
        overflow: hidden;
    }

    /* Styling untuk foto siswa */
    .student-photo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
    }

    .student-photo {
        width: 100%;
        max-width: 200px;
        max-height: 250px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .no-photo {
        width: 100%;
        max-width: 200px;
        height: 250px;
        background-color: #f8f9fc;
        border: 1px dashed #d1d3e2;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #858796;
    }

    .no-photo i {
        font-size: 3rem;
        margin-bottom: 10px;
    }

    .no-photo p {
        margin-bottom: 0;
        font-size: 0.9rem;
    }
</style>
@endsection
