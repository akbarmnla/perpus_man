@extends('template.app')


@section('header')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Kategori</h1>
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
    <div class="container-fluid-center">
        <div class="card">
            <h5 style="margin:20px ">KATEGORI BUKU</h5>
            <div class="d-grid gap-2 d-md-block" style="margin-left:20px">
                <a class="btn btn-outline-light" href="/tambah-kategori" role="button"style="background-color: #000851">Tambah Kategori</a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <th>1</th>
                        <td>Komputer</td>
                        <td>
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection