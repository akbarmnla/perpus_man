@extends('template.app')

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Transaksi Peminjaman</h1>
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
    <div class="container">
        <div class="card">
            <h5 style="margin:20px ">DATA PEMINJAMAN</h5>
            
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Nama Peminjam</th>
                        <th>Tgl.Pinjam</th>
                        <th>Tgl.Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <th>1</th>
                        <td>Basis Data</td>
                        <td>Adip</td>
                        <td>20/04/2023</td>
                        <td>21/04/2023</td>
                        <td>Dipinjam</td>
                        <td>
                            <a href="#" class="btn btn-primary">Selesai</a>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- /.content -->
@endsection