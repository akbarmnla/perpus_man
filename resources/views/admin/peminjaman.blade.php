@extends('template.app')


@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaksi</h1>
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
            borrows: [],
            init() {
                let token = localStorage.getItem("token")
                fetch("http://http://localhost:3030/borrows", {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                }).then(res => res.json()).then(res => {
                    this.borrows = res.data
                })
            },
            formatDate(date) {
                let d = new Date(date)
                let dt = d.getDate() < 10 ? `0${d.getDate()}` : d.getDate();
                let m = d.getMonth() < 10 ? `0${d.getMonth()+1}` : d.getMonth() + 1;
                return `${d.getFullYear()}-${m}-${dt}`
            },
            returns(data) {
                let token = localStorage.getItem("token")
                fetch(`http://http://localhost:3030/borrows/${data._id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                    body: JSON.stringify({
                        "_method": "PUT",
                        "status": "returned",
                        "returnDate": this.formatDate(new Date())
                    })
                }).then(res => res.json()).then(res => {
                    this.init()
                })
            }
        }))
    </script>
@endsection

@section('content')
    {{-- tabel aksi --}}
    <div class="container">
        <div class="card">
            <h5 style="margin:20px ">DATA PEMINJAMAN</h5>
            <div class="d-grid gap-2 d-md-block" style="margin-left:20px">
                <a class="btn btn-outline-light" href="/tambah-peminjaman" role="button"style="background-color: #000851">Tambah
                    Peminjaman</a>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Buku</th>
                            <th>Member</th>
                            <th>Status</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <template x-for="(b, i) in borrows">
                                <tr>
                                        <td x-html="i+1"></th>
                                        <td x-html="b.borrowCode"></td>
                                        <td x-html="b.book.title"></td>
                                        <td x-html="b.member.fullname"></td>
                                        <td x-html="b.status == 'borrowed' ? 'Belum dikembalikan' : 'Sudah dikembalikan'"></td>
                                        <td x-html="formatDate(b.borrowDate)"></td>
                                        <td x-html="b.status == 'borrowed' ? '-' : formatDate(b.returnDate)"></td>
                                        <td>
                                            <template x-if="b.status == 'borrowed'">
                                                <button x-on:click="returns(b)" class="btn btn-primary">Kembalikan</button>
                                            </template>
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
