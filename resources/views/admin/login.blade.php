<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .card {
            height: 480px;
            border-radius: 20px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        }

        .login-start {
            margin-top: 50px;
        }

        .card-title {
            font-size: 40px;

        }

        .form-login {
            margin-bottom: 10px;
            font-size: 15px;
            margin-top: 10px;
        }

        .form-check {
            margin-left: 150px;
            margin-bottom: 30px;
        }

        .daftar {
            margin-top: 20px;
        }

        .row {
            margin-right: 50px;
        }

        .btn-primary {
            background-color: rgb(23, 177, 224);
            border-radius: 20px;
        }

        .social-icons {
            display: flex;
        }

        .social-icon {
            font-size: 20px;
            margin: 0 10px;
            border: #d1cbcb;
            /* Warna border abu-abu */
            padding: 8px;

        }

        .facebook {
            color: #1877f2;
            /* Warna Facebook */
        }

        .google {
            color: #ea4335;
            /* Warna Google */
        }

        .instagram {
            color: #bc2a8d;
            /* Warna Instagram */
        }
    </style>
    <script src="//unpkg.com/alpinejs"></script>
    <script>
        Alpine.data("data", () => ({
            email: "",
            password: "",
            error: "",
            login() {
                // Validasi input, contoh: pastikan email dan password diisi
                if (!this.email || !this.password) {
                    this.error = "Email dan password harus diisi";
                    return;
                }
    
                fetch("http://localhost:3030/login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        email: this.email,
                        password: this.password
                    })
                })
                .then(res => {
                    if (!res.ok) {
                        throw new Error('Gagal melakukan login');
                    }
                    return res.json();
                })
                .then(res => {
                    // Lakukan sesuatu dengan respon yang diterima
                    localStorage.setItem("token", res.data.accessToken);
                    localStorage.setItem("name", res.data.fullname);
                    localStorage.setItem("role", res.data.role);
                    localStorage.setItem("id", res.data._id);
                    location.href = "/dashboard";
                })
                .catch(error => {
                    // Tangani kesalahan
                    console.error('Kesalahan:', error);
                    this.error = "Terjadi kesalahan saat melakukan login";
                });
            }
        }))
    </script>
</head>

<body x-data="data">
    <div class="container">
        <div class="row justify-content-md-center">
        </div>
        <div class="row">
            <div class="col">
                <div class="card-kiri" style="width: 40rem;">
                    {{-- <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.dbl.id%2Fs%2Fprofile%2F7513%2Fsman-1-bogor&psig=AOvVaw0d2CWunuHMPoqwIh9RNT2S&ust=1700990023594000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCKDrwf7o3oIDFQAAAAAdAAAAABAE" class="card-img-top" alt="..."> --}}
                    <div class="card-body" style="text-align: center">
                        <h1 class="card-title-kiri" style="margin-top: 80px">Masuk Ke Aplikasi <span
                                style="color: rgb(23, 177, 224)">SIPUS</span></h1>
                        <p class="card-text-kiri" style="font-size: 15px">Masuk ke aplikasi SIPUS untuk mengecek dan
                            melihat daftar buku yang tersedia di perpustakaan SMAN 1 KOTA BOGOR</p>
                    </div>
                    <img src="{{ asset('assets/img/logo.png') }}" style="margin-left: 190px" width="40%"
                        alt="">
                </div>
            </div>
            <div class="col-md-auto">
                <div class="login-start">
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                            <h5 class="card-text">Selamat Datang di <span style="color:rgb(23, 177, 224) ">SIPUS</span>
                            </h5>
                            <p class="card-title">Masuk</p>

                            <div class="form-login">
                                <label for="exampleInputEmail1" class="form-label">Masukkan Alamat Email</label>
                                <input type="email" class="form-control" placeholder="Username atau Alamat Email"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" x-model="email">
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="form-login">
                                <label for="exampleInputPassword1" class="form-label">Masukkan Password Anda</label>
                                <input type="password" class="form-control" placeholder="Password"
                                    id="exampleInputPassword1" x-model="password">
                            </div>
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <button class="btn btn-primary" x-on:click="login()">Masuk</button>
                            </div>
                            <div x-show="error" style="color: red; margin-top: 10px;"></div>
                            <div class="daftar">
                                <p>Belum punya akun? <a href="/register">Daftar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        if (localStorage.getItem("token") != null) location.href = "/dashboard"
    </script>
</body>

</html>
