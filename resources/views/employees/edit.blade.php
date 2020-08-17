@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1 class="display-4">Редактировать данные</h1>

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
            <form method="post" action="{{ route('employees.update', $employee->id) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $employee->first_name) }}"
                           placeholder="имя">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $employee->last_name) }}"
                           placeholder="фамилия">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="patronymic" value="{{ old('patronymic', $employee->patronymic) }}"
                           placeholder="отчество">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="sex" value="{{ old('sex', $employee->sex) }}"
                           placeholder="пол">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="position" value="{{ old('salary', $employee->salary) }}"
                           placeholder="заработная плата">
                </div>
                @foreach($departments as $department)  
   <div class="form-check">
  <input class="form-check-input" type="checkbox" name="department[]" value="{{ $department->id }}" id="defaultCheck1"
  @if ($employee->departments()->where('id',$department->id)->count()) checked="checked" @endif>
  
   {{$department->department}}
  </label>
</div>
@endforeach
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Закрыть</a>
                    <button type="submit" name="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
