@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1 class="display-4">Название отдела</h1>

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
                <form method="post" action="{{ route('departments.store')}}">
    
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="department" value="{{ old('department') }}" placeholder="отдел">

                    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Закрыть</a>
                    <button type="submit" name="submit" class="btn btn-primary">Сохранить</button>

                </form>
            </div>
            
        </div>
    </div>
@endsection
