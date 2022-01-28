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
            <button type="button" class="btn btn-neutral" data-toggle="modal" data-target="#modal-form"><i class="fas fa-plus"></i> Tambah Barang</button>
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
                        <button data-toggle="modal" data-target="#Modal-Form{{ $a->id }}" class="center btn btn-mn btn-primary"><i class="fas fa-eye"></i></button>
                        <button data-toggle="modal" data-target="#modal-form{{ $a->id }}" class="center btn btn-mn btn-warning"><i class=" fas fa-pencil-alt"></i></button>
                        <button type="button" data-toggle="modal" data-target="#modal-notification{{ $a->id }}" class="center btn btn-mn btn-danger"><i class="fa fa-trash"></i></button>

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
                    <span class="sr-only">Next</span>
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

{{-- TAMBAH DATA --}}
  <div class="row">
    <div class="col-md-6">
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-transparent ">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div class="text-muted text-center"><h2>Masukkan Data Barang</h2></div>

                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate="" action="{{ url('barang') }}" method="post">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                        <label class="form-control-label">ID Barang</label>
                                        <input type="text" disabled required  class="form-control" value="{{ $id }}" placeholder="ID Barang" >
                                        <input type="hidden" name="idBrg" value="{{ $id }}">
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Nama Barang</label>
                                        <input type="text" required name="nama_brg" class="form-control" placeholder="Nama Barang">
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Kategori</label>
                                        <input type="text" required  name="ktg" class="form-control" placeholder="Kategori">
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Deskripsi</label>
                                        <textarea class="form-control" required name="deskrip" placeholder="Deskripsi"></textarea>
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Jumlah</label>
                                        <input type="number" required name="jml" class="form-control" placeholder="Jumlah">
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Harga</label>
                                        <input type="number" required name="hrg" class="form-control" placeholder="Harga">
                                        </div>
                                        <div class="form-group text-center"><br>
                                            <input type="submit" class="btn btn-success" value="simpan">
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

{{-- DETAIL DATA --}}
@foreach ($barang as $ab)
  <div class="row">
    <div class="col-md-6">
        <div class="modal fade" id="Modal-Form{{ $ab->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-transparent ">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                <div class="text-muted text-center"><h2>Detail Data Barang</h2></div>

                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate="" method="post">
                                    @csrf
                                        <div class="form-group">
                                        <label class="form-control-label" >ID Barang</label>
                                        <input type="text" disabled name="nama_brg" value="{{ $ab->id_barang }}" class="form-control" placeholder="Nama Barang">
                                        </div>
                                        <div>
                                        <label class="form-control-label" >Nama Barang</label>
                                        <input type="text" disabled name="nama_brg" value="{{ $ab->nama_brg }}" class="form-control" placeholder="Nama Barang">
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Kategori</label>
                                        <input type="text" disabled  name="ktg" value="{{ $ab->kategori }}" class="form-control" placeholder="Kategori">
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Deskripsi</label>
                                        <textarea class="form-control" disabled name="deskrip"  placeholder="Deskripsi">{{ $ab->deskripsi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Jumlah</label>
                                        <input type="number" disabled name="jml" value="{{ $ab->jumlah }}" class="form-control" placeholder="Jumlah">
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Harga</label>
                                        <input type="number" disabled name="hrg" value="{{ $ab->harga }}" class="form-control" placeholder="Harga">
                                        </div>
                                        <div class="form-group text-center"><br>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                                Kembali
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endforeach


{{-- EDIT DATA --}}
@foreach ($barang as $b)
  <div class="row">
    <div class="col-md-6">
        <div class="modal fade" id="modal-form{{ $b->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-transparent ">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                <div class="text-muted text-center"><h2>Ubah Data Barang</h2></div>

                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate="" action="{{ url('barang/'.$b->id) }}" method="post">
                                    @method('patch')
                                    @csrf
                                        <div class="form-group">
                                        <label class="form-control-label" >Nama Barang</label>
                                        <input type="text" required name="nama_brg" value="{{ $b->nama_brg }}" class="form-control" placeholder="Nama Barang">
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Kategori</label>
                                        <input type="text" required  name="ktg" value="{{ $b->kategori }}" class="form-control" placeholder="Kategori">
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Deskripsi</label>
                                        <textarea class="form-control" required name="deskrip" placeholder="Deskripsi">{{ $ab->deskripsi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Jumlah</label>
                                        <input type="number" required name="jml" value="{{ $b->jumlah }}" class="form-control" placeholder="Jumlah">
                                        </div>
                                        <div class="form-group">
                                        <label class="form-control-label" >Harga</label>
                                        <input type="number" required name="hrg" value="{{ $b->harga }}" class="form-control" placeholder="Harga">
                                        </div>
                                        <div class="form-group text-center"><br>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                                Kembali
                                            </button>
                                            <input type="submit" class="btn btn-success" value="simpan">
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endforeach


{{-- DELETE DATA --}}
@foreach ($barang as $c)
<div class="col-md-4">
    <div class="modal fade" id="modal-notification{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-danger">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="py-3 text-center">
                        <i class="fas fa-question-circle ni-5x"></i>
                        <h4 class="heading mt-4">Peringatan</h4>
                        <p>Apakah Anda Yakin Mengahpus Data Barang "{{ $c->nama_brg }}" ?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="POST" class="d-inline" action="{{ url('barang/'.$c->id)}}">
                        @method('delete')
                        @csrf
                        <button class="btn btn-white" >
                            Oke
                        </button>
                    </form>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
