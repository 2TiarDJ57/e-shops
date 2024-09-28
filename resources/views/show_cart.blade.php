@extends('layouts.app')

@section('content')
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

    @endif

    <div class="detail-product">
        @php
            $total_price = 0;
        @endphp

        <div class="card mb-3" style="width: 40rem;">
            <div class="row d-flex align-items-center">
                @if ($carts->isEmpty())
                    <small class="text-center fw-bold">Tidak ada data!</small>
                @endif
                @foreach ($carts as $cart)
                <div class="col-md-6">
                    <img src="{{ url('storage/' . $cart->product->image) }}" alt="" class="w-75">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cart->product->name }}</h5>
                        <p class="card-text">{{ $cart->product->description }}</p>
    
                        <form action="{{ route('edit.cart', $cart) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="input-group mb-3">
                                
                                <input type="number" name="amount" class="form-control" value="{{ $cart->amount }}" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Edit Cart</button>
                                
                            </div>
                        </form>
                        
                        <form action="{{ route('destroy.cart', $cart) }}" method="post">
                            @csrf
                            @method('delete')
                            <div class="input-group mb-3">
                                    
                                <button class="btn btn-outline-danger" type="submit" id="button-addon2" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Delete Cart</button>
                                
                            </div>
                        </form>
                      </div>
                </div>
                @php
                    $total_price += $cart->product->price * $cart->amount;
                @endphp
                @endforeach

                    <p class="text-center text-danger fw-bold">Total: Rp. {{ $total_price }}</p>

                <div class="checkout text-center mb-3">
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-success" @if ($carts->isEmpty()) disabled
                            
                        @endif>Checkout</button>
                    </form>
                </div>
                
                
            </div>
        </div>
    
    </div>
@endsection

   
    
