@extends('layouts.template')

@section('content')
<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Data Produk</h4>
    <ul class="breadcrumbs">
      <li class="nav-item">
        <a href="{{ route('product.index') }}">Data Produk</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @if ($message = Session::get('berhasil'))
      <div class="alert alert-success" role="alert">
        <p>{{ $message }}</p>
      </div>
      @endif
      @if ($message = Session::get('gagal'))
      <div class="alert alert-danger" role="alert">
        <p>{{ $message }}</p>
      </div>
      @endif
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Produk</h4>
            <div class="ml-auto">
            </div>
            <a href="{{ route('product.create') }}" type="button" class="btn btn-primary btn-round ml-2"><i class="fa fa-plus"></i> Tambah Data</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="add-row" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th style="width: 20px; text-align: center;">No</th>
                  <th style="text-align: center;">Nama Produk</th>
                  <th style="text-align: center;">Kategori</th>
                  <th style="text-align: center;">Harga</th>
                  <th style="text-align: center;">Deskripsi</th>
                  <th style="width: 185px; text-align: center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($product as $pr)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $pr->product_name }}</td>
                  <td>{{ $pr->category }}</td>
                  <td>{{ $pr->price }}</td>
                  <td>{{ $pr->description }}</td>
                  <td>
                    <form action="{{ route('product.destroy',$pr->id) }}" method="POST">
                      <a href="{{ route('product.show',$pr->id) }}"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Detail">
                          <i class="fa fa-eye"></i>
                        </button></a>
                      <a href="{{ route('product.edit',$pr->id) }}"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Ubah">
                          <i class="fa fa-edit"></i>
                        </button></a>

                      @csrf
                      @method('DELETE')

                      <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                        <i class="fa fa-times"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content_js')
<script>
  $(document).ready(function() {
    // Add Row
    $('#add-row').DataTable({
      "pageLength": 5,
    });

    var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
  });
</script>
@endsection