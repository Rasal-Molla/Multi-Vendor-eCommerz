@extends('backend.master')


@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>User Role Assign Form</h4>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form action="{{route('user-role.store')}}" method="post">
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
                            <label>User Name</label>
                            <select name="user_id" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Role Name</label>
                            <select name="role_id" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
