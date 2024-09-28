@extends('layouts.app')

@section('content')
    <a href="{{ route('index.products') }}">Kembali ke Halaman Produk</a>

    <div class="detail-product">
        <div class="card mb-3" style="width: 40rem;">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <img src="{{ url('storage/' . $product->image) }}" alt="" class="w-75">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <b>Rp. {{ $product->price }}/Grosir</b>
                        <hr>
                        <b>Tersedia: {{ $product->stock }}~Stock</b> <br>
                        
                        @if (!Auth::user()->is_admin)
                        <form action="{{ route('add.cart', $product) }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                
                                <input type="number" name="amount" class="form-control" value="1" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add to cart</button>
                                
                            </div>
                        </form>
                        @else
                            <a href="{{ route('edit.product', $product) }}" class="btn btn-primary">Edit Product</a>
                        @endif
                        
                        
                      </div>
                </div>
            </div>
        </div>
    
    </div>
    
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
        
    @endif

    
@endsection

    
    
