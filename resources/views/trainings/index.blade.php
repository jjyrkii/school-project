@extends('layout')
@section('content')
    <div class="row">
        <div class="col-10">
            <h2><strong>Alle Trainings</strong></h2>
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
                <td>{{ \App\Models\Member::find($training->member_id)->fullName() }}</td>
                <td>{{ \App\Models\Department::find($training->department_id)->name }}</td>
                <td>
                    <form action="{{ route('trainings.destroy', $training->id) }}" method="POST">
                        <a class="btn btn-dark" href="{{ route('trainings.show', $training->id) }}">Anzeigen</a>
                        <a class="btn btn-dark" href="{{ route('trainings.edit', $training->id) }}">Bearbeiten</a>
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
                                        <span>Das Training wird unwiderruflich gelöscht!</span>
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
    {!! $trainings->links() !!}
@endsection
