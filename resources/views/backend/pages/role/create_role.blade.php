@extends('backend.master')


@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Role Create Form</h4>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form action="{{route('roles.store')}}" method="post">
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
                            <label>Role Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter role name">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
