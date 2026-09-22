@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h1>Tambah Buku</h1>
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="judul" style="display: block; margin-bottom: 5px;">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" style="width: 100%; padding: 5px;">
            @error('judul')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="penulis" style="display: block; margin-bottom: 5px;">Penulis</label>
            <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}" style="width: 100%; padding: 5px;">
            @error('penulis')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="penerbit" style="display: block; margin-bottom: 5px;">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit') }}" style="width: 100%; padding: 5px;">
            @error('penerbit')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="tahun_terbit" style="display: block; margin-bottom: 5px;">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit') }}" style="width: 100%; padding: 5px;">
            @error('tahun_terbit')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="isbn" style="display: block; margin-bottom: 5px;">ISBN (opsional)</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" style="width: 100%; padding: 5px;">
            @error('isbn')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="stok" style="display: block; margin-bottom: 5px;">Stok</label>
            <input type="number" name="stok" id="stok" value="{{ old('stok', 1) }}" style="width: 100%; padding: 5px;">
            @error('stok')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="category_id" style="display: block; margin-bottom: 5px;">Kategori</label>
            <select name="category_id" id="category_id" style="width: 100%; padding: 5px;">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" @selected(old('category_id') == $category['id'])>
                        {{ $category['nama_kategori'] }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn" style="padding: 8px 16px; margin-top: 10px;">Simpan</button>
    </form>
@endsection
