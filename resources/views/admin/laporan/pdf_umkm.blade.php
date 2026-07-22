<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data UMKM</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Data UMKM<br>Kabupaten Magetan</h2>
    <p>Dicetak pada: {{ date('d M Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama UMKM</th>
                <th width="20%">Pemilik</th>
                <th width="15%">Kecamatan</th>
                <th width="20%">No. HP</th>
                <th width="15%">Jml Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($umkm as $i => $u)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $u->nama }}</td>
                <td>{{ $u->pemilik }}</td>
                <td>{{ $u->kecamatan }}</td>
                <td>{{ $u->no_hp }}</td>
                <td>{{ $u->produks->count() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>