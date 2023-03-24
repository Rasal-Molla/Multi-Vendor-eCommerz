@extends('backend.master')


@section('content')

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome Here</span></h1>
                            <a href="{{route('create.cupon')}}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Add Cupons</a>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Cupons</a></li>
                                <li class="breadcrumb-item active">Table</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            @if(session()->has('message'))
                                                <p class="alert alert-success">{{session()->get('message')}}</p>
                                            @endif

                                            @if(session()->has('delete'))
                                                <p class="alert alert-success">{{session()->get('delete')}}</p>
                                            @endif

                                            @if(session()->has('notFound'))
                                                <p class="alert alert-success">{{session()->get('notFound')}}</p>
                                            @endif

                                            <tr>
                                                <th>Sl</th>
                                                <th>Cupon Name</th>
                                                <th>Value</th>
                                                <th>Type</th>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Validity</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($cupons as $key=>$cupon)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$cupon->name}}</td>
                                                    <td>{{$cupon->value}}</td>
                                                    <td>{{$cupon->type}}</td>
                                                    <td>{{Carbon\Carbon::parse($cupon->start)->format('D, d F Y')}}</td>
                                                    <td>{{Carbon\Carbon::parse($cupon->end)->format('D, d F Y')}}</td>
                                                    <td>
                                                        @if ($cupon->end>= Carbon\Carbon::now()->format('Y-m-d'))
                                                        <span class="badge rounded-pill bg-success">Valid</span>
                                                        @else
                                                        <span class="badge rounded-pill bg-danger">Invalid</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$cupon->status}}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info"><i class="ti-eye"></i></a>
                                                        <a href="{{route('edit.cupon', $cupon->id)}}" class="btn btn-success"><i class="ti-pencil-alt"></i></a>
                                                        <a href="{{route('delete.cupon', $cupon->id)}}" class="btn btn-danger"><i class="ti-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
            </section>
        </div>
    </div>
</div>


@endsection
