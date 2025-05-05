@extends('layouts.index')
@push('style')
<link href="{{url('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>
    .btn-action {
        border-radius: 4px;
        padding: 0.375rem 0.75rem;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .card {
        border-radius: 8px;
        overflow: hidden;
        border: none;
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
        letter-spacing: 0.03em;
    }
    .table-bordered td {
        vertical-align: middle;
        padding: 0.75rem;
    }
    .user-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: #4e73df;
        color: white;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-right: 10px;
    }
    .user-name {
        font-weight: 600;
        color: #5a5c69;
    }
    .email-text {
        color: #858796;
        font-size: 0.9rem;
    }
    .page-header {
        margin-bottom: 1.5rem;
        border-bottom: 1px solid #e3e6f0;
        padding-bottom: 1rem;
    }
    .badge-role {
        padding: 0.35em 0.65em;
        font-size: 0.75em;
        border-radius: 0.25rem;
        background-color: #e0eaff;
        color: #4e73df;
        font-weight: 600;
    }
    .add-btn {
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        transition: all 0.2s;
    }
    .add-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between page-header">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Pengelolaan Pengguna</h1>
            <p class="mt-2 text-gray-600">Mengelola akun administrator dengan akses ke sistem</p>
        </div>
        <a href="{{route('user.create')}}" class="d-none d-sm-inline-block btn btn-primary add-btn">
            <i class="fas fa-user-plus fa-sm mr-2"></i>Tambah Pengguna
        </a>
    </div>

    <!-- User Data Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna Sistem</h6>
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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="40%">Pengguna</th>
                            <th width="25%">Peran</th>
                            <th width="30%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1 ?>
                        @foreach($items as $item)
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar">
                                        {{ substr($item->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="user-name">{{$item->name}}</div>
                                        <div class="email-text">{{$item->email}}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-role">Administrator</span>
                            </td>
                            <td>
                                <a href="{{route('user.edit', $item->id)}}" class="btn btn-success btn-action mr-2">
                                    <i class="fas fa-edit fa-sm mr-1"></i> Ubah
                                </a>
                                @if (count($items) > 1)
                                    <form method="post" class="d-inline-block" action="{{route('user.destroy', $item->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-action" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                            <i class="fas fa-trash fa-sm mr-1"></i> Hapus
                                        </button>
                                    </form>
                                @endif
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
