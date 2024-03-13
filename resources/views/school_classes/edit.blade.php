@extends('layouts.app')
@section('content')
    <div class="card push-top w-50 m-auto mt-2">
        <div class="card-header">
            Редактировать
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('school_classes.update',$schoolClass->id) }}">
                <div class="form-group mb-2">
                    @csrf
                    @method('PATCH')
                    <label for="name">Название</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name',$schoolClass->name)}}"/>
                    @error('name')
                    <span class="invalid-feedback fs-6">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-grid gap-1">
                    <button type="submit" class="btn btn-block btn-success">Сохранить</button>
                    <a class="btn btn-danger" href="{{route('school_classes.index')}}">Назад</a>
                </div>
            </form>
        </div>
    </div>
@endsection
