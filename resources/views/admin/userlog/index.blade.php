
@extends('master.app')
@section('content_name')
    <h1>User Details</h1>
@endsection
@section('title'){{__('User Report')}}@endsection
@section('item')
    <li class="breadcrumb-item active">User Report</li>
@endsection

@section('content')
    <section class="section">
        <div class="row pl-3 pr-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="pb-2 pr-3">
{{--                <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#createModal"> + </button>--}}
{{--                <a class="btn btn-primary float-end" href="#">Export to PDF</a>--}}
{{--                <a class="btn btn-primary" href="{{ URL::to('#') }}">Export to PDF</a>--}}
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <table class="table datatable mt-3">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Package Name</th>
                                <th scope="col">Country Name</th>
                                <th scope="col">Ip Address</th>
                                <th scope="col">Created At</th>
{{--                                <th scope="col">Action</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data_userlog as $k => $data)
                                <tr>
                                    <th scope="row">{{$k+1}}</th>
                                    <td>{{$data->app->package_name}}</td>
                                    <td>{{$data->country_name}}</td>
                                    <td>{{$data->ip_address}}</td>
                                    <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
{{--                                    <td>--}}
{{--                                        <a href="{{ url('edit-app_add/'.$data->id) }}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" id="btnEdit" data-id="{{$data->id}}" title="Edit"><i class="fa fa-edit"></i></a>--}}
{{--                                        <a href="{{ url('delete-app_add/'.$data->id) }}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
