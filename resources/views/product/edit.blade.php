@extends('layout.app')

@section('content')
<h1>edit product</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama" placeholder="nama produk" value="{{$product->nama}}"> <br>
    <input type="text" name="harga" placeholder="harga produk" value="{{$product->harga}}"> <br>
    <select name="kategori" id="">
        @foreach ($kategori as $k)
        <option value="{{$k->id_kategori}}">{{$k->kategori}}</option>
        @endforeach
    </select> <br>
    <button type="submit">edit</button>
</form>
@endsection