@extends('backend.master')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Permission Edit Form</h4>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form action="{{route('permissions.update', $permissions->id)}}" method="post">
                        @method('PUT')
                        @csrf

                        @if ($errors->any())
                            @foreach ($errors->all() as $message)
                                <p class="alert alert-danger">{{$message}}</p>
                            @endforeach
                        @endif

                        <div class="form-group">
                            <label>Permission Name</label>
                            <input name="name" value="{{$permissions->name}}" type="text" class="form-control" placeholder="Enter permission name">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option @if($permissions->status == 'active') selected @endif value="active">Active</option>
                                <option @if($permissions->status == 'inactive') selected @endif value="inactive">Inactive</option>
                            </select>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-default">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
