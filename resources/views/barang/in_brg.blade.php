@extends('layout')
@section('section')


  <!-- Page content -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-8 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Tambah Barang </h3>
              </div>
            </div>
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
                        <a href="{{ url('barang') }}" class="btn  btn-raised btn-danger">Kembali </a>
                    </div>
            </form>
          </div>
        </div>
      </div>
    </div>
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
