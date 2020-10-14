@extends('adminlte::page')

@section('title', 'Laragmap | Lokasi')

@section('content_header')
    <h1>Lokasi Page</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md">
      <x-alert></x-alert>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <a href="{{ route('lokasi.create') }}" class="btn btn-sm btn-primary">
              <i class="fa fa-plus"></i>&nbsp;Tambah Data
            </a>
            <a href="{{ route('lokasi.maps') }}" class="btn btn-sm btn-secondary">
              <i class="fa fa-map-marker-alt"></i>&nbsp;Maps View
            </a>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered table-striped dataTable">
            <thead>
              <tr>
                <th width="30">No.</th>
                <th>Nama Lokasi</th>
                <th width="230">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach ($lokasis as $lks)
                  <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $lks->nm_lks }}</td>
                    <td class="text-center">
                      <a href="{{ route('lokasi.show', ['lokasi'=>$lks->id_lks]) }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-eye"></i>&nbsp;lihat
                      </a>
                      <a href="{{ route('lokasi.edit', ['lokasi'=>$lks->id_lks]) }}" class="btn btn-sm btn-success">
                        <i class="fa fa-edit"></i>&nbsp;Ubah
                      </a>
                      <form action="{{ route('lokasi.destroy', ['lokasi'=>$lks->id_lks]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                          <i class="fa fa-trash-alt"></i>&nbsp;Hapus
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
@stop

@section('plugins.Datatables', true)

@section('js')
<script>
  $(function () {
    $('.dataTable').DataTable({
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
@stop
