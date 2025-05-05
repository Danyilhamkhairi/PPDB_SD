@extends('pages.home.index')
@push('add-styles')
<link href="{{asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    .table {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .table thead th {
        background-color: #4e73df;
        color: white;
        border: none;
        font-weight: 600;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(78, 115, 223, 0.05);
    }
    .status-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }
    .status-waiting {
        background-color: #f6c23e;
        color: #ffffff;
    }
    .status-rejected {
        background-color: #e74a3b;
        color: #ffffff;
    }
    .status-accepted {
        background-color: #1cc88a;
        color: #ffffff;
    }
    .action-btn {
        border-radius: 6px;
        padding: 5px 15px;
        font-weight: 500;
        transition: all 0.3s;
        margin: 0 3px;
    }
    .action-btn:hover {
        transform: translateY(-2px);
    }
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
    }
    .card-body {
        padding: 1.5rem;
    }

    /* Modal styling */
    .detail-modal .modal-content {
        border: none;
        border-radius: 12px;
        overflow: hidden;
    }

    .detail-modal .modal-header {
        background-color: #4e73df;
        color: white;
        border-bottom: none;
    }

    .detail-modal .modal-title {
        font-weight: 600;
    }

    .detail-modal .modal-body {
        padding: 1.5rem;
    }

    .detail-modal .status-badge-large {
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 20px;
    }

    .detail-modal .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #4e73df;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #eaecf4;
    }

    .detail-modal .info-row {
        display: flex;
        margin-bottom: 0.75rem;
    }

    .detail-modal .info-label {
        width: 40%;
        font-weight: 600;
        color: #5a5c69;
    }

    .detail-modal .info-value {
        width: 60%;
    }

    .detail-modal .student-photo {
        max-width: 150px;
        max-height: 200px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        margin-bottom: 1rem;
    }

    .detail-modal .no-photo {
        width: 150px;
        height: 200px;
        background-color: #f8f9fc;
        border: 1px dashed #d1d3e2;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #858796;
        margin-bottom: 1rem;
    }

    .detail-modal .no-photo i {
        font-size: 3rem;
        margin-bottom: 10px;
    }

    .download-btn {
        width: 100%;
        margin-top: 15px;
        padding: 8px 15px;
    }

    /* Animasi untuk badge status */
    .status-accepted {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(28, 200, 138, 0.4);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(28, 200, 138, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(28, 200, 138, 0);
        }
    }

    /* Stats cards styling */
    .stats-container {
        margin-bottom: 20px;
    }
    .stats-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        padding: 15px;
        transition: all 0.3s;
        border-left: 4px solid #4e73df;
        height: 100%;
    }
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }
    .stats-card-primary {
        border-left-color: #4e73df;
    }
    .stats-card-success {
        border-left-color: #1cc88a;
    }
    .stats-card-warning {
        border-left-color: #f6c23e;
    }
    .stats-card-danger {
        border-left-color: #e74a3b;
    }
    .stats-icon {
        display: inline-flex;
        width: 40px;
        height: 40px;
        background: rgba(78, 115, 223, 0.1);
        border-radius: 50%;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }
    .stats-icon-primary {
        background: rgba(78, 115, 223, 0.1);
        color: #4e73df;
    }
    .stats-icon-success {
        background: rgba(28, 200, 138, 0.1);
        color: #1cc88a;
    }
    .stats-icon-warning {
        background: rgba(246, 194, 62, 0.1);
        color: #f6c23e;
    }
    .stats-icon-danger {
        background: rgba(231, 74, 59, 0.1);
        color: #e74a3b;
    }
    .stats-title {
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 5px;
        color: #5a5c69;
    }
    .stats-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #5a5c69;
        margin-bottom: 0;
    }
</style>
@endpush
@section('content')
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href="{{ route('landing-page') }}"><span>SD Negeri 98/X Rantau Indah</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="{{asset('assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li><a href="{{ route('landing-page') }}">Home</a></li>
            <li class="active"><a href="{{ route('hasil') }}">Hasil Pendaftaran</a></li>
            <li class="get-started"><a href="{{ route('daftar') }}">Daftar</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header>
