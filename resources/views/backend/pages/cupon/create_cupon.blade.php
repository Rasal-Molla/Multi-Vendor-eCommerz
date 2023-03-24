@extends('backend.master')


@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-title">
                    <h4>Cupon Create Form</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('store.cupon') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @if ($errors->any())
                                @foreach ($errors->all() as $message)
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @endforeach
                            @endif

                            @if (session()->has('message'))
                                <p class="alert alert-success">{{ session()->get('message') }}</p>
                            @endif

                            <div class="form-group">
                                <label>Cupon Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter Cupon name">
                            </div>
                            <div class="form-group">
                                <label>Cupon Value</label>
                                <input name="value" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Cupon Type</label>
                                <input name="type" type="text" class="form-control" placeholder="Enter Cupon Type">
                            </div>
                            <div class="form-group">
                                <label>Cupon Description</label>
                                <input name="description" type="text" class="form-control" placeholder="Enter Cupon description">
                            </div>
                            <div class="form-group">
                                <label>Cupon Start</label>
                                <input name="start" type="date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Cupon End</label>
                                <input name="end" type="date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Cupon Status</label>
                                <select name="status" id="status" class="form-control">
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
