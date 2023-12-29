@extends('template.app')

@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Buku</h1>
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

@section('script')
    <script>
        Alpine.data("data", () => ({
            role: localStorage.getItem("role"),
            "title": "",
            "author": "",
            "description": "",
            "published": "",
            "publisher": "",
            "pages": 0,
            "isbn": 0,
            "stock": 0,
            add() {
                let token = localStorage.getItem("token")
                fetch("http://localhost:3030/books", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                    body: JSON.stringify(this)
                }).then(res => res.json()).then(res => {
                    location.href = "/data-buku"
                })
            }
        }))
    </script>
@endsection

@section('content')
    <div class="container" style="">
        <div class="card">
            <h5 style="margin:20px ">TAMBAH DATA BUKU</h5>
            <div class="mb-3 row m-3">
                <label for="inputJudulBuku" class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Masukkan Judul Buku" id="inputJudulBuku"
                        x-model="title">
                </div>
            </div>
            <div class="mb-3 row m-3">
                <label for="inputPenerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Masukkan Nama Penerbit" id="inputPenerbit"
                        x-model="publisher">
                </div>
            </div>
            <div class="mb-3 row m-3">
                <label for="inputPengarang" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Masukkan Nama Pengarang" id="inputPengarang"
                        x-model="author">
                </div>
            </div>
            <div class="mb-3 row m-3 ">
                <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Terbit</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" placeholder="Tanggal Terbit" id="inputTahunTerbit"
                        x-model="published">
                </div>
            </div>
            <div class="mb-3 row m-3 ">
                <label for="inputIsbn" class="col-sm-2 col-form-label">ISBN</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" placeholder="Masukkan ISBN" id="inputIsbn" x-model="isbn">
                </div>
            </div>
            <div class="mb-3 row m-3 ">
                <label for="inputJumlahBuku" class="col-sm-2 col-form-label">Jumlah Buku</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" placeholder="Masukkan Jumlah Buku" id="inputJumlahBuku"
                        x-model="stock">
                </div>
            </div>
            <div class="mb-3 row m-3 ">
                <label for="inputJumlahBuku" class="col-sm-2 col-form-label">Jumlah Halaman</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" placeholder="Masukkan Jumlah Buku" id="inputJumlahBuku2"
                        x-model="pages">
                </div>
            </div>
            <div class="mb-3 row m-3 ">
                <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-8">
                    <textarea class="form-control" placeholder="Masukkan Deskripsi" id="inputDeskripsi" x-model="description"></textarea>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-block p-3" style="margin-left: 182px; gap:50px">
                <button x-on:click="add" class="btn btn-primary" type="button">Tambah</button>
                <a href="/data-buku" class="btn btn-danger" type="button">Batal</a>
            </div>
        </div>
    </div>
@endsection
