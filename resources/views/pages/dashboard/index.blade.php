@extends('layouts.index')
@push('style')
<link href="{{asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>
    /* Modern Dashboard Styling with Compact Layout */
    :root {
        --primary: #4e73df;
        --primary-dark: #2e59d9;
        --primary-light: #eaecf4;
        --success: #1cc88a;
        --success-light: #e6f8f3;
        --info: #36b9cc;
        --info-light: #e3f6f9;
        --warning: #f6c23e;
        --warning-light: #fff8eb;
        --danger: #e74a3b;
        --danger-light: #fceae8;
        --gray-dark: #5a5c69;
        --gray: #858796;
        --gray-light: #f8f9fc;
    }

    /* More Compact Card Styling */
    .card-dashboard {
        transition: all 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
        border: none;
        box-shadow: 0 3px 8px rgba(0,0,0,0.05);
        height: 100%;
    }
    .card-dashboard:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.07);
    }
    .card-body {
        padding: 1.25rem;
    }
    .card-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border-radius: 10px;
        background: var(--primary-light);
        margin-bottom: 0;
        color: var(--primary);
    }
    .icon-primary {
        background: var(--primary-light);
        color: var(--primary);
    }
    .icon-success {
        background: var(--success-light);
        color: var(--success);
    }
    .icon-info {
        background: var(--info-light);
        color: var(--info);
    }
    .icon-warning {
        background: var(--warning-light);
        color: var(--warning);
    }
    .icon-danger {
        background: var(--danger-light);
        color: var(--danger);
    }

    /* Stats Card Text */
    .stat-label {
        font-size: 0.8rem;
        letter-spacing: 0.03em;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.25rem;
        color: var(--gray);
    }
    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--gray-dark);
        margin-bottom: 0.25rem;
        line-height: 1.2;
    }
    .stat-change {
        font-size: 0.75rem;
        color: var(--success);
    }

    /* Compact Table Styling */
    .table-container {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 8px rgba(0,0,0,0.05);
        margin-bottom: 1rem;
    }
    .table-responsive {
        padding: 0;
    }
    .table {
        margin-bottom: 0;
    }
    .table-bordered {
        border: none;
    }
    .table-bordered th {
        border-top: none;
        border-bottom: 2px solid var(--primary-light);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.03em;
        padding: 0.75rem;
        color: var(--gray);
        background-color: #fff;
    }
    .table-bordered td {
        vertical-align: middle;
        padding: 0.75rem;
        border-top: 1px solid var(--primary-light);
        color: var(--gray-dark);
    }
    .table-hover tbody tr:hover {
        background-color: var(--gray-light);
    }

    /* Compact Status Badges */
    .status-badge {
        padding: 0.35rem 0.75rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.7rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-transform: uppercase;
    }
    .status-menunggu {
        background-color: var(--warning-light);
        color: var(--warning);
    }
    .status-ditolak {
        background-color: var(--danger-light);
        color: var(--danger);
    }
    .status-diterima {
        background-color: var(--success-light);
        color: var(--success);
    }

    /* Compact Action Buttons */
    .action-btn {
        border-radius: 8px;
        font-weight: 500;
        padding: 0.375rem 0.75rem;
        transition: all 0.2s;
        margin: 0 2px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }
    .action-btn i {
        margin-right: 0.3rem;
        font-size: 0.85rem;
    }
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }
    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
    }
    .btn-primary:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
    }
    .btn-delete {
        background-color: var(--danger);
        border-color: var(--danger);
        color: white;
    }
    .btn-delete:hover {
        background-color: #d52a1a;
        border-color: #d52a1a;
        color: white;
    }

    /* Compact Header Styling */
    .dashboard-header {
        padding: 1rem 0;
        margin-bottom: 1rem;
    }
    .dashboard-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--gray-dark);
        margin-bottom: 0;
    }
    .download-btn {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        font-size: 0.85rem;
    }

    /* Card Headers */
    .card-header {
        background-color: #fff;
        border-bottom: 1px solid var(--primary-light);
        padding: 1rem;
    }
    .card-title {
        font-weight: 700;
        color: var(--gray-dark);
        margin: 0;
        display: flex;
        align-items: center;
        font-size: 1rem;
    }
    .card-title i {
        margin-right: 0.5rem;
        color: var(--primary);
    }

    /* Empty state styling */
    .empty-state {
        padding: 2rem 0;
        text-align: center;
    }
    .empty-state i {
        font-size: 3rem;
        color: var(--gray);
        margin-bottom: 0.5rem;
        opacity: 0.5;
    }
    .empty-state p {
        font-size: 1rem;
        color: var(--gray);
    }

    /* Row spacing */
    .row {
        margin-bottom: 0.75rem;
    }
    .mb-4 {
        margin-bottom: 0.75rem !important;
    }
    .py-3 {
        padding-top: 0.75rem !important;
        padding-bottom: 0.75rem !important;
    }
