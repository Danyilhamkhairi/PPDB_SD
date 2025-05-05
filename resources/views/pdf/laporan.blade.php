<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peserta PPDB - SD NEGERI 98/X RANTAU INDAH</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0 auto;
            max-width: 900px;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #0066cc;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #0066cc;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        table th {
            background-color: #0066cc;
            color: white;
            padding: 12px;
            text-align: left;
        }
        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        table tr:nth-child(even) {
            background-color: #f2f7ff;
        }
        .signatures {
            display: flex;
            justify-content: flex-end;
            margin-top: 40px;
            text-align: center;
        }
        .signature-box {
            width: 40%;
            border-top: 1px solid #333;
            padding-top: 10px;
            margin-left: 20px;
        }
        .signature-box p {
            margin: 5px 0;
            font-size: 14px;
        }
        @media print {
            .signatures {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SD NEGERI 98/X RANTAU INDAH</h1>
        <p>Laporan Peserta Pendaftaran Peserta Didik Baru (PPDB)</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Asal Sekolah</th>
            </tr>
        </thead>
        <tbody>
            @php($i = 1)
            @foreach($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->asal_sekolah }}</td>
            </tr>
            @php($i++)
            @endforeach
        </tbody>
    </table>

    <div class="signatures">
        <div class="signature-box">
            <p>Mengetahui,</p>
            <p>Kepala Sekolah</p>
            <br><br><br>
            <p>______________________</p>
            <p>NIP. ___________________</p>
        </div>
    </div>
</body>
</html>
