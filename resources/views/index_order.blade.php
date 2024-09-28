@extends('layouts.app')

@section('content')
<div class="order">
    <div class="container">
        
        <h1 class="text-center">Daftar Pesanan</h1>
        @if ($orders->isEmpty())
            <p class="fw-bold">Data tidak ditemukan!</p>
        @endif

        <div class="order-card d-flex justify-content-center">
            @foreach ($orders as $order)
                <div class="card">
                    <a href="{{ route('show.order', $order) }}"><h5>Order ID {{ $order->id }}</h5></a>
                    <small>By: {{ $order->user->name }}</small>
                    <p>
                        @if ($order->is_paid == true)
                        <p class="text-success fw-bold">Paid</p>
                        @else
                        <p class="text-danger fw-bold">Unpaid</p>
                            <a href="{{ url('storage/' . $order->payment_receipt) }}">Lihat transaksi pembayaran </a> <br>
                            @if (Auth::user()->is_admin)
                            <form action="{{ route('confirm.payment', $order) }}" method="post">
                                @csrf
                                <button class="btn btn-outline-success" type="submit">Konfirmasi Pembayaran</button>
                            </form>
                            @endif
                            
                        @endif
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
    