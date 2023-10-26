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
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Detail Produk</h4>
            <div class="ml-auto">
            </div>
            <a href="{{ route('product.index') }}" type="button" class="btn btn-primary btn-round ml-2">Kembali</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Nama Produk :</strong>
                {{ $product->product_name }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Kategori :</strong>
                {{ $product->category }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Harga :</strong>
                {{ $product->price }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Deskripsi :</strong>
                {{ $product->description }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection