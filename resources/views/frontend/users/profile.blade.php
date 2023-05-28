@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>User profile
                    <a href="{{ url('change-password') }}" class="btn btn-warning float-end">Change Password</a>
                </h4>
                <hr>
            </div>

            <div class="col-md-10">
                @if (session('message'))
                    <p class="alert alert-success">{{ session('message') }}</p>                    
                @endif
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>     
                        @endforeach
                    </ul>            
                @endif
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">User Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('profile') }}" method="POST">
                            @csrf                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Username</label>
                                        <input type="text" readonly name="username" value="{{ Auth::user()->name }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Email Address</label>
                                        <input type="text" readonly name="email" value="{{ Auth::user()->email }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->userDetails->phone ?? '' }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Zip-Code</label>
                                        <input type="text" name="pincode" value="{{ Auth::user()->userDetails->pincode ?? '' }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Address</label>
                                        <input type="text" name="address" value="{{ Auth::user()->userDetails->address ?? '' }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Save Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div> 
    </div>
  </div>
  

@endsection