@extends('master.app')
@section('content_name')
    <h1>Update Consolve</h1>
@endsection
@section('title'){{__('Update Consolve')}}@endsection
@section('item')
    <li class="breadcrumb-item"><a href="{{route('consolve')}}">Consolve</a></li>
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Logo</h5>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{route('update_consolve', ['id' => $consolve_data->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="email1">Name <span style="color: red">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Name" value="{{$consolve_data->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email1">Person name <span style="color: red">*</span></label>
                                    <input type="text" name="person_name" class="form-control" id="person_name" aria-describedby="person_name" placeholder="Person name" value="{{$consolve_data->person_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="gmail">Gmail <span style="color: red">*</span></label>
                                    <input type="email" name="gmail" class="form-control" id="gmail" aria-describedby="gmail" placeholder="Gmail" value="{{$consolve_data->gmail}}">
                                </div>
                                <div class="form-group">
                                    <label for="email1">Mobile <span style="color: red">*</span></label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" aria-describedby="mobile" placeholder="Mobile" value="{{$consolve_data->mobile}}">
                                </div>
                                <div class="form-group">
                                    <label for="email1">Account link <span style="color: red">*</span></label>
                                    <input type="text" name="account_link" class="form-control" id="account_link" aria-describedby="account_link" placeholder="Account link" value="{{$consolve_data->account_link}}">
                                </div>
                                <div class="form-group">
                                    <label for="email1">Account country <span style="color: red">*</span></label>
                                    <input type="text" name="account_country" class="form-control" id="account_country" aria-describedby="account_country" placeholder="Account country" value="{{$consolve_data->account_country}}">
                                </div>
                                <div class="form-group">
                                    <label for="email1">Order id <span style="color: red">*</span></label>
                                    <input type="text" name="order_id" class="form-control" id="order_id" aria-describedby="order_id" placeholder="Order id" value="{{$consolve_data->order_id}}">
                                </div>
                                <div class="form-group">
                                    <label for="email1">Account id <span style="color: red">*</span></label>
                                    <input type="text" name="account_id" class="form-control" id="account_id" aria-describedby="account_id" placeholder="Account id" value="{{$consolve_data->account_id}}">
                                </div>
                                <div class="form-group">
                                    <label for="email1">Status <span style="color: red">*</span></label>
                                    <select type="text" name="status" class="form-control" id="status" aria-describedby="status" placeholder="Status">
                                        <option value="">-- Select Stutas --</option>
                                        <option value="Live" {{($consolve_data->status == "Live")? "selected" :""}}>Live</option>
                                        <option value="Remove" {{($consolve_data->status == "Remove")? "selected" :""}}>Remove</option>
                                        <option value="Pending" {{($consolve_data->status == "Pending")? "selected" :""}}>Pending</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{route('consolve')}}" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
