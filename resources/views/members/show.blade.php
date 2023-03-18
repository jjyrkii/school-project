@extends('layout')
@section('content')
    <h2><strong>{{ $member->first_name . ' ' . $member->name }}</strong></h2>
    <a class="btn btn-primary" href="{{ route('members.index') }}"> Back</a>
    <br/>
    @if($member->hasBirthday())
        <div class="alert alert-warning">
            <p>Hurra! Ein Geburtstagskind!</p>
        </div>
    @endif
    <br/>
    <h3><b>Persönliche Informationen</b></h3>
    <div class="row">
        <div class="col">
            <strong for="name">Name</strong>
            <p>{{ $member->name }}</p>
        </div>
        <div class="col">
            <strong for="first_name">Vorname</strong>
            <p>{{ $member->first_name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong for="street">Straße</strong>
            <p>{{ $member->street }}</p>
        </div>
        <div class="col">
            <strong for="house_number">Hausnummer</strong>
            <p>{{ $member->house_number }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong for="postal_code">PLZ</strong>
            <p>{{ $member->postal_code }}</p>
        </div>
        <div class="col">
            <strong for="city">Ort</strong>
            <p>{{ $member->city }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong for="phone">Telefon</strong>
            <p>{{ $member->phone }}</p>
        </div>
        <div class="col">
            <strong for="email">E-Mail</strong>
            <p>{{ $member->email }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong for="birth_date">Geburtstag</strong>
            <p>{{ DateTime::createFromFormat('Y-m-d', $member->birth_date)->format('d. m. Y') }}</p>
        </div>
        <div class="col">
            <strong for="join_date">Beitrittsdatum</strong>
            <p>{{ DateTime::createFromFormat('Y-m-d', $member->join_date)->format('d. m. Y') }}</p>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col">
            <h3><b>Abteilungen</b></h3>
            <ul>
                @foreach($member->departments()->get() as $department)
                    <li>{{ $department->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col">
            <h3><b>Gesamte Gebühren</b></h3>
            <strong>{{ $member->getTotalFee() }} €</strong>
        </div>
    </div>
    <br/>
    <div class="row">
        <h3><b>Trainings</b></h3>
        <table class="table table-bordered">
            <tr>
                <th>Datum</th>
                <th>Abteilung</th>
            </tr>
            @foreach($member->trainings() as $training)
                <tr id="{{ $training->id }}">
                    <td>{{ $training->date }}</td>
                    <td>{{ \App\Models\Department::find($training->department_id)->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
