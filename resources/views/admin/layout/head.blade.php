<?php
use Illuminate\Support\Facades\DB;
use App\Models\Nav_model;
$site = DB::table('konfigurasi')->first();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <!-- icon -->
    <link rel="shortcut icon" href="{{ asset('assets/upload/image/' . $site->icon) }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">

    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- pace-progress -->
    <link rel="stylesheet"
        href="{{ asset('assets/admin/plugins/pace-progress/themes/black/pace-theme-flat-top.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/admin.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet') }}">
    <!-- sweetalert -->
    <script src="{{ asset('assets/sweetalert/js/sweetalert.min.js') }}"></script>
    <!-- angular -->
    <script src="{{ asset('assets/angular/angular.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/sweetalert/css/sweetalert.css') }}">
    <!-- jQuery -->
    <!-- <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script> -->
    <script src="{{ asset('assets/jquery-ui/external/jquery/jquery.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}"></script> 
    <!-- JQUERY CHAINED -->
    <script src="{{ asset('assets/js/jquery.chained.min.js" type="text/javascript') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <link href="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
  
    <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
    

<!-- Vendor CSS Files -->
<link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">

</head>


