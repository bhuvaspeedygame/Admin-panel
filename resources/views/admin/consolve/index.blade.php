@extends('master.app')
@section('content_name')
    <h1>Consolve Details</h1>
@endsection
@section('title'){{__('Consolve')}}@endsection
@section('item')
    <li class="breadcrumb-item active">Consolve</li>
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
                <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#createModal"> <b> + </b> </button>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <!-- Table with stripped rows -->
                        <table class="table datatable mt-3 display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Person name</th>
                                <th scope="col">Gmail</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Account link</th>
                                <th scope="col">Account country</th>
                                <th scope="col">Order id</th>
                                <th scope="col">Account id</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($consolve_data as $k => $data)
                                <tr>
                                    <th scope="row">{{$k+1}}</th>
{{--                                    <td><img src="{{asset('blog/'.$blog->image)}}" alt="profile Pic" height="100" width="100" style="border-radius: 10px"></td>--}}
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->person_name}}</td>
                                    <td>{{$data->gmail}}</td>
                                    <td>{{$data->mobile}}</td>
                                    <td>{{$data->account_link}}</td>
                                    <td>{{$data->account_country}}</td>
                                    <td>{{$data->order_id}}</td>
                                    <td>{{$data->account_id}}</td>
                                    <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                                    <td>{{$data->status}}</td>
                                    <td>
                                        <a href="{{ url('edit-consolve/'.$data->id) }}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('delete-consolve/'.$data->id) }}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Consolve </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{route('create.consolve')}}" method="post">
                    @csrf
                        <div class="modal-body">
                               <div class="form-group">
                                   <label for="name">Name <span style="color: red">*</span></label>
                                   <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Name" required>
                                   @if ($errors->has('name'))
                                       <li>{{ $errors->first('name') }}</li>
                                   @endif
                               </div>
                               <div class="form-group">
                                   <label for="person_name">Person name <span style="color: red">*</span></label>
                                   <input type="text" name="person_name" class="form-control" id="person_name" aria-describedby="person_name" placeholder="Person name" required>
                               </div>
                               <div class="form-group">
                                   <label for="gmail">Gmail <span style="color: red">*</span></label>
                                   <input type="email" name="gmail" class="form-control" id="gmail" aria-describedby="gmail" placeholder="Gmail" required>
                               </div>
                               <div class="form-group">
                                   <label for="mobile">Mobile <span style="color: red">*</span></label>
                                   <input type="text" name="mobile" class="form-control" id="mobile" aria-describedby="mobile" placeholder="Mobile" required>
                               </div>
                               <div class="form-group">
                                   <label for="account_link">Account link <span style="color: red">*</span></label>
                                   <input type="text" name="account_link" class="form-control" id="account_link" aria-describedby="account_link" placeholder="Account link" required>
                               </div>
                               <div class="form-group">
                                   <label for="account_country">Account country <span style="color: red">*</span></label>
                                   <input type="text" name="account_country" class="form-control" id="account_country" aria-describedby="account_country" placeholder="Account country" required>
                               </div>
                               <div class="form-group">
                                   <label for="order_id">Order id <span style="color: red">*</span></label>
                                   <input type="text" name="order_id" class="form-control" id="order_id" aria-describedby="order_id" placeholder="Order id" required>
                               </div>
                               <div class="form-group">
                                   <label for="account_id">Account id <span style="color: red">*</span></label>
                                   <input type="text" name="account_id" class="form-control" id="account_id" aria-describedby="account_id" placeholder="Account id" required>
                               </div>
                               <div class="form-group">
                                   <label for="status">Status <span style="color: red">*</span></label>
                                   <select type="text" name="status" class="form-control" id="status" aria-describedby="status" placeholder="Status" required>
                                       <option value="">-- Select Stutas --</option>
                                       <option value="Live">Live</option>
                                       <option value="Remove">Remove</option>
                                       <option value="Pending">Pending</option>
                                   </select>
                               </div>
                          </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
