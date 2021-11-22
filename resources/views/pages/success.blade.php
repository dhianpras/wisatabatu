@extends('layouts.success')

@section('title', 'Checkout Success')
@section('content')
<main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img src="{{ url('frontend/images/mailbox.png') }}" alt="">
                <h1>Yay! Berhasil</h1>
                <p>
                    Tiket Digital sudah dikirimkan ke email kamu
                    <br>
                    Tolong diperiksa
                </p>
                <a href="{{ url('/') }}" class="btn btn-home-page mt-3 px-5">
                    Home Page
                </a>
            </div>
        </div>
    </main>

@endsection