@extends('template.app')

@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Administrator</h1>
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
            "fullname": "",
            "email": "",
            "password": "",
            "address": "",
            "phone": "",
            "id": "{{ $id }}",
            init() {
                let token = localStorage.getItem("token")
                fetch(`http://localhost:3030/members?id=${this.id}`, {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                }).then(res => res.json()).then(res => {
                    for (k in res.data) {
                        if (k != "password") this[k] = res.data[k]
                    }
                    console.log(res, this.id)
                })
            },
            edit() {
                let token = localStorage.getItem("token")
                let data = {
                    "fullname": this.fullname,
                    "email": this.email,
                    "address": this.address,
                    "phone": this.phone,
                    "role": "admin",
                    "_method": "PUT"
                }
                if (this.password != "") data["password"] = this.password
                fetch(`http://localhost:3030/members/${this.id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${token}`
                    },
                    body: JSON.stringify(data)
                }).then(res => res.json()).then(res => {
                    console.log("asd")
                    location.href = "/data-administrator"
                })
            }
        }))
    </script>
@endsection

@section('content')
    <div class="container" style="">
        <div class="card">
            <h5 style="margin:20px ">Edit DATA ADMINISTRATOR</h5>
            <div class="mb-3 row m-3">
                <label for="inputNama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" id="inputNama"
                        x-model="fullname">
                </div>
            </div>
            <div class="mb-3 row m-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Alamat Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" placeholder="Masukkan Alamat Email" id="inputEmail"
                        x-model="email">
                </div>
            </div>
            <div class="mb-3 row m-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" placeholder="Masukkan Password" id="inputPassword"
                        x-model="password">
                </div>
            </div>
            <div class="mb-3 row m-3">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat Tinggal</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Masukkan Alamat" id="inputAlamat"
                        x-model="address">
                </div>
            </div>
            <div class="mb-5 row m-3 ">
                <label for="inputPassword" class="col-sm-2 col-form-label">No Telepon</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Masukkan No Telepon" id="inputNoTelepon"
                        x-model="phone">
                </div>
            </div>

            <div class="d-grid gap-2 d-md-block p-3" style="margin-left: 182px; gap:50px">
                <button x-on:click="edit" class="btn btn-primary" type="button">Edit</button>
                <a href="/data-administrator" class="btn btn-danger" type="button">Batal</a>
            </div>
        </div>
    </div>
@endsection
