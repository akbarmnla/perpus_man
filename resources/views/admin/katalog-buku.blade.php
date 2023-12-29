<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .form-search{
            margin-left: 400px;
            margin-top: 20px;
            margin-bottom: 50px;
        }

        .form-control{
            width: 500px;
            border-radius: 20px;
            border-inline: 5px solid #000851;
        }

        .card{
            text-align: center;
            
        }

        .img{
            width: 10px;
            height: 10px;
        }

        .stok-buku{
            text-align: left;
            font-size: 15px;
            color: #080aa59f
        }
    </style>
  </head>
  <body>
        {{-- navbar --}}
        <nav class="navbar navbar-dark" style="background-color:#000851 ">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/img/logo.png')}}"  alt="" width="50" height="50" class="d-inline-block align-text-top">
                SMAN 1 KOTA BOGOR
            </a>
            </div>
        </nav>
        {{-- akhir navbar --}}


        {{-- form search --}}
            <nav class="navbar navbar-light" >
                <div class="container-fluid">
                <form class="form-search" style="width: 500px">
                    <input class="form-control" type="search" placeholder="cari buku disini" aria-label="Search">
                </form>
                </div>
            </nav>
        {{-- akhir form search --}}

        {{-- card --}}
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="{{asset('assets/img/buku.jpg')}}"  class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="stok-buku">stok buku:10</p>
                            <h3 class="card-title">Judul Buku</h3>
                            <p class="card-text" style="font-size: 20px"><i>author</i></p>
                            {{-- <a href="#" class="btn btn-primary">Pinjam</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Judul Buku</h5>
                            <p class="card-text">author</p>
                            {{-- <a href="#" class="btn btn-primary">Pinjam</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Judul Buku</h5>
                            <p class="card-text">author</p>
                            {{-- <a href="#" class="btn btn-primary">Pinjam</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Judul Buku</h5>
                            <p class="card-text">author</p>
                            {{-- <a href="#" class="btn btn-primary">Pinjam</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- akhir card --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>
