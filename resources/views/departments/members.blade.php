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
                        <a class="btn btn-dark" href="{{ route('members.show',$member->id) }}">Anzeigen</a>
                        <a class="btn btn-dark" href="{{ route('members.edit',$member->id) }}">Bearbeiten</a>
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Löschen</button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Löschen bestätigen</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <span>Sind Sie sicher?</span>
                                        <br/>
                                        <span>Das Mitglied wird unwiderruflich gelöscht!</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                                        <button type="submit" class="btn btn-danger">Löschen</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $members->links() !!}
@endsection
