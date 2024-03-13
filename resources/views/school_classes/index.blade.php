@extends('layouts.app')
@section('content')
    <div class="push-top w-75 m-auto mt-2">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('school_classes.create') }}">Добавить</a>
            </div>
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>Название</td>
                <td class="text-center">Действия</td>
            </tr>
            </thead>
            <tbody>
            @foreach($schoolClasses as $schoolClass)
                <tr>
                    <td>{{$schoolClass->id}}</td>
                    <td>{{$schoolClass->name}}</td>
                    <td class="text-center">
                        <a href="{{ route('peoples.show_class',$schoolClass->id)}}" class="btn btn-primary btn-sm">Список учеников класса</a>
                        <a href="{{ route('school_classes.edit', $schoolClass->id)}}" class="btn btn-primary btn-sm">Редактировать</a>
                            <form action="{{ route('school_classes.destroy', $schoolClass->id)}}" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
