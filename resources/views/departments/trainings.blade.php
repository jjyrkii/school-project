@extends('layout')
@section('content')
    <div class="row">
        <div class="col-10">
            <h2><strong>{{ $title }} Trainings</strong></h2>
        </div>
        <div class="col">
            <a class="btn btn-success" href="{{ route('trainings.create', null) }}">Training anlegen</a>
        </div>
    </div>
    <br/>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Datum</th>
            <th>Mitglied</th>
            <th>Abteilung</th>
            <th>Aktionen</th>
        </tr>
        @foreach ($trainings as $training)
            <tr>
                <td>{{ $training->date }}</td>
                <td>{{ \App\Models\Member::find($training->member_id)->name }}</td>
                <td>{{ \App\Models\Department::find($training->department_id)->name }}</td>
                <td>
                    <form action="{{ route('trainings.destroy', $training->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('trainings.show', $training->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('trainings.edit', $training->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $trainings->links() !!}
@endsection
