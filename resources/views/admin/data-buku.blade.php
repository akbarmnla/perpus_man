@extends('template.app')


@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Buku</h1>
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
            books: [],
            role: localStorage.getItem("role"),
            init() {
                let token = localStorage.getItem("token")
                fetch("http://localhost:3030/books", {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                }).then(res => res.json()).then(res => {
                    this.books = res.data
                })
            },
            deletes(data) {
                let token = localStorage.getItem("token")
                if (!confirm("yakin hapus ?")) return;
                fetch(`http://localhost:3030/books/${data._id}`, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                }).then(res => res.json()).then(res => {
                    this.init()
                })
            },
            edit(data) {
                location.href=`/update-buku/${data._id}`
            }
        }))
    </script>
@endsection

@section('content')
    {{-- tabel aksi --}}
    <div class="container">
        <div class="card">
            <h5 style="margin:20px ">DATA BUKU</h5>
            <div class="d-grid gap-2 d-md-block" style="margin-left:20px">
                <a class="btn btn-outline-light" href="/tambah-buku" role="button"style="background-color: #000851">Tambah
                    Buku</a>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Stok</th>
                            <th>Jumlah Halaman</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <template x-for="(b, i) in books">
                                <tr>
                                    <td x-html="i+1"></th>
                                        <td x-html="b.title"></td>
                                        <td x-html="b.author">Adip</td>
                                        <td x-html="b.publisher">Universitas Negeri Jakarta</td>
                                        <td x-html="b.stock">80</td>
                                        <td x-html="b.pages">100</td>
                                        <td>
                                            <button x-on:click="edit(b)" class="btn btn-primary">Edit</button>
                                            <button x-on:click="deletes(b)" class="btn btn-danger">Hapus</button>
                                        </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
