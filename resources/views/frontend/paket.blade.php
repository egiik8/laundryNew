@extends('frontend.master')
@section('frontend')

<div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Paket</h2>
              <p>Temukan Paket Sesuai Kebutuhan Anda</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Paket</li>
          </ol>
        </div>
      </nav>
    </div>

    <section id="faq" class="faq">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <span>Paket Yang Ditawarkan</span>
      <h2>Paket Yang Ditawarkan</h2>
    </div>

    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-10">
      @if(isset($dataPaket))
        @if ($dataPaket->count() > 0)
          <div class="accordion accordion-flush" id="faqlist">
          @foreach ($dataPaket as $item)
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $item->id }}">
                    <i class="bi bi-bag-check" style="margin-right: 10px;"></i>
                    {{$item->nama_paket}}
                </button>
            </h3>
            <div id="faq-content-{{ $item->id }}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                    {{$item->deskripsi}}
                    <p>Harga : Rp.{{ number_format($item->harga, 2) }} /Kg</p>
                </div>
            </div>
        </div> 
        @endforeach
          </div>
          @endif
          @endif
      </div>
    </div>
  </div>
</section>

  @endsection