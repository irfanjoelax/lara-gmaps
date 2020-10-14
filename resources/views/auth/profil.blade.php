@extends('adminlte::page')

@section('title', 'Laragmaps | Profil')

@section('content_header')
    <h1>
      Profil Page
    </h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-6">
    <x-alert></x-alert>
    <div class="card card-primary">
      <div class="card-body">
        <form action="{{ route('change.profil', ['id'=>$user->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10 offset-2">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop