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
                                <a href="{{ route('create.brand') }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i>
                                    Add Brand</a>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Brand</a></li>
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
                                        <table id="bootstrap-data-table-export"
                                            class="table table-striped table-bordered brand_list">
                                            <thead>
                                                @if (session()->has('message'))
                                                    <p class="alert alert-success">{{ session()->get('message') }}</p>
                                                @endif

                                                @if (session()->has('delete'))
                                                    <p class="alert alert-success">{{ session()->get('delete') }}</p>
                                                @endif

                                                @if (session()->has('notFound'))
                                                    <p class="alert alert-success">{{ session()->get('notFound') }}</p>
                                                @endif

                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Date</th>
                                                    <th>Brand Name</th>
                                                    <th>Brand Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


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

@push('js')
    <script type="text/javascript">
        $(function() {
            var table = $('.brand_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('all.brand') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'date',
                        name: 'date',
                        searchable: true
                    },
                    {
                        data: 'brand_name',
                        name: 'brand_name',
                        searchable: true
                    },
                    {
                        data: 'brand_image',
                        name: 'brand_image'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endpush
