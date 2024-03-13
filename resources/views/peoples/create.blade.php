@extends('layouts.app')
@section('content')
    <div class="card push-top w-50 m-auto mt-2">
        <div class="card-header">
            Добавить
        </div>
        <div class="card-body">
            <form method="post" action="{{route('peoples.store',$schoolClass->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}"/>
                    @error('name')
                    <span class="invalid-feedback fs-6">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="birth_date">Дата рождения</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" id="birth_date" value="{{old('birth_date')}}"/>
                    @error('birth_date')
                    <span class="invalid-feedback fs-6">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="photo">Фотография</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo"/>
                    @error('photo')
                    <span class="invalid-feedback fs-6">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-grid gap-1">
                    <button type="submit" class="btn btn-block btn-success">Cохранить</button>
                    <a class="btn btn-danger" href="{{url()->previous()}}">Назад</a>
                </div>
            </form>
        </div>
    </div>
@endsection
