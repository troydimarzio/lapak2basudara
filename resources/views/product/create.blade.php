@extends('layout.app')

@section('content')
<h1>add product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <input type="text" name="nama" placeholder="nama produk"> <br>
    <input type="text" name="harga" placeholder="harga produk"> <br>
    <select name="kategori" id="">
        @foreach ($kategori as $k)
        <option value="{{$k->id_kategori}}">{{$k->kategori}}</option>
        @endforeach
    </select> <br>
    <button type="submit">add product</button>
</form>
@endsection