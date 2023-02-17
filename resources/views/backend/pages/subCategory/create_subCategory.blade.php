@extends('backend.master')


@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>SubCategory Create Form</h4>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form action="{{route('store.subcategory')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            @foreach ($errors->all() as $message)
                                <p class="alert alert-danger">{{$message}}</p>
                            @endforeach
                        @endif

                        @if(session()->has('message'))
                            <p class="alert alert-success">{{session()->get('message')}}</p>
                        @endif

                        <label for="">Category Name</label>
                        <select name="category_id" class="form-control">
                            <option selected>Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label>SubCategory Name</label>
                            <input name="subCategory_name" type="text" class="form-control" placeholder="Enter Subcategory name">
                        </div>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
