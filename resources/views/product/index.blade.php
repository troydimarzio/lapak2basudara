@extends('layout.app')

@section('content')
<h1>List Product</h1>
<a href="{{ route('products.create') }}">tambah</a>
<table border="1">
    <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>acttion</th>
    </tr>
    <?php $i = 1; ?>
    @foreach ($products as $product)
    <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $product->nama }}</td>
        <td>{{ $product->harga }}</td>
        <td>{{ $product->kategori }}</td>
        <td>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                <a href="{{ route('products.show', $product->id) }}">detail</a> |
                <a href="{{ route('products.edit', $product->id) }}">edit</a> |

                @csrf
                @method('DELETE')
                <button type="submit" title="hapus">hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection