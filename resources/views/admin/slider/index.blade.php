@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">

        @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h3>Slider
                    <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm float-end">Add slider</a>
                </h3>
            </div>
            <div class="card-body">   
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td>
                                    <img src="{{ asset("$slider->image") }}" alt="Slider" style="width: 70px; height: 70px">
                                </td>
                                <td>{{ $slider->status == '0' ? 'Visible' : 'Hidden'  }}</td>
                                <td>
                                    <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST">
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