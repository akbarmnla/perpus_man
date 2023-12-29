@extends('template.app')

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Kategori</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('content')


    {{-- tabel aksi --}}
    <div class="container" style="">
        <div class="card">
            <h5 style="margin:20px ">DATA KATEGORI</h5>
            <div class="card-body">
                <table class="table">
                    
                </table>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection