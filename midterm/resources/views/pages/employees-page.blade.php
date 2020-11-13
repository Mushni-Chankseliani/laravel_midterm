@extends('layouts.main-layout')

@section('content')

<table class="table table-dark table-hover">
    <thead>
        <th>ID</th>
        <th>name</th>
        <th>lastname</th>
        <th>birthdate</th>
        <th>personal_id</th>
        <th>salary</th>
        <th>actions</th>
    </thead>
    <tbody>
        <form action="{{ route('employees.create') }}" method="post">
            @csrf
            <tr>
                <td>#</td>
                <td><input type="text" name="name" value="{{ request()->name }}" class="form-control"></td>
                <td><input type="text" name="lastname" value="{{ request()->lastname }}" class="form-control"></td>
                <td><input type="date" name="birthdate" value="{{ request()->birthdate }}" class="form-control"></td>
                <td><input type="number" name="personal_id" value="{{ request()->personal_id }}" class="form-control"></td>
                <td><input type="number" name="salary" value="{{ request()->salary }}" class="form-control"></td>
                <td><button type="submit" class="btn btn-success w-100">add</button></td>
            </tr>
        </form>

        <?php foreach ($employees as $employee): ?>
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->lastname }}</td>
                <td>{{ $employee->birthdate }}</td>
                <td>{{ $employee->personal_id }}</td>
                <td>{{ $employee->salary }}</td>
                <td class="d-flex">
                    {{-- <a class="btn btn-primary mr-2">edit</a> --}}
                    <a href="{{ route('employees.edit', ['id' => $employee->id]) }}" class="btn btn-primary mr-2">edit</a>

                    <form action="{{ route('employees.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $employee->id }}">
          
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    
@endsection