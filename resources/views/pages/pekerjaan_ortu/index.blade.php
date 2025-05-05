@extends('layouts.index')
@push('style')
<link href="{{url('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>
    /* Modern Card Styling */
    .card {
        border-radius: 12px;
        overflow: hidden;
        border: none;
        box-shadow: 0 6px 18px rgba(0,0,0,0.06);
        transition: all 0.3s;
    }
    .card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    /* Modern Header */
    .page-header {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(227, 230, 240, 0.6);
    }
    .page-title {
        font-weight: 700;
        color: #2e384d;
        letter-spacing: -0.5px;
    }
    .page-subtitle {
        color: #6e7794;
        font-size: 0.95rem;
        margin-top: 0.5rem;
    }

    /* Modern Buttons */
    .btn {
        border-radius: 8px;
        font-weight: 600;
        padding: 0.6rem 1.2rem;
        transition: all 0.25s ease;
        letter-spacing: 0.3px;
    }
    .btn-primary {
        background: linear-gradient(135deg, #4e73df 0%, #3a5bce 100%);
        border: none;
    }
    .btn-primary:hover {
        background: linear-gradient(135deg, #3a5bce 0%, #2a4bb8 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
    }
    .btn-success {
        background: linear-gradient(135deg, #1cc88a 0%, #169f6c 100%);
        border: none;
    }
    .btn-success:hover {
        background: linear-gradient(135deg, #169f6c 0%, #128a5c 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(28, 200, 138, 0.3);
    }
    .btn-danger {
        background: linear-gradient(135deg, #e74a3b 0%, #d52a1a 100%);
        border: none;
    }
    .btn-danger:hover {
        background: linear-gradient(135deg, #d52a1a 0%, #b82318 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(231, 74, 59, 0.3);
    }
    .btn-action {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }

    /* Modern Tables */
    .table-container {
        border-radius: 10px;
        overflow: hidden;
    }
    .table-bordered {
        border: none;
    }
    .table-bordered th {
        background-color: #f8f9fc;
        border-top: none;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 1rem 0.75rem;
        color: #5a5c69;
    }
    .table-bordered td {
        vertical-align: middle;
        padding: 0.85rem 0.75rem;
        border-top: 1px solid rgba(227, 230, 240, 0.7);
        border-bottom: none;
        color: #434a5e;
    }
    .table-bordered tr:hover {
        background-color: #f8f9fd;
    }

    /* Card Header */
    .card-header {
        background: white;
        border-bottom: 1px solid rgba(227, 230, 240, 0.7);
        padding: 1.25rem 1.5rem;
    }

    /* Badge & Icons */
    .badge-job {
        padding: 0.4rem 0.7rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.85rem;
        background-color: #f0f3ff;
        color: #4e73df;
        display: inline-flex;
        align-items: center;
    }
    .action-icon {
        font-size: 0.75rem;
        margin-right: 0.4rem;
    }

    /* Custom Scrollbar for Table */
    .table-responsive::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    .table-responsive::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .table-responsive::-webkit-scrollbar-thumb {
        background: #c1c5d6;
        border-radius: 10px;
    }
    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: #a1a6b9;
    }
</style>
@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between page-header">
        <div>
            <h1 class="h3 mb-0 page-title">Manajemen Pekerjaan Orangtua</h1>
            <p class="page-subtitle">Kelola daftar pekerjaan orangtua untuk pendaftaran peserta</p>
        </div>
        <a href="{{route('pekerjaan_ortu.create')}}" class="btn btn-primary shadow">
            <i class="fas fa-plus fa-sm mr-2"></i>Tambah Pekerjaan
        </a>
    </div>

    <!-- Data Card -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pekerjaan Orangtua</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Opsi Ekspor:</div>
                    <a class="dropdown-item" href="#"><i class="fas fa-file-csv fa-sm fa-fw mr-2 text-gray-400"></i>Ekspor CSV</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-file-excel fa-sm fa-fw mr-2 text-gray-400"></i>Ekspor Excel</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i>Cetak</a>
                </div>
            </div>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive table-container">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="55%">Nama Pekerjaan</th>
                            <th width="35%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1 ?>
                        @foreach($items as $item)
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td>
                                <span class="badge-job">
                                    <i class="fas fa-briefcase mr-1"></i> {{$item->nama_pekerjaan}}
                                </span>
                            </td>
                            <td>
                                <a href="{{route('pekerjaan_ortu.edit', $item->id)}}" class="btn btn-success btn-action mr-2 shadow-sm">
                                    <i class="fas fa-edit action-icon"></i> Ubah
                                </a>
                                <form method="post" class="d-inline-block" action="{{route('pekerjaan_ortu.destroy', $item->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-action shadow-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pekerjaan ini?')">
                                        <i class="fas fa-trash action-icon"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
@push('script')
<!-- Page level plugins -->
<script src="{{url('sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('sbadmin/js/demo/datatables-demo.js')}}"></script>
@endpush
