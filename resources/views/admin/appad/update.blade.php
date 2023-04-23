@extends('master.app')
@section('content_name')
    <h1>Update App Ads</h1>
@endsection
@section('title'){{__('Update App Ads')}}@endsection
@section('item')
    <li class="breadcrumb-item"><a href="{{route('app_add')}}">App Ads</a></li>
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update App Ads</h5>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{route('update_app_add', ['id' => $appad_data->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">App Name<span style="color: red"> *</span></label>
                                    <input type="text" class="form-control" id="name"  name="name" placeholder="Enter App Name" value="{{$appad_data->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="package_name">Package Name<span style="color: red"> *</span></label>
                                    <input type="text" class="form-control" id="package_name"  name="package_name" placeholder="Enter Package Name" value="{{$appad_data->package_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="app_icon">App Icon<span style="color: red"> *</span></label>
                                    <span><img src="{{asset('app_icon/'.$appad_data->app_icon)}}" alt="profile Pic" height="100" width="100" style="border-radius: 10px"></span>
                                    <input type="file" class="form-control" id="app_icon" name="app_icon">
                                </div>
                                <div class="form-group">
                                    <label for="select_console">Select Consolve<span style="color: red"> *</span></label>
                                    <select class="form-control" id="select_console" name="select_console">
                                        <option value="">-- Select Consolve --</option>
                                        @foreach($consolve_data as $data)
                                            <option value="{{$data->id}}" {{($appad_data->select_console == $data->id) ? "selected" :""}}>{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <hr>
                                <div class="card-header">
                                    <h2>Ads</h2>
                                </div>
                                @php
                                    $banner_data = explode(",",$appad_data->banner_id);
                                    $banner_data_id = str_replace(['[','"',']'] ,"",$banner_data);

                                    $interstitial_data = explode(",",$appad_data->interstitial_id);
                                    $interstitial_data_id = str_replace(['[','"',']'] ,"",$interstitial_data);

                                    $app_open_data = explode(",",$appad_data->app_openid);
                                    $app_open_data_id = str_replace(['[','"',']'] ,"",$app_open_data);

                                    $native_data = explode(",",$appad_data->native_id);
                                    $native_data_id = str_replace(['[','"',']'] ,"",$native_data);

                                    $rewarded_data = explode(",",$appad_data->rewarded_id);
                                    $rewarded_data_id = str_replace(['[','"',']'] ,"",$rewarded_data);
                                @endphp

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Banner Id<span style="color: red"> *</span></label>
                                    <input type="hidden" id="hidden_banner_id" value="{{$appad_data->banner_id}}">
{{--                                    @foreach($banner_data_id as $k => $data_banner_data)--}}
{{--                                        @if(!empty($data_banner_data))--}}
{{--                                            <input type="text" name="banner_id[{{$k}}]" placeholder="Enter Banner Id" id="banner_id" class="form-control mt-1" value="{{$data_banner_data}}"/>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
                                    <div id="update_dynamicAddRemove"></div>
                                    <button type="button" name="add" id="update_dynamic-ar" value="add" class="btn btn-outline-primary mt-1">+</button>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Interstitial Id<span style="color: red"> *</span></label>
                                    <input type="hidden" id="hidden_interstitial_id" value="{{$appad_data->interstitial_id}}">
{{--                                    @foreach($interstitial_data_id as $k=>$data_banner_data)--}}
{{--                                        <input type="text" name="interstitial_id[{{$k}}]" placeholder="Enter Interstitial Id" class="form-control mt-1" value="{{$data_banner_data}}"/>--}}
{{--                                    @endforeach--}}
                                    <div id="update_interstitial_id"></div>
                                    <button type="button" name="interstitial_id" id="update_interstitial" value="add" class="btn btn-outline-primary mt-1">+</button>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">App Openid<span style="color: red"> *</span></label>
                                    <input type="hidden" id="hidden_app_openid" value="{{$appad_data->app_openid}}">
{{--                                    @foreach($app_open_data_id as $k=>$data_banner_data)--}}
{{--                                    <input type="text" name="app_openid[{{$k}}]" placeholder="Enter App Open Id" class="form-control mt-1" value="{{$data_banner_data}}"/>--}}
{{--                                    @endforeach--}}
                                    <div id="update_app_openid"></div>
                                    <button type="button" name="app_openid" id="update_app_open" value="add" class="btn btn-outline-primary mt-1">+</button>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Native Id<span style="color: red"> *</span></label>
                                    <input type="hidden" id="hidden_native_id" value="{{$appad_data->native_id}}">
{{--                                    @foreach($native_data_id as $k=>$data_banner_data)--}}
{{--                                    <input type="text" name="native_id[{{$k}}]" placeholder="Enter Native Id" class="form-control mt-1" value="{{$data_banner_data}}"/>--}}
{{--                                    @endforeach--}}
                                    <div id="update_native_id"></div>
                                    <button type="button" name="native_id" id="update_native" value="add" class="btn btn-outline-primary mt-1">+</button>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rewarded Id<span style="color: red"> *</span></label>
                                    <input type="hidden" id="hidden_rewarded_id" value="{{$appad_data->rewarded_id}}">
{{--                                    @foreach($rewarded_data_id as $k=>$data_banner_data)--}}
{{--                                    <input type="text" name="rewarded_id[{{$k}}]" placeholder="Enter Rewarded Id" class="form-control mt-1" value="{{$data_banner_data}}"/>--}}
{{--                                    @endforeach--}}
                                    <div id="update_rewarded_id"></div>
                                    <button type="button" name="rewarded_id" id="update_rewarded" value="add" class="btn btn-outline-primary mt-1">+</button>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Banner Id<span style="color: red"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="banner_id"  name="banner_id" placeholder="Enter Banner Id" value="{{$appad_data->banner_id}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Interstitial Id<span style="color: red"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="interstitial_id"  name="interstitial_id" placeholder="Enter Interstitial Id" value="{{$appad_data->interstitial_id}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">App Openid<span style="color: red"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="app_openid"  name="app_openid" placeholder="Enter App Openid" value="{{$appad_data->app_openid}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Native Id<span style="color: red"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="native_id"  name="native_id" placeholder="Enter Native Id" value="{{$appad_data->native_id}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Rewarded Id<span style="color: red"> *</span></label>--}}
{{--                                    <input type="text" class="form-control" id="rewarded_id"  name="rewarded_id" placeholder="Enter Rewarded Id" value="{{$appad_data->rewarded_id}}">--}}
{{--                                </div>--}}


                                <hr>
                                <div class="card-header">
                                    <h2>Other </h2>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Interstitial Loading<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="interstitial_loading" value="1" {{($appad_data->interstitial_loading == "1")?"checked":""}}> True
                                    <input type="radio" name="interstitial_loading" value="0" {{($appad_data->interstitial_loading == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Open Ad Loading<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="open_ad_loading" value="1" {{($appad_data->open_ad_loading == "1")?"checked":""}}> True
                                    <input type="radio" name="open_ad_loading" value="0" {{($appad_data->open_ad_loading == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Interstitial Click<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="interstitial_click" value="1" {{($appad_data->interstitial_click == "1")?"checked":""}}> True
                                    <input type="radio" name="interstitial_click" value="0" {{($appad_data->interstitial_click == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Open Ad Click<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="open_ad_click" value="1" {{($appad_data->open_ad_click == "1")?"checked":""}}> True
                                    <input type="radio" name="open_ad_click" value="0" {{($appad_data->open_ad_click == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Is Open Ad<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="is_open_ad" value="1" {{($appad_data->is_open_ad == "1")?"checked":""}}> True
                                    <input type="radio" name="is_open_ad" value="0" {{($appad_data->is_open_ad == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Is Banner<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="is_banner" value="1" {{($appad_data->is_banner == "1")?"checked":""}}> True
                                    <input type="radio" name="is_banner" value="0" {{($appad_data->is_banner == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Is Native<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="is_native" value="1" {{($appad_data->is_native == "1")?"checked":""}}> True
                                    <input type="radio" name="is_native" value="0" {{($appad_data->is_native == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Is On Back<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="is_on_back" value="1" {{($appad_data->is_on_back == "1")?"checked":""}}> True
                                    <input type="radio" name="is_on_back" value="0" {{($appad_data->is_on_back == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Is Intrestial<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="is_intrestial" value="1" {{($appad_data->is_intrestial == "1")?"checked":""}}> True
                                    <input type="radio" name="is_intrestial" value="0" {{($appad_data->is_intrestial == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Is Screen Change<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="is_screen_change" value="1" {{($appad_data->is_screen_change == "1")?"checked":""}}> True
                                    <input type="radio" name="is_screen_change" value="0" {{($appad_data->is_screen_change == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">V page<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="v_page" value="1" {{($appad_data->v_page == "1")?"checked":""}}> True
                                    <input type="radio" name="v_page" value="0" {{($appad_data->v_page == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">V link<span style="color: red"> *</span></label>
                                    <input type="text" name="vlink" class="form-control" id="vlink" value="{{$appad_data->vlink}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">V Id<span style="color: red"> *</span></label>
                                    <input type="text" name="vid" class="form-control" id="vid" value="{{$appad_data->vid}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Back<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="back" value="1" {{($appad_data->back == "1")?"checked":""}}> True
                                    <input type="radio" name="back" value="0" {{($appad_data->back == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">App Status<span style="color: red"> *</span></label><br>&nbsp
                                    <input type="radio" name="app_status" value="1" {{($appad_data->app_status == "1")?"checked":""}}> True
                                    <input type="radio" name="app_status" value="0" {{($appad_data->app_status == "0")?"checked":""}}> False <br/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">App Link<span style="color: red"> *</span></label>
                                    <input type="text" name="app_link" class="form-control" id="app_link" value="{{$appad_data->app_link}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Vc<span style="color: red"> *</span></label>
                                    <input type="text" name="vc" class="form-control" id="vc" value="{{$appad_data->vc}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="Add_app_ad"  name="Add_app_ad" class="btn btn-primary">Save</button value={{$appad_data->Add_app_ad}}"">
                                <a href="{{route('app_add')}}" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
