@extends('base')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4">Список отделов</h1>
            <div class="col-sm-12">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>


            <div>
                <a href="{{ route('departments.create') }}" class="btn btn-success"><i class="fas fa-user-plus"></i></a>
            </div>
            <div>
                 <a href="{{ route('employees.index') }}" class="btn btn-info">сотрудники</a>
            </div>
            <div>
                <a href="{{ route('index') }}" class="btn btn-info">назад</a>
            </div>

            <table class="table table-striped" id="data_table">
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">название отдела</th>
                    <th scope="col">количество сотрудников отдела</th>
                    <th scope="col">максимальная заработная плата</th>
                    <th scope="col">Действия</th>
                </tr>

                </thead>
                <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{$department->id}}</td>
                        <td>{{$department->department}}</td>
                        <td>{{$department->employees()->pluck('id')->count()}}</td>
                        <td>{{$department->employees()->pluck('salary')->max()}}</td>
                        <td>
                            <a href="{{ route('departments.edit',$department->id) }}" class="btn btn-primary"><i
                                    class="fas fa-user-edit"></i></a>
                        </td>
                        
                        <td>
                            <form action="{{ route('departments.destroy',$department->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                @if ($department->employees()->pluck('id')->count()==0)
                                <button onclick="return confirm('Удалить?') " class="btn btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    {{ $departments->links() }}
@endsection
