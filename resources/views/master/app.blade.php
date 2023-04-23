<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> @yield('title') - Spreddy Studio</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
{{--    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">--}}
    <link href="{{asset('assets/img/spreddy_studio.png')}}" rel="icon" style="height: 50px">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

{{--header.blade.php--}}
@include('master.header')

{{--sidebar.blade.php--}}
@include('master.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
        @yield('content_name')
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
{{--                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>--}}
                @yield('item')
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    @yield('content')
</main>
<!-- End #main -->

{{--footer.blade.php--}}
@include('master.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script>
    $('textarea#summernote').summernote({
        placeholder: 'Summernote ....',
        tabsize: 2,
        height: 100,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            //['fontname', ['fontname']],
            // ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            //['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ],
    });

</script>

<script type="text/javascript">
    var a = 0;
    var b = 0;
    var c = 0;
    var d = 0;
    var e = 0;

    $("#dynamic-ar").click(function () {
        ++a;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="banner_id[' + a +
            ']" placeholder="Enter subject" class="form-control"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    $("#interstitial").click(function () {
        ++b;
        $("#interstitial_id").append('<tr><td><input type="text" name="interstitial_id[' + b +
            ']" placeholder="Enter Interstitial Id" class="form-control mt-1" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    $("#app_open").click(function () {
        ++c;
        $("#app_openid").append('<tr><td><input type="text" name="app_openid[' + c +
            ']" placeholder="Enter App Open Id" class="form-control mt-1" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    $("#native").click(function () {
        ++d;
        $("#native_id").append('<tr><td><input type="text" name="native_id[' + d +
            ']" placeholder="Enter Native Id" class="form-control mt-1" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    $("#rewarded").click(function () {
        ++e;
        $("#rewarded_id").append('<tr><td><input type="text" name="rewarded_id[' + e +
            ']" placeholder="Enter Rewarded Id" class="form-control mt-1" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });


    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

<script type="text/javascript">


    // banner_id start

    var banner_id = $("#hidden_banner_id").val();
    var trainindIdArray = banner_id.split(',');

    for (var i = 0; i < trainindIdArray.length; i++) {
        trainindIdArray[i] = trainindIdArray[i].replace("[", "");
        trainindIdArray[i] = trainindIdArray[i].replace("]", "");
        trainindIdArray[i] = trainindIdArray[i].replace('"', "");
        trainindIdArray[i] = trainindIdArray[i].replace('"', "");
        trainindIdArray[i] = trainindIdArray[i].replace("\\", "");
    }

    $.each(trainindIdArray , function(index, val) {
        $("#update_dynamicAddRemove").append('<tr><td><input type="text" name="banner_id[' + index +
            ']" placeholder="Enter subject" class="form-control" value="'+ val +'"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });
    $("#update_dynamic-ar").click(function () {
        var length = trainindIdArray.length;
        ++length;
        $("#update_dynamicAddRemove").append('<tr><td><input type="text" name="banner_id[' + length +
            ']" placeholder="Enter subject" class="form-control"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    // banner_id end



    // interstitial_id start

    var interstitial_id = $("#hidden_interstitial_id").val();
    var interstitial = interstitial_id.split(',');

    for (var i = 0; i < interstitial.length; i++) {
        interstitial[i] = interstitial[i].replace("[", "");
        interstitial[i] = interstitial[i].replace("]", "");
        interstitial[i] = interstitial[i].replace('"', "");
        interstitial[i] = interstitial[i].replace('"', "");
        interstitial[i] = interstitial[i].replace("\\", "");
    }

    $.each(interstitial , function(index, val) {
        $("#update_interstitial_id").append('<tr><td><input type="text" name="interstitial_id[' + index +
            ']" placeholder="Enter Interstitial Id" class="form-control" value="'+ val +'"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });
    $("#update_interstitial").click(function () {
        var length = interstitial.length;
        ++length;
        $("#update_interstitial_id").append('<tr><td><input type="text" name="interstitial_id[' + length +
            ']" placeholder="Enter Interstitial Id" class="form-control"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    // interstitial_id end


    // app_openid_id start

    var app_openid_id = $("#hidden_app_openid").val();
    var openid = app_openid_id.split(',');

    for (var i = 0; i < openid.length; i++) {
        openid[i] = openid[i].replace("[", "");
        openid[i] = openid[i].replace("]", "");
        openid[i] = openid[i].replace('"', "");
        openid[i] = openid[i].replace('"', "");
        openid[i] = openid[i].replace("\\", "");
    }

    $.each(openid , function(index, val) {
        $("#update_app_openid").append('<tr><td><input type="text" name="app_openid[' + index +
            ']" placeholder="Enter App Open Id" class="form-control" value="'+ val +'"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    $("#update_app_open").click(function () {
        var length = openid.length;
        ++length;
        $("#update_app_openid").append('<tr><td><input type="text" name="app_openid[' + length +
            ']" placeholder="Enter App Open Id" class="form-control"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    // app_openid_id end


    // native_id start

    var native_id = $("#hidden_native_id").val();
    var native = native_id.split(',');

    for (var i = 0; i < native.length; i++) {
        native[i] = native[i].replace("[", "");
        native[i] = native[i].replace("]", "");
        native[i] = native[i].replace('"', "");
        native[i] = native[i].replace('"', "");
        native[i] = native[i].replace("\\", "");
    }

    $.each(native , function(index, val) {
        $("#update_native_id").append('<tr><td><input type="text" name="native_id[' + index +
            ']" placeholder="Enter Interstitial Id" class="form-control" value="'+ val +'"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    $("#update_native").click(function () {
        var length = native.length;
        ++length;
        $("#update_native_id").append('<tr><td><input type="text" name="native_id[' + length +
            ']" placeholder="Enter Native Id" class="form-control"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    // native_id end

    // rewarded_id start

    var rewarded_id = $("#hidden_rewarded_id").val();
    var rewarded = rewarded_id.split(',');

    for (var i = 0; i < rewarded.length; i++) {
        rewarded[i] = rewarded[i].replace("[", "");
        rewarded[i] = rewarded[i].replace("]", "");
        rewarded[i] = rewarded[i].replace('"', "");
        rewarded[i] = rewarded[i].replace('"', "");
        rewarded[i] = rewarded[i].replace("\\", "");
    }

    $.each(rewarded , function(index, val) {
        $("#update_rewarded_id").append('<tr><td><input type="text" name="rewarded_id[' + index +
            ']" placeholder="Enter Interstitial Id" class="form-control" value="'+ val +'"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    $("#update_rewarded").click(function () {
        var length = rewarded.length;
        ++length;
        $("#update_rewarded_id").append('<tr><td><input type="text" name="rewarded_id[' + length +
            ']" placeholder="Enter Rewarded Id" class="form-control"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"> - </button></td></tr>'
        );
    });

    // rewarded_id end


    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

</body>

</html>
