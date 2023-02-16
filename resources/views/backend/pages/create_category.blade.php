@extends('backend.master')


@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Category Create Form</h4>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form action="{{route('store.category')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            @foreach ($errors->all() as $message)
                                <p class="alert alert-danger">{{$message}}</p>
                            @endforeach
                        @endif

                        @if(session()->has('message'))
                            <p class="alert alert-success">{{session()->get('message')}}</p>
                        @endif

                        <div class="form-group">
                            <label>Category Name</label>
                            <input name="category_name" type="text" class="form-control" placeholder="Enter category name">
                        </div>
                        <div class="form-group">
                            <label>Category Image</label>
                            <input name="category_image" type="file" class="form-control">
                        </div>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
