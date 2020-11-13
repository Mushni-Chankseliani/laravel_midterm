@extends('layouts.main-layout')

@section('content')

<table class="table table-dark table-hover">
    <thead>
        <th>ID</th>
        <th>name</th>
        <th>code</th>
        <th>address</th>
        <th>city</th>
        <th>country</th>
        <th>actions</th>
    </thead>
    <tbody>
        <form action="{{ route('companies.create') }}" method="post">
            @csrf
            <tr>
                <td>#</td>
                <td><input type="text" name="name" value="{{ request()->name }}" class="form-control"></td>
                <td><input type="text" name="code" value="{{ request()->code }}" class="form-control"></td>
                <td><input type="text" name="address" value="{{ request()->address }}" class="form-control"></td>
                <td><input type="text" name="city" value="{{ request()->city }}" class="form-control"></td>
                <td><input type="text" name="country" value="{{ request()->country }}" class="form-control"></td>
                <td><button type="submit" class="btn btn-success w-100">add</button></td>
            </tr>
        </form>

        <?php foreach ($companies as $company): ?>
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->code }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->city }}</td>
                <td>{{ $company->country }}</td>
                <td class="d-flex">
                    <a href="{{ route('companies.edit', ['id' => $company->id]) }}" class="btn btn-primary mr-2">edit</a>

                    <form action="{{ route('companies.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $company->id }}">
          
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    
@endsection