@extends('layouts.app')
@section('content')
    <div class="card push-top w-50 m-auto mt-2">
        <div class="card-header">
            Список учеников класса "{{$schoolClass->name}}"
        </div>
        <div class="card-body">
            @if($peoples->isNotEmpty())
                @foreach($peoples as $people)
                    <div class="card mt-2">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $people->name }}</h5>
                                <p class="card-text">
                                    Дата рождения: {{ $people->birth_date }}
                                </p>
                                <a class="btn btn-primary" href="{{ route('peoples.edit', $people->id) }}">Редактировать</a>
                                <button type="button" class="btn btn-danger deleteBtn" data-id="{{ $people->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    Удалить
                                </button>
                            </div>
                            <div>
                                <img src="{{$people->photo_url}}" alt="Фото ученика" style="max-width: 100px;">
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $peoples->links('pagination.template') }}
            @else
                <p>Учеников нет.</p>
            @endif
            <div class="d-grid gap-1 mt-2">
                <a class="btn btn-success" href="{{ route('peoples.create',$schoolClass->id) }}">Добавить ученика</a>
                <a class="btn btn-danger" href="{{route('school_classes.index')}}">Назад</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Подтвердите удаление</h5>
                </div>
                <div class="modal-body">
                    Вы уверены, что хотите удалить?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="confirmDelete">Удалить</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let deleteId;
       /*     let deleteBtn;*/
            $('.deleteBtn').on('click', function() {
                deleteId = $(this).data('id');
               /* deleteBtn = $(this);*/
            });

            $('#confirmDelete').on('click', function() {
                $.ajax({
                    url: "/destroy/" + deleteId,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(result) {
                        location.reload();
                        /*deleteBtn.closest('.card').remove();*/
                    }
                });
            });
        });
    </script>
@endsection
