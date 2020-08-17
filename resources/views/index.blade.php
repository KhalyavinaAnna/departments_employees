@extends('base')

@section('content')
<div>
    <a href="{{ route('employees.index') }}" class="btn btn-info">сотрудники</a>
</div>
<div>
    <a href="{{ route('departments.index') }}" class="btn btn-info">отделы</a>
</div>
<table class="table table-striped" id="data_table">
              
                <thead>
                <tr>
                <th>Сотрудники</th>
                    @foreach ($departments as $department)
                    <th>{{$department->department}}</th>
                  @endforeach  
                 </tr>
                
                </thead>
                <tbody>
                @foreach ($employees as $employee)
    <tr>
    <td>{{$employee->first_name}} {{$employee->last_name}}</td>
    @foreach ($departments as $department)
        <td>
            @if ($employee->departments->contains($department)) + @endif
        </td>
    @endforeach
    </tr>
@endforeach
               
                </tbody>
    
</table>
{{ $employees->links() }} 
@endsection
