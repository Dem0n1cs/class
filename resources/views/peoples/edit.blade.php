@extends('layouts.app')
@section('content')
    <div class="card push-top w-50 m-auto mt-2">
        <div class="card-header">
            Редактировать
        </div>
        <div class="card-body">
            <form method="post" action="{{route('peoples.update',$people->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                           value="{{old('name',$people->name)}}"/>
                    @error('name')
                    <span class="invalid-feedback fs-6">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="birth_date">Дата рождения</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                           id="birth_date" value="{{old('birth_date',$people->birth_date)}}"/>
                    @error('birth_date')
                    <span class="invalid-feedback fs-6">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2 text-center">
                    <label for="existing-photo" class="d-block">Текущее фото</label>
                    <img src="{{$people->photo_url}}" id="existing-photo" class="img-thumbnail mx-auto d-block"
                         width="200px" alt="photo"/>
                </div>
                <div class="form-group mb-2">
                    <label for="photo">Фотография</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
                           id="photo"/>
                    @error('photo')
                    <span class="invalid-feedback fs-6">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="school_class_id">Ученик класса</label>
                    <select class="form-select" name="school_class_id" id="school_class_id">
                        @foreach($schoolClasses  as $schoolClass)
                            <option value="{{$schoolClass->id}}" @selected(old('school_class_id', $people->school_class_id) === $schoolClass->id)>
                                {{$schoolClass->name}}
                            </option>
                        @endforeach
                    </select>
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
