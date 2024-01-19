@extends('layout.template')
<!-- START DATA -->
@section('konten')
    
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <H1>Data Barang Toko Ko Aliong</H1>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">Kode</th>
                <th class="col-md-4">Nama Barang</th>
                <th class="col-md-1">Jumlah</th>
                <th class="col-md-2">Suplier</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->suplier }}</td>
                <td>
                    <a href='{{ url('barang/'.$item->kode.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data??')" class="d-inline" action="{{ url('barang/'.$item->kode) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
            
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
    <div class="pb-3">
        <a href='{{ url('barang/create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>
</div>

<!-- AKHIR DATA -->
@endsection
    