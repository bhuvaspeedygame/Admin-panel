@extends('master.app')
@section('content_name')
    <h1>App Ads Details</h1>
@endsection
@section('title'){{__('App Ads')}}@endsection
@section('item')
    <li class="breadcrumb-item active">App Ads</li>
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
                <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#createModal"> + </button>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <table class="table datatable mt-3">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Package Name</th>
                                <th scope="col">App Icon</th>
                                <th scope="col">Console Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($app_data as $k => $data)
                                <tr>
                                    <th scope="row">{{$k+1}}</th>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->package_name}}</td>
                                    <td><img src="{{asset('app_icon/'.$data->app_icon)}}" alt="profile Pic" height="100" width="100" style="border-radius: 10px"></td>
                                    <td>{{$data->consolve->name}}</td>
                                    <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                                    <td>
                                        <a href="{{ url('edit-app_add/'.$data->id) }}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" id="btnEdit" data-id="{{$data->id}}" title="Edit"><i class="fa fa-edit"></i></a>
{{--                                        <a href="#" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" id="btnEdit" data-id="{{$data->id}}" title="Edit"><i class="fa fa-edit"></i></a>--}}
                                        <a href="{{ url('delete-app_add/'.$data->id) }}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add App Ads </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{route('create.app_add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">App Name<span style="color: red"> *</span></label>
                                <input type="text" class="form-control" id="name"  name="name" placeholder="Enter App Name">
                            </div>
                            <div class="form-group">
                                <label for="package_name">Package Name<span style="color: red"> *</span></label>
                                <input type="text" class="form-control" id="package_name"  name="package_name" placeholder="Enter Package Name">
                            </div>
                            <div class="form-group">
                                <label for="app_icon">App Icon<span style="color: red"> *</span></label>
                                <input type="file" class="form-control" id="app_icon" name="app_icon">
                            </div>
                            <div class="form-group">
                                <label for="select_console">Select Consolve<span style="color: red"> *</span></label>
                                <select class="form-control" id="select_console" name="select_console">
                                    <option value="">-- Select Consolve --</option>
                                    @foreach($consolve_data as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <hr>
                            <div class="card-header">
                                <h2>Ads</h2>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Id<span style="color: red"> *</span></label>
                                <input type="text" name="banner_id[0]" placeholder="Enter Banner Id" class="form-control" />
                                <div id="dynamicAddRemove"></div>
                                <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary mt-1">+</button>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Interstitial Id<span style="color: red"> *</span></label>
                                <input type="text" name="interstitial_id[0]" placeholder="Enter Interstitial Id" class="form-control" />
                                <div id="interstitial_id"></div>
                                <button type="button" name="interstitial_id" id="interstitial" class="btn btn-outline-primary mt-1">+</button>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">App Openid<span style="color: red"> *</span></label>
                                <input type="text" name="app_openid[0]" placeholder="Enter App Open Id" class="form-control" />
                                <div id="app_openid"></div>
                                <button type="button" name="app_openid" id="app_open" class="btn btn-outline-primary mt-1">+</button>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Native Id<span style="color: red"> *</span></label>
                                <input type="text" name="native_id[0]" placeholder="Enter Native Id" class="form-control" />
                                <div id="native_id"></div>
                                <button type="button" name="native_id" id="native" class="btn btn-outline-primary mt-1">+</button>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Rewarded Id<span style="color: red"> *</span></label>
                                <input type="text" name="rewarded_id[0]" placeholder="Enter Rewarded Id" class="form-control" />
                                <div id="rewarded_id"></div>
                                <button type="button" name="rewarded_id" id="rewarded" class="btn btn-outline-primary mt-1">+</button>
                            </div>



{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Banner Id<span style="color: red"> *</span></label>--}}
{{--                                <input type="text" class="form-control" id="banner_id"  name="banner_id" placeholder="Enter Banner Id">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Interstitial Id<span style="color: red"> *</span></label>--}}
{{--                                <input type="text" class="form-control" id="interstitial_id"  name="interstitial_id" placeholder="Enter Interstitial Id">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">App Openid<span style="color: red"> *</span></label>--}}
{{--                                <input type="text" class="form-control" id="app_openid"  name="app_openid" placeholder="Enter App Openid">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Native Id<span style="color: red"> *</span></label>--}}
{{--                                <input type="text" class="form-control" id="native_id"  name="native_id" placeholder="Enter Native Id">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Rewarded Id<span style="color: red"> *</span></label>--}}
{{--                                <input type="text" class="form-control" id="rewarded_id"  name="rewarded_id" placeholder="Enter Rewarded Id">--}}
{{--                            </div>--}}


                            <hr>
                            <div class="card-header">
                                <h2>Other </h2>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Interstitial Loading<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="interstitial_loading" value="1"> True
                                <input type="radio" name="interstitial_loading" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Open Ad Loading<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="open_ad_loading" value="1"> True
                                <input type="radio" name="open_ad_loading" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Interstitial Click<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="interstitial_click" value="1"> True
                                <input type="radio" name="interstitial_click" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Open Ad Click<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="open_ad_click" value="1"> True
                                <input type="radio" name="open_ad_click" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Is Open Ad<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="is_open_ad" value="1"> True
                                <input type="radio" name="is_open_ad" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Is Banner<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="is_banner" value="1"> True
                                <input type="radio" name="is_banner" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Is Native<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="is_native" value="1"> True
                                <input type="radio" name="is_native" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Is On Back<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="is_on_back" value="1"> True
                                <input type="radio" name="is_on_back" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Is Intrestial<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="is_intrestial" value="1"> True
                                <input type="radio" name="is_intrestial" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Is Screen Change<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="is_screen_change" value="1"> True
                                <input type="radio" name="is_screen_change" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">V page<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="v_page" value="1"> True
                                <input type="radio" name="v_page" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">V link<span style="color: red"> *</span></label>
                                <input type="text" name="vlink" id="vlink" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">V Id<span style="color: red"> *</span></label>
                                <input type="text" name="vid" id="vid" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Back<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="back" value="1"> True
                                <input type="radio" name="back" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">App Status<span style="color: red"> *</span></label><br>&nbsp
                                <input type="radio" name="app_status" value="1"> True
                                <input type="radio" name="app_status" value="0"> False <br/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">App Link<span style="color: red"> *</span></label>
                                <input type="text" name="app_link" id="app_link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vc<span style="color: red"> *</span></label>
                                <input type="text" name="vc" id="vc" class="form-control">
                            </div>

{{--                            <div class="form-group form-check form-switch">--}}
{{--                                <label class="form-check-label ml-0" for="flexSwitchCheckDefault">Default</label>--}}
{{--                                <input type="checkbox" class="form-check form-check-input m-0" name="toggle" style="height: 95%;width: 7%;" id="toggle">--}}
{{--                            </div>--}}

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="Add_app_ad" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
