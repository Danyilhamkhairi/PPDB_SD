@extends('pages.home.index')

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
            <li class="active"><a href="{{ route('landing-page') }}">Home</a></li>
            <li><a href="{{ route('hasil') }}">Hasil Pendaftaran</a></li>
            <li class="get-started"><a href="{{ route('daftar') }}">Daftar</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header>

<!-- Add Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Add custom CSS -->
<style>
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        transition: all 0.3s;
    }
    .card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    .form-control {
        border-radius: 8px;
        padding: 10px 15px;
        border: 1px solid #ddd;
        transition: all 0.3s;
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.15);
        border-color: #80bdff;
    }
    label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #495057;
    }
    .input-icon {
        position: relative;
    }
    .input-icon i {
        position: absolute;
        left: 12px;
        top: 14px;
        color: #6c757d;
    }
    .input-icon .form-control {
        padding-left: 40px;
    }
    .timeline-step {
        position: relative;
        padding: 20px;
        transition: all 0.3s;
    }
    .timeline-step .icon-container {
        height: 70px;
        width: 70px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #4e73df;
        color: white;
        border-radius: 50%;
        font-size: 30px;
        box-shadow: 0 4px 10px rgba(78, 115, 223, 0.3);
    }
    .timeline-step h4 {
        margin-top: 15px;
        font-weight: 600;
        color: #343a40;
    }
    .timeline-step p {
        color: #6c757d;
    }
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s;
    }
    .btn-primary:hover {
        background-color: #3756a4;
        border-color: #3756a4;
        transform: translateY(-2px);
    }
    .alert {
        border-radius: 8px;
        border-left: 4px solid #e74a3b;
    }
    .section-title {
        padding-bottom: 15px;
        position: relative;
        color: #343a40;
        font-weight: 700;
    }
    .section-title:after {
        content: '';
        position: absolute;
        display: block;
        width: 50px;
        height: 3px;
        background: #4e73df;
        bottom: 0;
        left: 0;
    }
    .section-title.centered:after {
        left: 50%;
        transform: translateX(-50%);
    }
    .select-arrow select {
        appearance: none;
        -webkit-appearance: none;
        padding: 12px 40px 12px 15px; /* Padding lebih besar untuk tampilan yang lebih baik */
        height: auto; /* Membiarkan height mengikuti padding */
        font-size: 1rem; /* Ukuran font yang lebih besar */
        width: 100%; /* Memastikan lebar penuh */
        border-radius: 8px; /* Border radius untuk tampilan yang lebih modern */
    }

    .select-arrow {
        position: relative;
        display: block;
        width: 100%;
    }

    .select-arrow:after {
        content: '\f078';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        right: 15px;
        top: 50%; /* Posisikan di tengah secara vertikal */
        transform: translateY(-50%); /* Pastikan benar-benar di tengah */
        pointer-events: none;
        font-size: 14px; /* Ukuran ikon yang lebih besar */
        color: #4e73df; /* Warna yang sesuai dengan tema */
    }

    /* Styling tambahan untuk hover dan focus */
    .select-arrow select:hover {
        border-color: #a0aec0;
    }

    .select-arrow select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        outline: none;
    }

    /* Styling untuk photo upload */
    .photo-upload {
        position: relative;
        width: 100%;
        margin-bottom: 20px;
    }

    .photo-upload-area {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 2px dashed #ccc;
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        background-color: #f8f9fc;
        transition: all 0.3s;
        cursor: pointer;
    }

    .photo-upload-area:hover {
        border-color: #4e73df;
        background-color: #f0f4ff;
    }

    .photo-upload-icon {
        font-size: 36px;
        color: #4e73df;
        margin-bottom: 15px;
    }

    .photo-preview {
        margin-top: 20px;
        max-width: 100%;
        max-height: 200px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        display: none;
    }

    .photo-upload-text {
        font-weight: 600;
        color: #4e73df;
    }

    .photo-upload-hint {
        font-size: 14px;
        color: #6c757d;
        margin-top: 8px;
    }

    .photo-upload-input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
</style>

<main id="main">
    <div class="container" style="margin-top: 150px;">
        @if ($errors->any())
            <div class="alert-container mb-4">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle mr-2"></i> {{$error}}
                    </div>
                @endforeach
            </div>
        @endif

        <h2 class="text-center mt-5 mb-4 section-title centered">Tata Cara PPDB Online</h2>
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="card h-100 timeline-step">
                    <div class="icon-container">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="card-body text-center">
                        <h4>Daftar</h4>
                        <p>Calon peserta didik baru akses laman situs PPDB online</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 timeline-step">
                    <div class="icon-container">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="card-body text-center">
                        <h4>Memberikan Bukti Berkas</h4>
                        <p>Calon peserta didik mempersiapkan beberapa dokumen penting yang dibutuhkan untuk memverifikasi data</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 timeline-step">
                    <div class="icon-container">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="card-body text-center">
                        <h4>Verifikasi Data</h4>
                        <p>Operator akan melakukan verifikasi pengajuan akun dan berkas secara online</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 timeline-step">
                    <div class="icon-container">
                        <i class="fas fa-flag-checkered"></i>
                    </div>
                    <div class="card-body text-center">
                        <h4>Hasil</h4>
                        <p>Calon peserta didik baru akan mengecek apakah mereka telah lulus atau tidak di halaman <strong>"Hasil Pendaftaran"</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5 mb-5">
            <div class="card-body p-4">
                <h2 class="mb-4 section-title">
                    <i class="fas fa-user-graduate mr-2"></i> Biodata Calon Siswa
                </h2>
                <hr>
                <form action="{{ route('daftar-kirim') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-user mr-2"></i>Nama</label>
                                <div class="input-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="nama" class="form-control" autocomplete="off" autofocus placeholder="Masukkan nama lengkap">
                                </div>
                            </div>
                        </div>

                        <!-- Photo Upload Section -->
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-image mr-2"></i>Foto Siswa</label>
                                <div class="photo-upload">
                                    <div class="photo-upload-area" id="photoUploadArea">
                                        <div class="photo-upload-icon">
                                            <i class="fas fa-camera"></i>
                                        </div>
                                        <div class="photo-upload-text">Klik atau seret foto ke sini</div>
                                        <div class="photo-upload-hint">Ukuran maksimal 2MB (JPG, PNG)</div>
                                        <input type="file" name="foto_siswa" id="fotoSiswa" class="photo-upload-input" accept="image/*">
                                    </div>
                                    <img id="photoPreview" class="photo-preview" src="#" alt="Preview Foto">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-phone mr-2"></i>No Telepon</label>
                                <div class="input-icon">
                                    <i class="fas fa-phone"></i>
                                    <input type="number" name="no_telp" class="form-control" autocomplete="off" placeholder="Masukkan nomor telepon">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-pray mr-2"></i>Agama</label>
                                <div class="select-arrow">
                                    <select name="id_agama" class="form-control">
                                        @forelse ($agama as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_agama }}</option>
                                        @empty
                                            <option value="">NO Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-calendar-alt mr-2"></i>Tanggal Lahir</label>
                                <div class="input-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                    <input type="date" name="tanggal_lahir" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt mr-2"></i>Tempat Lahir</label>
                                <div class="input-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input type="text" name="tempat_lahir" class="form-control" autocomplete="off" placeholder="Masukkan tempat lahir">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-school mr-2"></i>Asal Sekolah</label>
                                <div class="input-icon">
                                    <i class="fas fa-school"></i>
                                    <input type="text" name="asal_sekolah" class="form-control" autocomplete="off" placeholder="Masukkan nama sekolah asal">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-home mr-2"></i>Alamat</label>
                                <div class="input-icon">
                                    <i class="fas fa-home"></i>
                                    <textarea name="alamat" rows="5" class="form-control" placeholder="Masukkan alamat lengkap"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-venus-mars mr-2"></i>Jenis Kelamin</label>
                                <div class="select-arrow">
                                    <select name="id_jenis_kelamin" class="form-control">
                                        @forelse ($jenkel as $item)
                                            <option value="{{ $item->id }}">{{ $item->jenis_kelamin }}</option>
                                        @empty
                                            <option value="">NO Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <h2 class="mb-4 section-title">
                                <i class="fas fa-users mr-2"></i> Biodata Orang Tua
                            </h2>
                            <hr>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-user-tie mr-2"></i>Nama Orang Tua (Ayah)</label>
                                <div class="input-icon">
                                    <i class="fas fa-user-tie"></i>
                                    <input type="text" name="nama_ayah" class="form-control" autocomplete="off" placeholder="Masukkan nama ayah">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-briefcase mr-2"></i>Pekerjaan Ayah</label>
                                <div class="select-arrow">
                                    <select name="id_pekerjaan_ayah" class="form-control">
                                        @forelse ($pekerjaan_ortu as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_pekerjaan }}</option>
                                        @empty
                                            <option value="">NO Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-money-bill-wave mr-2"></i>Penghasilan Ayah</label>
                                <div class="select-arrow">
                                    <select name="id_penghasilan_ayah" class="form-control">
                                        @forelse ($hasil_ortu as $item)
                                            <option value="{{ $item->id }}">{{ "Rp " . number_format($item->penghasilan_ortu,0,',','.') }}</option>
                                        @empty
                                            <option value="">NO Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-female mr-2"></i>Nama Orang Tua (Ibu)</label>
                                <div class="input-icon">
                                    <i class="fas fa-female"></i>
                                    <input type="text" name="nama_ibu" class="form-control" autocomplete="off" placeholder="Masukkan nama ibu">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-briefcase mr-2"></i>Pekerjaan Ibu</label>
                                <div class="select-arrow">
                                    <select name="id_pekerjaan_ibu" class="form-control">
                                        @forelse ($pekerjaan_ortu as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_pekerjaan }}</option>
                                        @empty
                                            <option value="">NO Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-money-bill-wave mr-2"></i>Penghasilan Ibu</label>
                                <div class="select-arrow">
                                    <select name="id_penghasilan_ibu" class="form-control">
                                        @forelse ($hasil_ortu as $item)
                                            <option value="{{ $item->id }}">{{ "Rp " . number_format($item->penghasilan_ortu,0,',','.') }}</option>
                                        @empty
                                            <option value="">NO Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-phone-alt mr-2"></i>No Telepon Orangtua</label>
                                <div class="input-icon">
                                    <i class="fas fa-phone-alt"></i>
                                    <input type="number" name="no_telp_ortu" class="form-control" autocomplete="off" placeholder="Masukkan nomor telepon orangtua">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary btn-lg w-100" type="submit">
                                <i class="fas fa-paper-plane mr-2"></i> Kirim Pendaftaran
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@push('add-scripts')
<script>
    // Preview foto yang diupload
    document.getElementById('fotoSiswa').addEventListener('change', function(e) {
        const file = e.target.files[0];

        if (file) {
            // Validate file size (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 2MB.');
                this.value = '';
                return;
            }

            // Validate file type
            if (!['image/jpeg', 'image/jpg', 'image/png'].includes(file.type)) {
                alert('Format file tidak didukung. Gunakan JPG atau PNG.');
                this.value = '';
                return;
            }

            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('photoPreview');
                const uploadArea = document.getElementById('photoUploadArea');

                preview.src = e.target.result;
                preview.style.display = 'block';
                uploadArea.style.display = 'none';
            }

            reader.readAsDataURL(file);
        }
    });

    // Allow clicking the preview to change the photo
    document.getElementById('photoPreview').addEventListener('click', function() {
        document.getElementById('fotoSiswa').click();
    });
</script>
@endpush
<!-- End #main -->
@endsection
