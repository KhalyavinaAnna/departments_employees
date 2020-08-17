@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4">Сотрудники</h1>
            <div class="col-sm-12">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>


            <div>
                <a href="{{ route('employees.create') }}" class="btn btn-success"><i class="fas fa-user-plus"></i></a>
            </div>
            <div>
                 <a href="{{ route('departments.index') }}" target="_blank" class="btn btn-info">отделы</a>
            </div>
            <div>
                <a href="{{ route('index') }}" class="btn btn-info">назад</a>
            </div>

            <table class="table table-striped" id="data_table">
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Отчество</th>
                    <th scope="col">Пол</th>
                    <th scope="col">Заработная плата</th>
                    <th scope="col">Отделы</th>
                    <th scope="col">Действия</th>
                    
                 </tr>

                </thead>
                <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->first_name}}</td>
                        <td>{{$employee->last_name}}</td>
                        <td>{{$employee->patronymic}}</td>
                        <td>{{$employee->sex}}</td>
                        <td>{{$employee->salary}}</td>
                        <td>{{$employee->departments()->pluck('department')->implode(', ')}}</td>

                        <td>
                            <a href="{{ route('employees.edit',$employee->id) }}" class="btn btn-primary"><i
                                    class="fas fa-user-edit"></i></a>
                        </td>
                        
                        <td>
                            <form action="{{ route('employees.destroy',$employee->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm ('Удалить?')" class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
      
    {{ $employees->links() }}  
@endsection
