@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1 class="display-4">Редактировать название отдела</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br/>
            @endif
            <form method="post" action="{{ route('departments.update', $department->id) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" name="department" value="{{ old('department', $department->department) }}"
                           placeholder="отдел">

                </div>
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">Закрыть</a>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