</style>
@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="dashboard-header d-sm-flex align-items-center justify-content-between">
        <h1 class="dashboard-title">
            <i class="fas fa-graduation-cap mr-2 text-primary"></i>Dashboard PPDB
        </h1>
        <a href="{{ route('download') }}" class="download-btn btn btn-primary shadow">
            <i class="fas fa-download fa-sm mr-2"></i> Cetak Laporan
        </a>
    </div>

    <!-- Total Pendaftar Card -->
    <div class="row mb-2">
        <div class="col-12">
            <div class="card shadow card-dashboard">
                <div class="card-body d-flex justify-content-between align-items-center py-2">
                    <div>
                        <div class="stat-label text-info">Total Pendaftar</div>
                        <div class="stat-value">{{ $count_menunggu_peserta + $count_ditolak_peserta + $count_diterima_peserta }}</div>
                    </div>
                    <div class="card-icon icon-info">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row mb-2">
        <!-- Total Admin Card -->
        <div class="col-xl-3 col-md-6 mb-2">
            <div class="card shadow h-100 card-dashboard">
                <div class="card-body d-flex justify-content-between align-items-center py-2">
                    <div>
                        <div class="stat-label text-primary">Total Admin</div>
                        <div class="stat-value">{{ $count_user }}</div>
                    </div>
                    <div class="card-icon icon-primary">
                        <i class="fas fa-user-shield fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Menunggu Card -->
        <div class="col-xl-3 col-md-6 mb-2">
            <div class="card shadow h-100 card-dashboard">
                <div class="card-body d-flex justify-content-between align-items-center py-2">
                    <div>
                        <div class="stat-label text-warning">Menunggu</div>
                        <div class="stat-value">{{ $count_menunggu_peserta }}</div>
                    </div>
                    <div class="card-icon icon-warning">
                        <i class="fas fa-clock fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Ditolak Card -->
        <div class="col-xl-3 col-md-6 mb-2">
            <div class="card shadow h-100 card-dashboard">
                <div class="card-body d-flex justify-content-between align-items-center py-2">
                    <div>
                        <div class="stat-label text-danger">Ditolak</div>
                        <div class="stat-value">{{ $count_ditolak_peserta }}</div>
                    </div>
                    <div class="card-icon icon-danger">
                        <i class="fas fa-times-circle fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Diterima Card -->
        <div class="col-xl-3 col-md-6 mb-2">
            <div class="card shadow h-100 card-dashboard">
                <div class="card-body d-flex justify-content-between align-items-center py-2">
                    <div>
                        <div class="stat-label text-success">Diterima</div>
                        <div class="stat-value">{{ $count_diterima_peserta }}</div>
                    </div>
                    <div class="card-icon icon-success">
                        <i class="fas fa-check-circle fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Peserta Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4 table-container">
                <div class="card-header py-2">
                    <h6 class="card-title">
                        <i class="fas fa-list"></i> Data Peserta PPDB
                    </h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="25%">Nama</th>
                                    <th width="25%">Asal Sekolah</th>
                                    <th width="20%">Orang Tua</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @forelse($items as $item)
                                <tr>
                                    <td class="text-center">{{$i}}</td>
                                    <td class="font-weight-medium">{{$item->peserta->nama}}</td>
                                    <td>{{$item->peserta->asal_sekolah}}</td>
                                    <td>{{$item->peserta->nama_ortu}}</td>
                                    <td class="text-center">
                                        @if ($item->status == 'MENUNGGU')
                                            <span class="status-badge status-menunggu">
                                                <i class="fas fa-clock mr-1"></i> Menunggu
                                            </span>
                                        @endif
                                        @if ($item->status == 'DITOLAK')
                                            <span class="status-badge status-ditolak">
                                                <i class="fas fa-times-circle mr-1"></i> Ditolak
                                            </span>
                                        @endif
                                        @if ($item->status == 'DITERIMA')
                                            <span class="status-badge status-diterima">
                                                <i class="fas fa-check-circle mr-1"></i> Diterima
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('detail-peserta', $item->id) }}" class="btn btn-primary action-btn">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <form action="{{ route('delete-peserta', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete action-btn">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <i class="fas fa-folder-open"></i>
                                            <p>Belum ada data pendaftar</p>
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
    </div>
</div>
@endsection
@push('script')
    <!-- Page level plugins -->
    <script src="{{asset('sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('sbadmin/js/demo/datatables-demo.js')}}"></script>
@endpush
