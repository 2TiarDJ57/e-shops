@extends('layouts.app')

@section('content')
<a href="{{ route('index.order') }}">Kembali</a>
<div class="order">
    @php
        $total_price = 0;
    @endphp

    <div class="container">
        <div class="order-card d-flex justify-content-center">
            
            <div class="card">
                <h5>Order ID {{ $order->id }}</h5>
                <small class="fw-light">By: {{ $order->user->name }}</small>

                @if ($order->is_paid == true)
                    <p class="text-success fw-bold">Paid</p>
                @else
                    <p class="text-danger fw-bold">Unpaid</p> 
                @endif
                <hr>

                @foreach ($order->transaction as $transaction)
                    <p> {{ $transaction->product->name }} ~ {{ $transaction->amount }}</p>
                    @php
                        $total_price += $transaction->product->price * $transaction->amount;
                    @endphp
                @endforeach
                <hr>
                <p>Total: Rp. {{ $total_price }}</p>
                @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                    <form action="{{ route('submit.payment', $order) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <label for="payment_receipt">Upload Transaksi Pembayaran</label> <br>
                        <div class="input-group mb-3">
                            <input type="file" name="payment_receipt" class="form-control" value="1" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                        </div>
                
                        <button class="btn btn-outline-success" type="submit">Submit Pembayaran</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
    
    