@extends('layouts.app')

@section('title', 'Tambah Buku')
@section('content')
    <h1>Tambah Kategori</h1>
    <p><a href="{{ route('categories.index') }}">&larr; Kembali ke daftar kategori</a></p>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <!-- Bungkus input pertama dengan div -->
        <div style="margin-bottom: 15px;">
            <label for="nama_kategori" style="display: block; margin-bottom: 5px;">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}">
            @error('nama_kategori')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Bungkus input kedua dengan div -->
        <div style="margin-bottom: 15px;">
            <label for="deskripsi" style="display: block; margin-bottom: 5px;">Deskripsi (opsional)</label>
            <textarea name="deskripsi" id="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Simpan</button>
    </form>
@endsection
