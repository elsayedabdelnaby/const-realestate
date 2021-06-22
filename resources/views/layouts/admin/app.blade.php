<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/front/favicon.ico') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/admin/custom/app_' .LaravelLocalization::getCurrentLocaleDirection(). '.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/icheck-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/select2.min.css') }}" />

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('public/css/iziToast.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">

    @include('admin.includes.header')

    @include('admin.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @yield('content-header')
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>

    </div>
    <!-- /.content-wrapper -->

    @include('admin.includes.footer')

</div>
<!-- ./wrapper -->

<!-- admin LTE -->
<script src="{{ asset('//admin/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('public/admin/js/app.js') }}"></script>
<script src="{{ asset('public/admin/js/select2.min.js') }}"></script>
<script src="{{ asset('public/js/iziToast.js') }}"></script>
<script>
    $(document).ready(function () {

        $('.show_confirm').on('click',function(e) {
            if(!confirm('Are you sure you want to delete this?')) {
                e.preventDefault();
            } else {
                this.closest('form').submit();
            }
        });

        CKEDITOR.config.language = "{{ app() -> getLocale() }}" // end ck editor

        // image preview
        $(".image").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        }); // end of image preview

        // Floor plan preview
        $(".floor_plan").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.floor_plan_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        }); // end of image preview

    }); // end of ready
</script>

@yield('script')
</body>
</html>
