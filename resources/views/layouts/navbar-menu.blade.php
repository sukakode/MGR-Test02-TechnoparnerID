<ul class="navbar-nav mr-auto">
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('home') }}">Home </a>
  </li> 
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Kategori
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('kategori.index') }}">List Kategori</a>
      <a class="dropdown-item" href="{{ route('kategori.create') }}">Tambah Kategori</a>
    </div>
  </li> 
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Transaksi
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('transaksi.index') }}">List Transaksi</a>
      <a class="dropdown-item" href="{{ route('transaksi.create') }}">Tambah Transaksi</a>
    </div>
  </li> 
</ul> 