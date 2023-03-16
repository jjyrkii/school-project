@extends('trainings.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Member Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('trainings.create', null) }}"> Create New training</a>
            </div>
        </div>
    </div>
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
        </tr>
        @foreach ($trainings as $training)
            <div >{{$department = \App\Models\Department::find($training->department_id)}}</div>
            <tr>
                <td>{{ $training->date }}</td>
                <td>{{ sprintf('%s, %s', $training->name, $training->first_name) }}</td>
                <td>{{ $department->name }}</td>
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
