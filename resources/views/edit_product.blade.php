@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card update-card w-50">
        <div class="container">
            <div class="card-body">
                <h3>Update Produk</h3>
                <form action="{{ route('update.product', $product) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ $product->name }}">
                        <label for="name">Nama Produk</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="description" class="form-control" id="floatingPassword" placeholder="Deskripsi" value="{{ $product->description }}">
                        <label for="description">Deskripsi</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="price" class="form-control" id="floatingPassword" placeholder="Price" value="{{ $product->price }}">
                        <label for="price">Price</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="stock" class="form-control" id="floatingPassword" placeholder="Stock" value="{{ $product->stock }}">
                        <label for="stock">Stock</label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control" id="image" placeholder="Image">
                    </div>

                    <button type="submit" class="btn btn-outline-success">Update</button>
                </form>
            </div>
            
        </div>
       
    </div>
</div>  
@endsection
    
    