<main id="main">
    <div class="container" style="margin-top: 150px;">
        <!-- Stats Cards -->
        <div class="row stats-container">
            <!-- Total Pendaftar Card -->
            <div class="col-md-3 mb-4">
                <div class="stats-card stats-card-primary">
                    <div class="stats-icon stats-icon-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stats-title">Total Pendaftar</div>
                    <div class="stats-value">{{ count($items) }}</div>
                </div>
            </div>

            <!-- Menunggu Card -->
            <div class="col-md-3 mb-4">
                <div class="stats-card stats-card-warning">
                    <div class="stats-icon stats-icon-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stats-title">Menunggu</div>
                    <div class="stats-value">{{ $items->where('status', 'MENUNGGU')->count() }}</div>
                </div>
            </div>

            <!-- Ditolak Card -->
            <div class="col-md-3 mb-4">
                <div class="stats-card stats-card-danger">
                    <div class="stats-icon stats-icon-danger">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stats-title">Ditolak</div>
                    <div class="stats-value">{{ $items->where('status', 'DITOLAK')->count() }}</div>
                </div>
            </div>

            <!-- Diterima Card -->
            <div class="col-md-3 mb-4">
                <div class="stats-card stats-card-success">
                    <div class="stats-icon stats-icon-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stats-title">Diterima</div>
                    <div class="stats-value">{{ $items->where('status', 'DITERIMA')->count() }}</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white py-3">
                <h5 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-list mr-2"></i> Daftar Pendaftaran
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag mr-1"></i> No</th>
                                <th><i class="fas fa-user mr-1"></i> Nama</th>
                                <th><i class="fas fa-school mr-1"></i> Asal Sekolah</th>
                                <th><i class="fas fa-users mr-1"></i> Orang Tua</th>
                                <th><i class="fas fa-info-circle mr-1"></i> Status</th>
                                <th><i class="fas fa-cogs mr-1"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$item->peserta->nama}}</td>
                                <td>{{$item->peserta->asal_sekolah}}</td>
                                <td>{{$item->peserta->nama_ortu}}</td>
                                <td class="text-center">
                                    @if ($item->status == 'MENUNGGU')
                                        <span class="status-badge status-waiting">
                                            <i class="fas fa-clock mr-1"></i> Menunggu
                                        </span>
                                    @endif
                                    @if ($item->status == 'DITOLAK')
                                        <span class="status-badge status-rejected">
                                            <i class="fas fa-times-circle mr-1"></i> Ditolak
                                        </span>
                                    @endif
                                    @if ($item->status == 'DITERIMA')
                                        <span class="status-badge status-accepted">
                                            <i class="fas fa-check-circle mr-1"></i> Diterima
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary action-btn detail-btn" data-toggle="modal" data-target="#detailModal-{{$item->id}}">
                                        <i class="fas fa-eye mr-1"></i> Detail
                                    </button>

                                    @if ($item->status == 'DITERIMA')
                                        <a href="{{ route('download-hasil', ['id' => $item->id]) }}" class="btn btn-success action-btn">
                                            <i class="fas fa-download mr-1"></i> Download
                                        </a>
                                    @else
                                        <button type="button" class="btn btn-secondary action-btn" disabled>
                                            <i class="fas fa-download mr-1"></i> Download
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @empty
                                <tr class="text-center">
                                    <td colspan="6">
                                        <div class="py-4">
                                            <i class="fas fa-folder-open text-muted" style="font-size: 3rem;"></i>
                                            <p class="mt-2 mb-0">Tidak Ada Data</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modals -->
    @foreach ($items as $item)
    <div class="modal fade detail-modal" id="detailModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel-{{$item->id}}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel-{{$item->id}}">
                        <i class="fas fa-user-graduate mr-2"></i> Detail Pendaftaran
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Status Badge Prominently Displayed at the Top -->
                    <div class="text-center mb-4">
                        <span class="status-badge-large
                            @if ($item->status == 'MENUNGGU') status-waiting
                            @elseif ($item->status == 'DITOLAK') status-rejected
                            @else status-accepted @endif">

                            @if ($item->status == 'MENUNGGU')
                                <i class="fas fa-clock mr-1"></i> Menunggu Keputusan
                            @elseif ($item->status == 'DITOLAK')
                                <i class="fas fa-times-circle mr-1"></i> Belum Diterima
                            @else
                                <i class="fas fa-check-circle mr-1"></i> Selamat! Anda Diterima
                            @endif
                        </span>
                    </div>

                    <div class="row">
                        <div class="col-md-3 text-center">
                            @if (isset($item->peserta->foto))
                                <img src="{{ asset('storage/'.$item->peserta->foto) }}" alt="Foto Siswa" class="student-photo">
                            @else
                                <div class="no-photo">
                                    <i class="fas fa-user"></i>
                                    <p>Tidak ada foto</p>
                                </div>
                            @endif

                            @if ($item->status == 'DITERIMA')

                            @endif
                        </div>

                        <div class="col-md-9">
                            <div class="section-title">
                                <i class="fas fa-user mr-2"></i> Informasi Peserta
                            </div>

                            <div class="info-row">
                                <div class="info-label">Nama Lengkap</div>
                                <div class="info-value">{{ $item->peserta->nama }}</div>
                            </div>

                            <div class="info-row">
                                <div class="info-label">Tempat, Tanggal Lahir</div>
                                <div class="info-value">{{ $item->peserta->tempat_lahir }}, {{ $item->peserta->tanggal_lahir }}</div>
                            </div>

                            <div class="info-row">
                                <div class="info-label">Jenis Kelamin</div>
                                <div class="info-value">{{ $item->peserta->jenkel->jenis_kelamin }}</div>
                            </div>

                            <div class="info-row">
                                <div class="info-label">Agama</div>
                                <div class="info-value">{{ $item->peserta->agama->nama_agama }}</div>
                            </div>

                            <div class="info-row">
                                <div class="info-label">Alamat</div>
                                <div class="info-value">{{ $item->peserta->alamat }}</div>
                            </div>

                            <div class="info-row">
                                <div class="info-label">No Telepon</div>
                                <div class="info-value">{{ $item->peserta->no_telp }}</div>
                            </div>

                            <div class="section-title mt-4">
                                <i class="fas fa-school mr-2"></i> Informasi Pendidikan
                            </div>

                            <div class="info-row">
                                <div class="info-label">Asal Sekolah</div>
                                <div class="info-value">{{ $item->peserta->asal_sekolah }}</div>
                            </div>

                            <div class="section-title mt-4">
                                <i class="fas fa-users mr-2"></i> Informasi Orang Tua
                            </div>

                            <div class="info-row">
                                <div class="info-label">Nama Ayah</div>
                                <div class="info-value">{{ $item->peserta->orang_tua->nama_ayah }}</div>
                            </div>

                            <div class="info-row">
                                <div class="info-label">Pekerjaan Ayah</div>
                                <div class="info-value">{{ $item->peserta->orang_tua->pekerjaan_ayah->nama_pekerjaan }}</div>
                            </div>

                            <div class="info-row">
                                <div class="info-label">Penghasilan Ayah</div>
                                <div class="info-value">{{ $item->peserta->orang_tua->penghasilan_ayah->penghasilan_ortu }}</div>
                            </div>

                            <div class="info-row">
                                <div class="info-label">Nama Ibu</div>
                                <div class="info-value">{{ $item->peserta->orang_tua->nama_ibu }}</div>
                            </div>

                            <div class="info-row">
                                <div class="info-label">Pekerjaan Ibu</div>
                                <div class="info-value">{{ $item->peserta->orang_tua->pekerjaan_ibu->nama_pekerjaan }}</div>
                            </div>

                            <div class="info-row">
                                <div class="info-label">Penghasilan Ibu</div>
                                <div class="info-value">{{ $item->peserta->orang_tua->penghasilan_ibu->penghasilan_ortu }}</div>
                            </div>

                            <div class="info-row">
                                <div class="info-label">No Telepon Orang Tua</div>
                                <div class="info-value">{{ $item->peserta->orang_tua->no_tlp }}</div>
                            </div>
                        </div>
                    </div>

                    @if ($item->status == 'DITERIMA')
                    <div class="alert alert-success mt-4">
                        <i class="fas fa-info-circle mr-2"></i> Silakan download surat penerimaan dan segera lakukan daftar ulang sesuai jadwal yang tertera.
                    </div>
                    @elseif ($item->status == 'DITOLAK')
                    <div class="alert alert-danger mt-4">
                        <i class="fas fa-info-circle mr-2"></i> Mohon maaf, pendaftaran Anda belum dapat diterima. Silakan hubungi pihak sekolah untuk informasi lebih lanjut.
                    </div>
                    @else
                    <div class="alert alert-warning mt-4">
                        <i class="fas fa-info-circle mr-2"></i> Pendaftaran Anda masih dalam proses evaluasi. Silakan periksa kembali hasil pendaftaran secara berkala.
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    @if ($item->status == 'DITERIMA')
                        <a href="{{ route('download-hasil', ['id' => $item->id]) }}" class="btn btn-success">
                            <i class="fas fa-download mr-1"></i> Download Surat Penerimaan
                        </a>
                    @endif
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</main>
<!-- End #main -->
@endsection
@push('add-scripts')
    <!-- Page level plugins -->
    <script src="{{asset('sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('sbadmin/js/demo/datatables-demo.js')}}"></script>
@endpush
