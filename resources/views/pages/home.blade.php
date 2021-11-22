@extends('layouts.app')

@section('title')
Paket Wisata Batu
@endsection

@section('content')

<!-- Header -->
<header class="text-center">
        <br><br>
        <h1>Pesona Kota Wisata Batu</h1>
        <p>
            Dapatkan momen indahmu
            <br><br><br>
        </p>
        <a href="#paketwisata" class="btn btn-get-started px-4 mt-4">
            Ayo Kunjungi
        </a>
    </header>
    <main>
        <section class="section-paketwisata" id="paketwisata">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-paketwisata-heading">
                        <h2>Daftar Paket Wisata</h2>
                        <br>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-paketwisata-content" id="paketwisataContent">
            <div class="container">
                <div class="section-paketwisata-travel row justify-content-center">
                    @foreach ($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex flex-column"
                        style="background-image: url('{{ $item->galleries->count() ? Storage::url
                        ($item->galleries->first()->image) : '' }}');"
                        >
                            <div class="travel-location">{{ $item->title }}</div>
                            <div class="travel-button mt-auto">
                                <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4">View Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="section-networks" id="networks">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <img src="{{ url('frontend/images/partner.png') }}" alt="Logo Partner" class="img-partner">
                    </div>
                </div>
            </div>
        </section>


@endsection