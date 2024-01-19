@extends('layout.template')
@section('konten')
<!-- START FORM -->
<form action='{{ url('barang') }}' method='post'>
@csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1>Tambah Data Barang</h1>
        <div class="mb-3 row">
            <label for="kode" class="col-sm-2 col-form-label">Kode Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kode' value="{{ Session::get('kode') }}" id="kode">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_barang' value="{{ Session::get('nama_barang') }}" id="nama_barang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jumlah' value="{{ Session::get('jumlah') }}" id="jumlah">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="suplier" class="col-sm-2 col-form-label">Suplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='suplier' value="{{ Session::get('suplier') }}" id="suplier">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-1 col-form-label"><a href="{{ url('barang') }}" class="btn btn-secondary">BATAL</a></div>
            <div class="col-sm-2 col-form-label"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
    <!-- AKHIR FORM -->
@endsection