@extends('template.app')


@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Anggota</h1>
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
            members: [],
            role: localStorage.getItem("role"),
            init() {
                let token = localStorage.getItem("token")
                fetch("http://localhost:3030/members", {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                }).then(res => res.json()).then(res => {
                    this.members = []
                    for (let x of res.data)
                        if (x.role == 'member') this.members.push(x)
                })
            },
            deletes(data) {
                let token = localStorage.getItem("token")
                if (!confirm("yakin hapus ?")) return;
                console.log("YES")
                fetch(`http://localhost:3030/members/${data._id}`, {
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
                location.href = `/update-anggota/${data._id}`
            }
        }))
    </script>
@endsection

@section('content')
    {{-- tabel aksi --}}
    <div class="container">
        <div class="card">
            <h5 style="margin:20px ">ANGGOTA</h5>
            <div class="d-grid gap-2 d-md-block" style="margin-left:20px">
                <a class="btn btn-outline-light" href="/tambah-anggota"
                    role="button"style="background-color: #000851">Tambah Anggota</a>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <template x-for="(x, i) in members">
                                <tr>
                                    <td x-html="i+1">1</td>
                                    <td x-html="x.fullname">Adip Idi Surya</td>
                                    <td x-html="x.email">adip@gmail.com</td>
                                    <td x-html="x.phone">08123456789</td>
                                    <td x-html="x.address">Jl. Raya Bogor</td>
                                    <td>
                                        <button x-on:click="edit(x)" class="btn btn-primary">Edit</button>
                                        <button x-on:click="deletes(x)" class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </section>
        <!-- /.content -->
    @endsection
