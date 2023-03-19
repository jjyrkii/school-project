@extends('layout')
@section('content')
    <div class="text-center">
        <h1><strong>Willkommen in der Mitgliederverwaltung</strong></h1>
        <h1><strong>von: "der glühende Colt"</strong></h1>
    </div>
    <br/>
    <div class="row">
        <div class="col">
            <div class="card">
                <h4 class="text-center"><strong>Neuste Trainings</strong></h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Datum</th>
                        <th>Mitglied</th>
                        <th>Abteilung</th>
                    </tr>
                    @foreach(\App\Models\Training::orderBy('date', 'DESC')->paginate(5) as $training)
                        <tr>
                            <td>{{ $training->date }}</td>
                            <td>{{ \App\Models\Member::find($training->member_id)->fullName() }}</td>
                            <td>{{ \App\Models\Department::find($training->department_id)->name }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h4 class="text-center"><strong>Geburtstagskinder</strong></h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Mitgliedsnummer</th>
                    </tr>
                    @foreach(\App\Models\Member::all() as $member)
                        @if($member->hasBirthday())
                            <tr>
                                <td>{{ $member->fullName() }}</td>
                                <td>{{ $member->membership_id}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <br/>
@endsection
