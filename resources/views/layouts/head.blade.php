<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>abigailOS</title>

<meta name="description" content="When you need to know something, just ask Abigail.">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">

<!-- Favicon -->
<link rel="icon" type="image/png" href="/media/images/favicon.png" />

{{-- Font Awesome --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

{{-- BootStrap --}}
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

{{-- DataTables --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/r-2.2.2/datatables.min.css"/>

{{-- Toastr Notifications --}}
@toastr_css

<link rel="stylesheet" href="/css/main.css">

{{-- REQUIRED FOR AJAX USE --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
	.toast-success { background: #1ab394; /* $primary */}
	/*.toast-error { background: $danger; }
	.toast-warning { background: $warning; }*/
</style>
