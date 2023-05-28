@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">

        @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h3>Products
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end">Add Product</a>
                </h3>
            </div>
            <div class="card-body">   
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if ($product->category)
                                        {{ $product->category->name }}
                                    @else
                                        No category selected
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->status == '1' ? 'Hidden':'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type='submit' class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')"
                                        >Delete</button>
                                    </form>
                                    {{-- <a href="{{ url('admin/products/'.$product->id) }}" onclick="return confirm('Are you sure you want to delete this data?')"
                                        class="btn btn-danger btn-sm">Delete</a> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No Products Available</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection