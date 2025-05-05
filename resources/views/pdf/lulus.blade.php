<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Surat Penerimaan Siswa</title>
    <style>
        @page {
            margin: 1cm;
            size: A4 portrait;
        }
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.3;
            margin: 0;
            padding: 0;
            font-size: 11pt;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .school-name {
            font-size: 16pt;
            font-weight: bold;
            color: #1976D2;
            margin-bottom: 5px;
        }
        .school-address {
            font-size: 9pt;
            color: #666;
            margin-bottom: 8px;
        }
        .divider {
            width: 100%;
            height: 1px;
            background-color: #1976D2;
            margin: 8px 0;
        }
        .title {
            font-size: 14pt;
            font-weight: bold;
            color: #1976D2;
            margin: 12px 0;
            text-align: center;
        }
        .congrats {
            font-size: 12pt;
            font-weight: bold;
            color: #1976D2;
            margin: 5px 0 15px;
            text-align: center;
        }
        .student-info-table {
            width: 100%;
            margin: 15px 0;
            border-collapse: collapse;
        }
        .student-info-table td {
            padding: 3px 0;
            vertical-align: top;
        }
        .photo-cell {
            width: 3cm;
            text-align: right;
        }
        .label-cell {
            font-weight: bold;
            width: 150px;
        }
        .colon-cell {
            width: 10px;
        }
        .photo {
            width: 3cm;
            height: 4cm;
            border: 1px solid #ddd;
        }
        .message {
            font-size: 10pt;
            margin: 15px 0;
            text-align: justify;
        }
        .highlight {
            font-weight: bold;
        }
        .registration-info {
            background-color: #f0f4ff;
            border-left: 3px solid #1976D2;
            padding: 8px 10px;
            margin: 10px 0;
            font-size: 9pt;
        }
        .date {
            text-align: right;
            font-size: 9pt;
            margin: 15px 0;
        }
        .signature-section {
            text-align: center;
            margin-top: 30px;
        }
        .signature {
            display: inline-block;
            width: 200px;
        }
        .signature-line {
            width: 100%;
            height: 1px;
            background-color: #333;
            margin-top: 40px;
        }
        .signature-name {
            font-weight: bold;
            margin-top: 5px;
            font-size: 10pt;
        }
        .signature-title {
            font-size: 9pt;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="school-name">SD NEGERI 98/X RANTAU INDAH</div>
            <div class="school-address">Jl. Rantau Indah No. 98, Kecamatan Rantau, Kabupaten Indah</div>
        </div>

        <div class="divider"></div>

        <div class="title">SURAT PENERIMAAN PESERTA DIDIK BARU</div>
        <div class="congrats">SELAMAT ANAK BAPAK/IBU TELAH DITERIMA!</div>

        <table class="student-info-table">
            <tr>
                <td class="label-cell">Nama Lengkap</td>
                <td class="colon-cell">:</td>
                <td>{{ $item->peserta->nama ?? 'N/A' }}</td>
                <td class="photo-cell" rowspan="7">
                    @php
                        $imagePath = isset($foto) && $foto ? storage_path('app/public/'.$foto) : null;
                        $imageData = null;

                        if ($imagePath && file_exists($imagePath)) {
                            $imageData = base64_encode(file_get_contents($imagePath));
                        }
                    @endphp

                    @if($imageData)
                        <img src="data:image/jpeg;base64,{{ $imageData }}" alt="Foto Siswa" class="photo">
                    @else
                        <div class="photo" style="background-color: #f0f0f0; display: flex; justify-content: center; align-items: center;">
                            <span style="color: #999; font-size: 9pt;">Foto tidak tersedia</span>
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="label-cell">Nomor Pendaftaran</td>
                <td class="colon-cell">:</td>
                <td>{{ $item->id ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="label-cell">Tempat, Tanggal Lahir</td>
                <td class="colon-cell">:</td>
                <td>{{ $item->peserta->tempat_lahir ?? 'N/A' }}, {{ isset($item->peserta->tanggal_lahir) ? \Carbon\Carbon::parse($item->peserta->tanggal_lahir)->format('d-m-Y') : 'N/A' }}</td>
            </tr>
            <tr>
                <td class="label-cell">Jenis Kelamin</td>
                <td class="colon-cell">:</td>
                <td>{{ $item->peserta->jenkel->jenis_kelamin ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="label-cell">Agama</td>
                <td class="colon-cell">:</td>
                <td>{{ $item->peserta->agama->nama_agama ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="label-cell">Asal Sekolah</td>
                <td class="colon-cell">:</td>
                <td>{{ $item->peserta->asal_sekolah ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="label-cell">Nama Orang Tua</td>
                <td class="colon-cell">:</td>
                <td>{{ $item->peserta->orang_tua->nama_ayah ?? 'N/A' }} & {{ $item->peserta->orang_tua->nama_ibu ?? 'N/A' }}</td>
            </tr>
        </table>

        <div class="message">
            Dengan ini, Panitia Penerimaan Peserta Didik Baru (PPDB) SD Negeri 98/X Rantau Indah dengan bangga mengumumkan bahwa putra/putri Bapak/Ibu telah <span class="highlight">DITERIMA</span> sebagai peserta didik baru untuk tahun ajaran 2025/2026.
        </div>

        <div class="registration-info">
            <p style="margin: 3px 0;"><strong>Informasi Daftar Ulang:</strong></p>
            <p style="margin: 3px 0;">
                <strong>Tanggal:</strong> 1 - 5 Juli 2025 |
                <strong>Waktu:</strong> 08.00 - 14.00 WIB |
                <strong>Tempat:</strong> Ruang Administrasi
            </p>
            <p style="margin: 3px 0;"><strong>Berkas:</strong> Fotokopi Akta Kelahiran, Kartu Keluarga, KTP Orang Tua, dan Pas Foto 3x4 (3 lembar)</p>
        </div>

        <div class="date">Rantau Indah, {{ \Carbon\Carbon::now()->format('d F Y') }}</div>

    </div>
</body>
</html>
