@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">

        @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h3>Colors
                    <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm float-end">Add color</a>
                </h3>
            </div>
            <div class="card-body">   
               <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Color name</th>
                            <th>Color code</th>
                            <th>Color status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->status ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/colors/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm" >Edit</a>
                                    <form action="{{ route('colors.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type='submit' class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
               </table>
            </div>
        </div>
    </div>
</div>

@endsection