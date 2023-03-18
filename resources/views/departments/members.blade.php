@extends('layout')
@section('content')
    <div class="row">
        <div class="col-10">
            <h2><strong>{{ $title }} Mitglieder</strong></h2>
        </div>
        <div class="col">
            <a class="btn btn-success" href="{{ route('members.create') }}">Neues Mitglied</a>
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
            <th>Mitgliedsnummer</th>
            <th>Name</th>
            <th>Abteilungen</th>
            <th>Absolvierte Trainings</th>
            <th>Aktionen</th>
        </tr>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->membership_id }}</td>
                <td>{{ $member->fullName() }}</td>
                <td>
                    @foreach($member->departments()->get() as $department)
                        <span>{{ $department->name }}</span>
                    @endforeach
                </td>
                <td>{{ count($member->trainings()) }}</td>
                <td>
                    <form action="{{ route('members.destroy',$member->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('members.show',$member->id) }}">Anzeigen</a>
                        <a class="btn btn-primary" href="{{ route('members.edit',$member->id) }}">Bearbeiten</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Löschen</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $members->links() !!}
@endsection
