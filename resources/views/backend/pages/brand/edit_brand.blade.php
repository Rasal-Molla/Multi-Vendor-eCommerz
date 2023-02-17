@extends('backend.master')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Brand Edit Form</h4>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form action="{{route('update.brand', $brandEdit->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        @if ($errors->any())
                            @foreach ($errors->all() as $message)
                                <p class="alert alert-danger">{{$message}}</p>
                            @endforeach
                        @endif

                        <div class="form-group">
                            <label>Brand Name</label>
                            <input name="brand_name" value="{{$brandEdit->brand_name}}" type="text" class="form-control" placeholder="Enter brand name">
                        </div>
                        <div class="form-group">
                            <label>Brand Image</label>
                            <input name="brand_image" type="file" class="form-control">
                        </div>
                        </div>
                        <button type="submit" class="btn btn-default">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
