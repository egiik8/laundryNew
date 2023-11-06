<!DOCTYPE html>
<html>
<head>
    <title>{{ \Carbon\Carbon::parse($tgl_awal)->format('d F Y') }}-{{ \Carbon\Carbon::parse($tgl_akhir)->format('d F Y') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        th, td {
            text-align: center; 
        }

        .invoice {
            margin: 20px;
            padding: 20px;
                    
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
      
        .invoice-items table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-items th, 
        .invoice-items td {
    max-width: 300px; 
    border: 1px solid #ccc;
    padding: 10px;
    word-wrap: break-word; 
    overflow-wrap: break-word; 
}

.invoice-items th {
    background-color:  #00FFFF !important;
 
}

        @media print {
            .print-button {
                display: none; 
            }
            th {
            background-color: #0000FF;
           
        }
        }
        
  

    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>Alisha Laundry</h1>
            <h2>Laporan Transaksi</h2>
            <p style="font-size:20px;">Dari tanggal {{ \Carbon\Carbon::parse($tgl_awal)->format('d F Y') }} sampai {{ \Carbon\Carbon::parse($tgl_akhir)->format('d F Y') }}</p>
            <a href="javascript:window.print();" class="print-button" style="padding: 5px 20px; background-color: #008CBA; color: #fff; text-decoration: none; cursor: pointer; margin-right: 10px;">
             Cetak
             </a>
             <a href="{{ route('laporan.download', ['tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]) }}" class="print-button print-only" style="padding: 5px 20px; background-color: #4CAF50; color: #fff; text-decoration: none; cursor: pointer;">
    Download
</a>
        </div>
        
        <div class="invoice-items">
            <table>
                <thead>
                    <tr> 
                        <th>Tanggal Pesan</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Paket</th>
                        <th>Berat</th>
                        <th>Total Bayar</th>
                        <th>Status Bayar</th>
                        <th>Status Laundry</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($laporan as $index => $laporan)
                    <tr> 
                    <td>{{ \Carbon\Carbon::parse($laporan->tgl_pesan)->format('d F Y') }}</td>
                        <td>{{ $laporan->kd_transaksi }}</td>
                        <td>{{ $laporan->pelanggans->nama }}</td>
                        <td>{{ $laporan->pakets->nama_paket }}</td>
                        <td>{{ $laporan->berat }} /Kg</td>
                        <td>Rp.{{ number_format($laporan->total_bayar, 2) }}</td>
                        <td>{{ $laporan->status_pembayaran }}</td>
                        <td>{{ $laporan->status}}</td>
                        <td>
                            @if ($laporan->catatan)
                            {{ $laporan->catatan }}
                            @else
                            <span style="color: red;">-</span>
                            @endif
                        </td>
                       @endforeach
                    </tr>               
                </tbody>
            </table>
        </div>
    </div>

    
    
</body>
</html>
