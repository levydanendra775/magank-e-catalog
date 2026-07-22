<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Wisata</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Data Destinasi Wisata<br>Kabupaten Magetan</h2>
    <p>Dicetak pada: {{ date('d M Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama Wisata</th>
                <th width="15%">Kategori</th>
                <th width="15%">Kecamatan</th>
                <th width="25%">Alamat</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wisata as $i => $w)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $w->nama }}</td>
                <td>{{ $w->kategori }}</td>
                <td>{{ $w->kecamatan }}</td>
                <td>{{ $w->alamat }}</td>
                <td>{{ $w->status_publish ? 'Publish' : 'Draft' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>