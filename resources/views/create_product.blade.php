@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card update-card w-50">
            <div class="container">
                <div class="card-body">
                    <h3>Create Produk</h3>
                    <form action="/product" method="post" enctype="multipart/form-data">
                        @csrf
    
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="name">Nama Produk</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="description" class="form-control" id="floatingPassword" placeholder="Deskripsi">
                            <label for="description">Deskripsi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="price" class="form-control" id="floatingPassword" placeholder="Price">
                            <label for="price">Price</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="stock" class="form-control" id="floatingPassword" placeholder="Stock">
                            <label for="stock">Stock</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="image" class="form-control" id="image" placeholder="Image">
                        </div>
    
                        <button type="submit" class="btn btn-outline-success">Create</button>
                    </form>
                </div>
                
            </div>
           
        </div>
    </div>  

    {{-- <form action="/product" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Nama: </label> <br>
        <input type="text" name="name" id="name" placeholder="Masukan Nama"> <br>
        <label for="price">Harga: </label> <br>
        <input type="number" name="price" id="price" placeholder="Masukan Harga"> <br>
        <label for="description">Deskripsi: </label> <br>
        <input type="text" name="description" id="description" placeholder="Masukan Deskripsi"> <br>
        <label for="image">Image: </label> <br>
        <input type="file" name="image" id="image" placeholder="Masukan Image"> <br>
        <label for="stock">Stock: </label> <br>
        <input type="number" name="stock" id="stock" placeholder="Masukan Stock"> <br>

        <button type="submit">Submit</button>
    </form> --}}
@endsection

    

            