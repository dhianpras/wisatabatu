@extends('layouts.checkout')

@section('title', 'Checkout')

@section('content')
<main>
        <section class="section-details-header">
            <section class="section-details-content">
                <div class="container">
                    <div class="row">
                        <div class="col p-0">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        Paket Wisata
                                    </li>
                                    <li class="breadcrumb-item">
                                        Details
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Checkout
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 pl-lg-0">
                            <div class="card card-details">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <h1>Siapa saja yang pergi?</h1>
                                <p>Pergi untuk {{ $item->travel_package->title }} ke {{ $item->travel_package->location }}</p>
                                <div class="attendee">
                                    <table class="table table-responsive-sm text-center">
                                        <thead>
                                            <tr>
                                                <td>Nama</td>
                                                <td>Usia</td>
                                                <td>Jenis Kelamin</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($item->details as $detail)
                                            <tr>
                                                <td class="align-middle">
                                                    {{ $detail->name }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $detail->age }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $detail->gender }}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout-remove', $detail->id) }}">
                                                        <img src="{{ url('frontend/images/remove.png') }}" alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    Tidak ada pengunjung
                                                </td>
                                            </tr>
                                        @endforelse                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="member mt-3">
                                    <h2>Tambah Orang</h2>
                                    <form class="form-inline" method="post" action="{{ route('checkout-create', $item->id) }}">
                                        @csrf
                                        <label for="name" class="sr-only">Nama</label>
                                        <input type="text" name="name" class="form-control mb-2 mr-sm-2" id="name" required placeholder="Nama">
                                        <label for="age" class="sr-only">Usia</label>
                                        <input type="text" name="age" class="form-control mb-2 mr-sm-2" id="age" required placeholder="Usia">
                                        <label for="gender" class="sr-only">Jenis kelamin</label>
                                        <select name="gender" id="gender" class="custom-select mb-2 mr-sm-2">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <button type="submit" class="btn btn-add-now mb-2 px-4">
                                            Tambahkan
                                        </button>
                                    </form>
                                    <h3 class="mt-2 mb-o">Catatan</h3>
                                    <p class="disclaimer mb-0">
                                        Isi data tersebut dengan benar.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-details card-right">
                                <h2>Checkout Information</h2>
                                <table class="trip-informations">
                                    <tr>
                                        <th width="50%">Jumlah Orang</th>
                                        <td width="50%" class="text-right">
                                        {{ $item->details->count() }} Orang
                                    </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Harga</th>
                                        <td width="50%" class="text-right">
                                        Rp {{ $item->travel_package->price }} / Orang
                                    </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Total Harga</th>
                                        <td width="50%" class="text-right">
                                            Rp {{ $item->transaction_total }}
                                    </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Total Harga (+Kode Unik)</th>
                                        <td width="50%" class="text-right text-total">
                                            <span class="text-blue">Rp {{ $item->transaction_total }},</span>
                                            <span class="text-orange">{{ mt_rand(0,99) }}</span>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <h2>Petunjuk Pembayaran</h2>
                                <p class="payment-instructions">
                                    Harap selesaikan pembayaran untuk melakukan perjalanan
                                </p>
                                <div class="bank">
                                    <div class="bank-item pb-3">
                                        <img src="{{ url('frontend/images/bank.png') }}" alt="" class="bank-image">
                                        <div class="description">
                                            <h3>Nuning Sucahyowati</h3>
                                            <p>
                                                6860 1487 55
                                                <br>
                                                Bank Central Asia
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="bank-item pb-3">
                                        <img src="{{ url('frontend/images/bank.png') }}" alt="" class="bank-image">
                                        <div class="description">
                                            <h3>Nuning Sucahyowati</h3>
                                            <p>
                                                0700 0018 5555
                                                <br>
                                                Bank Mandiri
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="join-container">
                                <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mat-3 py-2">
                                    Siap Bayar
                                </a>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ route('detail', $item->travel_package->slug) }}" class="text-muted">
                                    Cancel Booking
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
@endsection