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
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Banner Id<span style="color: red"> *</span></label>
                                    <input type="text" class="form-control" id="banner_id"  name="banner_id" placeholder="Enter Banner Id" value="{{$appad_data->banner_id}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Interstitial Id<span style="color: red"> *</span></label>
                                    <input type="text" class="form-control" id="interstitial_id"  name="interstitial_id" placeholder="Enter Interstitial Id" value="{{$appad_data->interstitial_id}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">App Openid<span style="color: red"> *</span></label>
                                    <input type="text" class="form-control" id="app_openid"  name="app_openid" placeholder="Enter App Openid" value="{{$appad_data->app_openid}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Native Id<span style="color: red"> *</span></label>
                                    <input type="text" class="form-control" id="native_id"  name="native_id" placeholder="Enter Native Id" value="{{$appad_data->native_id}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rewarded Id<span style="color: red"> *</span></label>
                                    <input type="text" class="form-control" id="rewarded_id"  name="rewarded_id" placeholder="Enter Rewarded Id" value="{{$appad_data->rewarded_id}}">
                                </div>


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
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Interstitial Loading</label>--}}
{{--                                    <input type="text" class="form-control" id="interstitial_loading"  name="interstitial_loading" placeholder="Enter Interstitial Loading" value="{{$appad_data->interstitial_loading}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Open Ad Loading</label>--}}
{{--                                    <input type="text" class="form-control" id="open_ad_loading"  name="open_ad_loading" placeholder="Enter Open Ad Loading" value="{{$appad_data->open_ad_loading}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Interstitial Click</label>--}}
{{--                                    <input type="text" class="form-control" id="interstitial_click"  name="interstitial_click" placeholder="Enter Interstitial Click" value="{{$appad_data->interstitial_click}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Open Ad Click</label>--}}
{{--                                    <input type="text" class="form-control" id="open_ad_click"  name="open_ad_click" placeholder="Enter Open Ad Click" value="{{$appad_data->open_ad_click}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Is Open Ad</label>--}}
{{--                                    <input type="text" class="form-control" id="is_open_ad"  name="is_open_ad" placeholder="Enter Is Open Ad" value="{{$appad_data->is_open_ad}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Is Banner</label>--}}
{{--                                    <input type="text" class="form-control" id="is_banner"  name="is_banner" placeholder="Enter Is Banner" value="{{$appad_data->is_banner}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Is Native</label>--}}
{{--                                    <input type="text" class="form-control" id="is_native"  name="is_native" placeholder="Enter Is Native" value="{{$appad_data->is_native}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Is On Back</label>--}}
{{--                                    <input type="text" class="form-control" id="is_on_back"  name="is_on_back" placeholder="Enter Is On Back" value="{{$appad_data->is_on_back}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Is Intrestial</label>--}}
{{--                                    <input type="text" class="form-control" id="is_intrestial"  name="is_intrestial" placeholder="Enter Is Intrestial" value="{{$appad_data->is_intrestial}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Is Screen Change</label>--}}
{{--                                    <input type="text" class="form-control" id="is_screen_change"  name="is_screen_change" placeholder="Enter Is Screen Change" value="{{$appad_data->is_screen_change}}">--}}
{{--                                </div>--}}
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
