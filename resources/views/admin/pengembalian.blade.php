@extends('template.app')


@section('header')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Pengembalian</h1>
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
            <h5 style="margin:20px ">PENGEMBALIAN</h5>

            <div class="mb-3 row m-3">
                <label for="inputNoPinjam" class="col-sm-2 col-form-label">No Pinjam</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control"  placeholder="Masukkan No Pinjam" id="inputNoPinjam">
                </div>
            </div>
            <div class="mb-3 row m-3">
                <label for="inputNamaAnggota" class="col-sm-2 col-form-label">Nama Anggota</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control"  placeholder="Masukkan Nama Anggota" id="inputNamaAnggota">
                </div>
            </div>
            <div class="mb-3 row m-3">
                <label for="inputJudul" class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control"  placeholder="Masukkan Password" id="inputJudul">
                </div>
            </div>
            <div class="mb-3 row m-3">
                <label for="inputTanggalPinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control"  placeholder="Masukkan Tanggal PInjam" id="inputTanggalPinjam">
                </div>
            </div>
            <div class="mb-5 row m-3 ">
                <label for="inputTanggalPengembalian" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control"  placeholder="Masukkan Tanggal Pengembalian" id="inputTanggalPengembalian">
                </div>
            </div>
    
            <div class="d-grid gap-2 d-md-block p-3" style="margin-left: 182px; gap:50px">
              <a class="btn btn-primary" href="/data-pengembalian" role="button">Kembalikan Sekarang</a>
              </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection