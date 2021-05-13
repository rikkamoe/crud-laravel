<!DOCTYPE html>
<html>
<head>
    <title>Testing CRUD Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url ('/') }}">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="row">
    <div class="col-md-6">
      @foreach($tb_barang as $item)
      <form method="post" action="{{ $item->id }}/update" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ $item->nama }}">
          @error('nama')
            <div class="invalid-feedback"> {{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Harga</label>
          <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Harga" value="{{ $item->harga }}">
          @error('harga')
            <div class="invalid-feedback"> {{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Gambar</label>
            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
            @error('gambar')
              <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-3">Kirim</button>
      </form>
      @endforeach
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</html>
