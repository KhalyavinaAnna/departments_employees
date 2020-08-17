@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1 class="display-4">Добавить сотрудника</h1>

            @if ($errors->any())
             <div class="alert alert-danger">
                <ul>
                   @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                   @endforeach
                </ul>
             </div>
            @endif
            
            <div>
                <form method="post" action="{{ route('employees.store')}}">
    
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="имя">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="фамилия">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="patronymic" value="{{ old('patronymic') }}" placeholder="отчество">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sex" value="{{ old('sex') }}" placeholder="пол">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="salary" value="{{ old('salary') }}" placeholder="заработная плата">
                    </div>
   @foreach($departments as $department)  
   <div class="form-check">
  <input class="form-check-input" type="checkbox" name="department[]" value="{{ $department->id }}" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
   {{$department->department}}
  </label>
</div>
@endforeach
                    
                    
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Закрыть</a>
                    <button type="submit" name="submit" class="btn btn-primary">Сохранить</button>

                </form>
            </div>
            
        </div>
    </div>
@endsection
