@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">

        @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h3>Add slider
                    <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">   
               <form action="{{ url('admin/sliders') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label> <br />
                        <input type="checkbox" name="status" style="width:20px; height:20px" />
                        Checked = Hidden, Unchecked = Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>

@endsection