@extends('backend.master')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>SubCategory Edit Form</h4>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form action="{{route('update.subcategory', $subCategory->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        @if ($errors->any())
                            @foreach ($errors->all() as $message)
                                <p class="alert alert-danger">{{$message}}</p>
                            @endforeach
                        @endif


                        <label for="">Category Name</label>
                        <select name="category_id" class="form-control">
                            <option selected>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $subCategory->category_id ? 'selected':''}}>{{$category->category_name}}</option>
                                @endforeach

                        </select>
                        <div class="form-group">
                            <label>SubCategory Name</label>
                            <input name="subCategory_name" value="{{$subCategory->subCategory_name}}" type="text" class="form-control" placeholder="Enter category name">
                        </div>
                        </div>
                        <button type="submit" class="btn btn-default">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
