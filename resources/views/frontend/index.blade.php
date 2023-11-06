@extends('frontend.master')
@section('frontend')
<style>
  .text-success {
    color: green;
}
</style>


  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Laundry Cepat Berkualitas Terjamin</h2>
          <!-- <p data-aos="fade-up" data-aos-delay="100">Facere distinctio molestiae nisi fugit tenetur repellat non praesentium nesciunt optio quis sit odio nemo quisquam. eius quos reiciendis eum vel eum voluptatem eum maiores eaque id optio ullam occaecati odio est possimus vel reprehenderit</p> -->
          <form action="{{ route('lacak.pesanan') }}" method="get" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
         @csrf
         <input type="text" class="form-control" name="kd_transaksi" placeholder="Lacak Pesanan">
         <button type="submit" class="btn btn-primary">Search</button>
         </form>

       @if(isset($pesanData))
    @if ($pesanData->count() > 0)
        <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">
            @foreach ($pesanData as $pesan)
                <div class="col-lg-6">
                    <div class="stats-item text-center w-100 h-100" style="display: flex; flex-direction: column; justify-content: center;">
                        <span style="font-size: 22px;">{{ $pesan->pelanggans->nama }}</span>
                        <p style="font-size: 14px; margin-bottom: 50px;">Tanggal Pesan: {{ \Carbon\Carbon::createFromFormat('Y-m-d', $pesan->tgl_pesan)->format('d F Y') }}</p>
                        <span style="font-size: 22px;" class="{{ $pesan->status == 'Selesai' ? 'text-success' : '' }}">{{ $pesan->status }}</span>
                        <p style="font-size: 14px;">Diupdate: {{ $pesan->updated_at->tz('Asia/Jakarta')->format('Y-m-d H:i:s') }} WIB</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Data tidak ditemukan.</p>
    @endif
@endif
</div>
        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="{{asset('frontends/img/ll.png')}}" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>
      </div>
    </div>
  </section>


  
  <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <span>Paket Yang Ditawarkan</span>
            <h2>Paket Yang Ditawarkan</h2>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-10">
                <div class="accordion accordion-flush" id="faqlist">
                    @foreach ($dataPaket as $item)
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-{{ $item->id }}">
                                    <i class="bi bi-bag-check" style="margin-right: 10px;"></i>
                                    {{$item->nama_paket}}
                                </button>
                            </h3>
                            <div id="faq-content-{{ $item->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    {{$item->deskripsi}}
                                    <p>Harga : Rp.{{ number_format($item->harga, 2) }} /Kg</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div style="display: flex; justify-content: center; align-items: center; margin: 30px;">
                <a href="{{route('semuaPaket.view')}}">
               <button style="width: 120px; height: 38px; font-size: 16px; border-radius: 4px; padding: 2px 2px;"
            type="button" class="btn btn-primary waves-light btn-sm waves-effect">Semua Paket</button>
    </a>
</div>

            </div>
        </div>
    </div>
</section>

@endsection