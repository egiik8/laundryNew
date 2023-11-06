<!DOCTYPE html>
<html>
<head>
    <title>Invoice-{{ $pesanan->kd_transaksi }}</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .invoice {
        max-width: 200px; 
        margin: 0 auto;
        text-align: left;
        padding: 10px;
       
    }

    .invoice-logo img {
        max-width: 80px; 
    }

    .invoice-header {
        text-align: center;
    }

    .invoice-details p {
        margin: 5px 0;
    }

    .invoice-items {
        margin-top: 10px;
        border-top: 1px solid #000;
        border-bottom: 1px solid #000; 
        padding: 5px 0;
    }

    .item-row {
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #000; 
    }

    .item-name {
        flex: 2;
        font-size: 12px;
        max-width: 50%; 
        padding: 5px;
        word-wrap: break-word; 
        white-space: pre-wrap; 
    }

    .item-quantity, .item-price {
        flex: 2; 
        text-align: right;
        font-size: 12px;
        max-width: 50%; 
        padding: 5px;
        word-wrap: break-word; 
        white-space: pre-wrap; 
    }

    .invoice-total {
        margin-top: 10px;
        text-align: right;
    }
   
    @media screen and (max-width: 320px) {
        .invoice {
            max-width: 100%; 
            padding: 5px;
        }

        .invoice-details p, .item-name, .item-quantity, .item-price, .invoice-total p {
            font-size: 10px;
        }
    }
    @media print {
            .print-button {
                display: none; 
            }
            .invoice-total {
                page-break-after: always; 
            }
        }
</style>

</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h2 style=" margin-bottom: -10px;">Alisha Laundry</h1>
            <p style="font-size: 13px;  margin-bottom: -10px;">Barat Pasar Wit-witan</p>
            <p style="font-size: 12px;">Telp. (08xxxxxxxxx)</p>
            <!-- <p style="font-size: 12px; margin-bottom: -10px;">Telp. (08xxxxxxxxx)</p>
            <p style="font-size: 12px;">Telp. (08xxxxxxxxx)</p> -->




        </div>

        <div class="invoice-details" style="font-size: 12px; max-width: 100%; word-wrap: break-word;">
        <p style="font-weight: bold;">Invoice #: {{ $pesanan->kd_transaksi }}</p>
        <p>Nama Pelanggan : {{ $pesanan->pelanggans->nama }}</p>
        <p>Alamat : {{ $pesanan->pelanggans->alamat }}</p>
        <p>Tanggal Pesan : {{ \Carbon\Carbon::createFromFormat('Y-m-d', $pesanan->tgl_pesan)->format('d F Y') }}</p>
        <p>Status Pembayaran : {{ $pesanan->status_pembayaran }}</p>
        <p>Status Laundry : {{ $pesanan->status }}</p>
        <p>Tanggal Pembayaran : @if ($pesanan->tgl_pembayaran)
        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $pesanan->tgl_pembayaran)->format('d F Y') }}
        @else
        <span style="color: red;">-</span>
        @endif
        </p>
        <p>Tanggal Pengambilan : @if ($pesanan->tgl_pengambilan)
        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $pesanan->tgl_pengambilan)->format('d F Y') }}
        @else
        <span style="color: red;">-</span>
        @endif
        </p>
        <p>Diantar :  @if ($pesanan->delivery)
                            Ya
                          @else
                            Tidak
                          @endif</p>
        <p>Catatan : @if ($pesanan->catatan)
        {{ $pesanan->catatan }}
        @else
        <span style="color: red;">-</span>
        @endif
        </p>
</div>



        <div class="invoice-items">
        
            <div class="item-row">
                <div class="item-name">Jenis Paket :</div>
                <div class="item-quantity">{{ $pesanan->pakets->nama_paket }}</div>
            </div>
            <div class="item-row">
                <div class="item-name">Deskripsi Paket :</div>
                <div class="item-quantity">{{ $pesanan->pakets->deskripsi }}</div>
            </div>
            <div class="item-row">
                <div class="item-name">Harga Paket :</div>
                <div class="item-quantity">Rp.{{ number_format($pesanan->pakets->harga, 2) }}</div>
            </div>
                <div class="item-row">
                <div class="item-name">Berat :</div>
                <div class="item-quantity">{{ $pesanan->berat }}/Kg</div>
            </div>
            <div class="item-row">
                <div class="item-name"> Diskon :</div>
                <div class="item-quantity"> @if (isset($pesanan->diskon_persen)){{ $pesanan->diskon_persen }} % @else <span style="color: red;">-</span> @endif</div>
            </div>
            <div class="item-row">
                <div class="item-name"> Pajak :</div>
                <div class="item-quantity"> @if (isset($pesanan->pajak_persen)){{ $pesanan->pajak_persen }} % @else <span style="color: red;">-</span> @endif</div>
            </div>
            <div class="item-row">
                <div class="item-name"> Biaya Pengantaran :</div>
                <div class="item-quantity">@if (isset($pesanan->biaya_delivery))Rp.{{ number_format($pesanan->biaya_delivery, 2) }} @else <span style="color: red;">-</span> @endif</div>
            </div>
        </div>

        <div class="invoice-total">
       <p style="font-weight: bold; font-size: 13px;">SubTotal: Rp.{{ number_format($pesanan->total_bayar, 2) }}</p>
        </div>



       <a href="javascript:window.print();" class="print-button print-only" style="padding: 5px 20px; background-color: #008CBA; color: #fff; border: none; cursor: pointer; text-decoration: none; margin-right: 10px;">
          Cetak
        </a>

    </div>

    <script>
        function printAndCut() {
            const cutCommand = '\x1D\x56\x00'; 
            window.close();
        }
    </script>
</body>
</html>