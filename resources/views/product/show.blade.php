@extends('layout.app')

@section('content')
<ul>
    <li>Nama: {{$product->nama}}</li>
    <li>Harga: {{$product->harga}}</li>
    <li>Kategori: {{$product->kategori}}</li>
</ul>
@endsection