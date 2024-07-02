@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sistem Silahkan Perlu</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Welcome! Admin</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xxl-3 col-sm-6">
        <div class="card widget-flat text-bg-pink">
            <div class="card-body">
                <div class="float-end">
                    <i class="ri-eye-line widget-icon"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">Total Data Perjalanan Dinas</h6>
                <h2 class="my-2">{{$total}} Data</h2>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-xxl-3 col-sm-6">
        <div class="card widget-flat text-bg-purple">
            <div class="card-body">
                <div class="float-end">
                    <i class="ri-wallet-2-line widget-icon"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">DATA PERJALANAN DINAS BELUM ADA TINDAK LANJUT</h6>
                <h2 class="my-2">{{$belumAdaInstruksi}} Data</h2>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-xxl-3 col-sm-6">
        <div class="card widget-flat text-bg-info">
            <div class="card-body">
                <div class="float-end">
                    <i class="ri-shopping-basket-line widget-icon"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">DATA PERJALANAN DINAS SUDAH ADA TINDAK LANJUT</h6>
                <h2 class="my-2">{{$sudahAdaInstruksi}} Data</h2>
            </div>
        </div>
    </div> <!-- end col-->

</div>

@endsection
