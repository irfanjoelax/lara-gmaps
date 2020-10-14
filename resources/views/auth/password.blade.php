@extends('adminlte::page')

@section('title', 'Laragmaps | Change Password')

@section('content_header')
    <h1>
      Change Password Page
    </h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-7">
    <x-alert></x-alert>
    <div class="card card-primary">
      <div class="card-body">
        <form action="{{ route('change.password', ['id'=>$user->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
            <div class="col-sm-9">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="ex: masukkan password baru" value="{{ old('password') }}">
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="password_confirmation" class="col-sm-3 col-form-label">Ulang Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="ex: sama dengan password" value="{{ old('password_confirmation') }}">
              @error('password_confirmation')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-9 offset-3">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop