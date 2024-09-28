@extends('layouts.app')

@section('content')
        
            <header>
                <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-md-center">
                        <h1>Belanja Apa Saja<br> <span class="text-primary">Sesuai Kebutuhan.</span> </h1>
                        <img src="img/shopingCart.png" alt="" class="w-25" >
                    </div>
                    <div class="hero col-md-6">
                        <img src="img/shopping.svg" class="w-100 h-75 mt-5" alt="">
                        <img src="https://cdn-icons-png.flaticon.com/512/641/641813.png" class="img-hero" alt="">
                    </div>
                </div>
                </div>
            </header>
        
            <main class="mt-5">
                <div class="container">
                    <h4>Daftar Produk!</h4>

                    <div class="product d-flex justify-content-center flex-wrap">
                        @foreach ($products as $product)
                        <div class="card me-3 mt-3" style="width: 12rem;">
                                <div class="img-product text-center">
                                    <img src="{{ url('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->image }}">
                                </div>
                                
                            
                            <div class="card-body">
                              <h5 class="card-title">{{ $product->name }}</h5>
                              <a href="{{ route('show.product', $product) }}"><button type="submit" class="badge rounded-pill text-bg-primary">Detail Product</button></a>

                              @if (Auth::check() && Auth::user()->is_admin)
                              <form action="{{ route('destroy.product', $product) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                <button type="submit" class="badge rounded-pill text-bg-danger" onclick="return confirm('Apakah anda ingin menghapus ?')">Delete</button>
                              </form>
                              @endif
                              
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
                
            </main>
        
        
        
@endsection

    
    
