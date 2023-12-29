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

@section('script')
    <script>
        Alpine.data('data', () => ({
            role: localStorage.getItem("role"),
            books: [],
            members: [],
            form: {
                "id_member": "",
                "id_book": "",
                "totalBorrow": 1,
                "borrowDate": "",
                "status": "borrowed",
            },
            init() {
                let token = localStorage.getItem("token")
                this.getMembers(token)
                this.getBooks(token)
                this.form.borrowDate = this.formatDate(new Date())
            },
            formatDate(date) {
                let d = new Date(date)
                let dt = d.getDate() < 10 ? `0${d.getDate()}` : d.getDate();
                let m = d.getMonth() < 10 ? `0${d.getMonth()+1}` : d.getMonth() + 1;
                return `${d.getFullYear()}-${m}-${dt}`
            },
            getMembers(token) {
                fetch("http://localhost:3030/members", {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                }).then(res => res.json()).then(res => {
                    for (let x of res.data) if (x.role == 'member') this.members.push(x)
                    if (this.members.length > 0) this.form.id_member = this.members[0]._id
                })
            },
            getBooks(token) {
                fetch("http://localhost:3030/books", {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                }).then(res => res.json()).then(res => {
                    this.books = res.data
                    if (this.books.length > 0) this.form.id_book = this.books[0]._id
                })
            },
            borrow() {
                let token = localStorage.getItem("token")
                console.log(JSON.stringify(this.form))
                fetch("http://localhost:3030/borrows", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                    body: JSON.stringify(this.form)
                }).then(res => res.json()).then(res => {
                    location.href = "/peminjaman"
                })
            }
        }))
    </script>
@endsection

@section('content')
    {{-- tabel aksi --}}
    <div class="container">
        <div class="card">
            <h5 style="margin:20px ">TRANSAKSI PEMINJAMAN</h5>

            <div class="mb-3 row m-3">
                <label for="inputNoPinjam" class="col-sm-2 col-form-label">Member</label>
                <div class="col-sm-8">
                    <select class="form-control" x-model="form.id_member">
                        <template x-for="(x, i) in members">
                            <template x-if="i == 0">
                                <option selected x-bind:value="x._id" x-html="x.fullname"></option>
                            </template>
                            <template x-else>
                                <option x-bind:value="x._id" x-html="x.fullname"></option>
                            </template>
                        </template>
                    </select>
                </div>
            </div>

            <div class="mb-3 row m-3">
                <label for="inputNoPinjam" class="col-sm-2 col-form-label">Buku</label>
                <div class="col-sm-8">
                    <select class="form-control" x-model="form.id_book">
                        <template x-for="(x, i) in books">
                            <template x-if="i == 0">
                                <option selected x-bind:value="x._id" x-html="x.title"></option>
                            </template>
                            <template x-else>
                                <option x-bind:value="x._id" x-html="x.title"></option>
                            </template>
                        </template>
                    </select>
                </div>
            </div>
            
            <div class="mb-3 row m-3">
                <label for="inputTanggalPinjam" class="col-sm-2 col-form-label">Total Peminjaman</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" placeholder="Masukkan Total Peminjaman" id="inputTanggalPinjam" x-model="form.totalBorrow">
                </div>
            </div>

            <div class="d-grid gap-2 d-md-block p-3" style="margin-left: 182px; gap:50px">
                <button x-on:click="borrow" class="btn btn-primary" href="/data-peminjaman" role="button">Pinjam Sekarang</button>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
