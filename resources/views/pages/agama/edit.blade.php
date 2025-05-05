@extends('layouts.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between page-header">
        <div>
            <h1 class="h3 mb-0 page-title">Edit Agama</h1>
            <p class="page-subtitle">Perbarui data agama dalam sistem</p>
        </div>
        <a href="{{route('agama.index')}}" class="btn btn-warning shadow">
            <i class="fas fa-arrow-left fa-sm mr-2"></i>Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Data Agama</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <form action="{{route('agama.update', $data->id)}}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label for="nama_agama" class="font-weight-bold">Nama Agama</label>
                            <input type="text" class="form-control" id="nama_agama" value="{{$data->nama_agama}}" name="nama_agama" required>
                        </div>

                        <div class="form-group mt-4 d-flex justify-content-between">
                            <a href="{{route('agama.index')}}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                <i class="fas fa-save mr-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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

    /* Form Controls */
    .form-control {
        padding: 0.75rem 1rem;
        border-radius: 8px;
        border: 1px solid rgba(227, 230, 240, 0.8);
        font-size: 0.95rem;
        color: #2e384d;
        transition: all 0.2s;
        height: auto;
    }
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    /* Labels */
    label {
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        color: #5a5c69;
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
    .btn-secondary {
        background: linear-gradient(135deg, #858796 0%, #6e7082 100%);
        border: none;
        color: white;
    }
    .btn-secondary:hover {
        background: linear-gradient(135deg, #6e7082 0%, #5a5c69 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(133, 135, 150, 0.3);
        color: white;
    }
    .btn-warning {
        background: linear-gradient(135deg, #f6c23e 0%, #e4af2b 100%);
        border: none;
        color: white;
    }
    .btn-warning:hover {
        background: linear-gradient(135deg, #e4af2b 0%, #d4a01d 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(246, 194, 62, 0.3);
        color: white;
    }

    /* Card Header */
    .card-header {
        background: white;
        border-bottom: 1px solid rgba(227, 230, 240, 0.7);
        padding: 1.25rem 1.5rem;
    }
</style>
@endsection
