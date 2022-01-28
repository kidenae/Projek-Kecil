@extends('layout')
@section('section')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Success!</strong> {{ session('status') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Barang</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Barang</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="in_barang" class="btn btn-neutral"><i class="fas fa-plus"></i> Tambah Barang</a>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Data Barang </h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th >#</th>
                  <th >Nama Barang</th>
                  <th >Kategori</th>
                  <th >Jumlah</th>
                  <th >Harga</th>
                  <th class="text-center" >Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($barang as $a )
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td> {{ $a->nama_brg }} </td>
                    <td> {{ $a->kategori }} </td>
                    <td> {{ $a->jumlah }}</td>
                    <td> {{ $a->harga }}</td>
                    <td>
                        <a href="{{ url('barang/edit/'.$a->id) }}" class="center btn btn-mn btn-warning">
                            <i class=" fas fa-pencil-alt"></i>
                        </a>
                        <form method="POST" class="d-inline" action="{{ url('barang/'.$a->id) }}" onsubmit="return confirm('Apakah Anda Yakin Hapus Data Barang {{ $a->nama_brg }} ?')">
                            @method('delete')
                            @csrf
                            <button class=" btn btn-circle btn-mn center btn-danger" >
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                    <span class="sr-only">Next Page</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- Dark table -->

    <!-- Footer -->
    <footer class="footer pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
          <div class="copyright text-center  text-lg-left  text-muted">
            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  </div>

@endsection
