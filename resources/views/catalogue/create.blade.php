@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<section>
    <h4>Katalog Baru.</h4>
    <p><small>Silakan isi data-data terkait katalog.</small></p>

    <form action="{{ url('catalogue/store') }}" enctype="multipart/form-data" method="POST">

        @csrf <!-- {{ csrf_field() }} -->

        <div class="form-group mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="title" required value="{{old('title')}}" id="title" placeholder="Masukan judul"/>
            @error('title')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="title" class="form-label">Kategori</label>
            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required value="{{old('category')}}" >
                <option value="Suksom Jaipong">Suksom Jaipong</option>
                <option value="Suksom Merapi">Suksom Merapi</option>
                <option value="Red Venus">Red Venus</option>
                <option value="Red Spider">Red Spider</option>
                <option value="Catrina">Catrina</option>
            </select>
            @error('category')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="title" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control @error('name') is-invalid @enderror" cols="20" rows="5" placeholder="Masukan deskripsi">{{ old('description') }}</textarea>
            @error('description')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="img-source" class="form-label">Gambar</label>
            <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="img-source" onchange="previewImage();">
            @error('image')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <img id="img-preview" src="" width="150" class="img-thumbnail my-2">
        </div>

        <div class="form-group mb-3">
            <label for="city" class="form-label">Kota</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" required value="{{old('city')}}" id="city" placeholder="Masukan kota"/>
            @error('city')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="price">Harga</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Rp</div>
                </div>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" required id="price" value="{{old('price')}}" placeholder="Masukan harga">
            </div>
            @error('price')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" required value="{{old('stock')}}"  id="stock" placeholder="Masukan stok"/>
            @error('stock')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Buat Katalog</button>
    </form>
</section>

@endsection