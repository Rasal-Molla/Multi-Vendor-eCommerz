@extends('backend.master')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Role Edit Form</h4>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form action="{{route('roles.update', $roles->id)}}" method="post">
                        @method('PUT')
                        @csrf

                        @if ($errors->any())
                            @foreach ($errors->all() as $message)
                                <p class="alert alert-danger">{{$message}}</p>
                            @endforeach
                        @endif

                        <div class="form-group">
                            <label>Role Name</label>
                            <input name="name" value="{{$roles->name}}" type="text" class="form-control" placeholder="Enter role name">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option @if($roles->status == 'active') selected @endif value="active">Active</option>
                                <option @if($roles->status == 'inactive') selected @endif value="inactive">Inactive</option>
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
