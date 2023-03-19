@extends('layout')
@section('content')
    <h2><strong>Abteilungen</strong></h2>
    <br/>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Gebühren in €</th>
            <th>Mitglieder</th>
            <th>Aktionen</th>
        </tr>
        @foreach ($departments as $department)
            <tr>
                <td>{{ $department->name }}</td>
                <td>{{ $department->fee }}</td>
                <td>{{ $department->members->count() }}</td>
                <td>
                    <a class="btn btn-dark"
                       href="{{ route('departments.edit', $department) }}">Bearbeiten</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
