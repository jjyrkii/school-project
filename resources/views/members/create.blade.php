@extends('layout')
@section('content')
    <h2><strong>Neues Mitglied</strong></h2>
    <a class="btn btn-primary" href="{{ route('members.index') }}"> Back</a>
    <br/>
    <br/>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Fehler!</strong> Es gab ein Problem mit Ihrer Eingabe.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3><b>Persönliche Informationen</b></h3>
    <form action="{{ route('members.store') }}" method="POST" role="form">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <strong>Mitgliedsnummer</strong>
                    <input class="form-control" type="text" id="membership_id" name="membership_id" placeholder="Mitgliedsnummer">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Vorname</strong>
                    <input type="text" class="form-control" id="first_name" placeholder="Vorname" name="first_name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Straße</strong>
                    <input type="text" class="form-control" id="street" placeholder="Straße" name="street">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Hausnummer</strong>
                    <input type="text" class="form-control" id="house_number" placeholder="Hausnummer"
                           name="house_number">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>PLZ</strong>
                    <input type="text" class="form-control" id="postal_code" placeholder="PLZ" name="postal_code">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Ort</strong>
                    <input type="text" class="form-control" id="city" placeholder="Ort" name="city">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Telefon</strong>
                    <input type="tel" class="form-control" id="phone" placeholder="Telefon" name="phone">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>E-Mail</strong>
                    <input type="email" class="form-control" id="email" placeholder="E-Mail" name="email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Geburtstag</strong>
                    <input type="date" class="form-control" id="birth_date" placeholder="Geburtstag" name="birth_date">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Beitrittsdatum</strong>
                    <input type="date" class="form-control" id="join_date" placeholder="Beitrittsdatum"
                           name="join_date">
                </div>
            </div>
        </div>
        <br/>
        <h3><b>Abteilungen</b></h3>
        @foreach(\App\Models\Department::all() as $department)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-check">
                    <strong>{{$department->name}}</strong>
                    <input
                        type="checkbox"
                        class="form-check-input" id="{{$department->id}}"
                        name="department_{{$department->name}}" value="{{$department->id}}">
                </div>
            </div>
        @endforeach
        <br/>
        <div class="col text-center">
            <button type="submit" class="btn btn-primary">Speichern</button>
        </div>
    </form>
@endsection
