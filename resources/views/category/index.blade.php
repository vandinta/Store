@extends('layouts.template')

@section('content')
<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Data Kategori</h4>
    <ul class="breadcrumbs">
      <li class="nav-item">
        <a href="{{ route('category.index') }}">Data Kategori</a>
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
            <h4 class="card-title">Data Kategori</h4>
            <div class="ml-auto">
            </div>
            <a type="button" class="btn btn-primary btn-round ml-2" style="color: white;" data-toggle="modal" data-target="#addmodal"><i class="fa fa-plus"></i> Tambah Data</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="display table table-striped table-hover" style="margin-top: -20px;">
              <thead>
                <tr>
                  <th style="width: 150px; text-align: center;">No</th>
                  <th style="text-align: center;">Kategori</th>
                  <th style="width: 350px; text-align: center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- addModal -->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-form">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label> Kategori </label>
            <input type="text" id="category" name="category" class="form-control" placeholder="Kategori">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ShowModal -->
<div class="modal fade" id="showmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="show-form">
        <div class="modal-body">
          <div class="form-group">
            <label> Kategori </label>
            <input type="text" id="datakategori" name="datakategori" class="form-control category" placeholder="Kategori" disabled>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- UpdateModal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="update-form">
        @csrf
        <div class="modal-body">
          <input type="hidden" id="id" name="id" class="form-control id">
          <div class="form-group">
            <label> Kategori </label>
            <input type="text" id="kategori" name="kategori" class="form-control category" placeholder="Kategori">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- DeleteModal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="delete-form">
        @csrf
        <div class="modal-body">
          <input type="hidden" id="id" name="id" class="form-control id">
          <h4>Apakah Anda Yakin Akan menghapus Data Kategori Ini? Jika Anda Yakin Klik Hapus</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-danger confirm_delete_data">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function getCookie(name) {
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].trim();
      if (cookie.startsWith(name + '=')) {
        return cookie.substring(name.length + 1, cookie.length);
      }
    }
    return null;
  }

  if (getCookie("access_token") == null) {
    window.location.replace('http://127.0.0.1:8000/login');
  }

  $.ajax({
    type: "GET",
    url: 'http://127.0.0.1:8000/api/category',
    headers: {
      Authorization: 'Bearer ' + getCookie("access_token")
    },
    dataType: 'json',
    success: function(result) {
      $.each(result.data, function(key, value) {
        $("tbody").append(`
          <tr class="category${value.id}">
              <td style="text-align: center;">
                  <h6 class="email-user text-sm mb-0 ps-3">${key + 1 }</h6>
              </td>
              <td style="text-align: center;">
                  <h6 class="email-user text-sm mb-0 ps-3">${value.category}</h6>
              </td>
              <td style="text-align: center;">
                <a type="button" class="btn btn-link btn-primary btn-show-post" style="color: white;" data-id="${value.id}" data-category="${value.category}"><i class="fa fa-eye"></i></a>
                <a type="button" class="btn btn-link btn-primary btn-edit-post" style="color: white;" data-id="${value.id}" data-category="${value.category}"><i class="fa fa-edit"></i></a>
                <a type="button" class="btn btn-link btn-danger btn-delete-post" style="color: white;" data-id="${value.id}" data-category="${value.category}"><i class="fa fa-times"></i></a>
              </td>
          </tr>
      `);
      })
    },

  });

  document.addEventListener("DOMContentLoaded", function() {
    const addForm = document.getElementById("add-form");

    addForm.addEventListener("submit", function(e) {
      e.preventDefault();

      const category = document.getElementById("category").value;
      const headers = new Headers();

      $.ajax({
        url: "http://127.0.0.1:8000/api/category/create",
        method: "POST",
        headers: {
          'Authorization': 'Bearer ' + getCookie("access_token"),
          'Content-Type': 'application/json',
        },
        data: JSON.stringify({
          category
        }),
        success: function(result, data) {
          if (data == 'success') {
            alert('Berhasil Menambahkan Kategori');
            location.reload();
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    });
  });

  $(document).on('click', '.btn-show-post', function() {
    const id = $(this).data('id');
    const category = $(this).data('category');
    $('.id').val(id);
    $('.category').val(category);
    $('#showmodal').modal('show');
  });

  $(document).on('click', '.btn-edit-post', function() {
    const id = $(this).data('id');
    const category = $(this).data('category');
    $('.id').val(id);
    $('.category').val(category);
    $('#editmodal').modal('show');
  });

  document.addEventListener("DOMContentLoaded", function() {
    const updateForm = document.getElementById("update-form");

    updateForm.addEventListener("submit", function(e) {
      e.preventDefault();

      const id = document.getElementById("id").value;
      const category = document.getElementById("kategori").value;
      const headers = new Headers();

      $.ajax({
        url: "http://127.0.0.1:8000/api/category/update",
        method: "POST",
        headers: {
          'Authorization': 'Bearer ' + getCookie("access_token"),
          'Content-Type': 'application/json',
        },
        data: JSON.stringify({
          id,
          category
        }),
        success: function(result, data) {
          if (data == 'success') {
            alert('Berhasil Mengubah Kategori');
            window.location.replace('http://127.0.0.1:8000/category');
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    });
  });

  $(document).on('click', '.btn-delete-post', function() {
    const id = $(this).data('id');
    $('.id').val(id);
    $('#deletemodal').modal('show');
  });

  $(document).on('click', '.confirm_delete_data', function() {
    const id = document.getElementById("id").value;
    const headers = new Headers();

    $.ajax({
      url: "http://127.0.0.1:8000/api/category/delete",
      method: "DELETE",
      headers: {
        'Authorization': 'Bearer ' + getCookie("access_token"),
        'Content-Type': 'application/json',
      },
      data: JSON.stringify({
        id
      }),
      success: function(result, data) {
        if (data == 'success') {
          alert('Berhasil Menghapus Kategori');
          window.location.replace('http://127.0.0.1:8000/category');
        }
      },
      error: function(error) {
        console.log(error);
      }
    });
  });
</script>