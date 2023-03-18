@extends('layout')
@section('content')
    <h2><strong>Neues Training</strong></h2>
    <a class="btn btn-primary" href="{{ route('trainings.index') }}">Zurück</a>
    <br/>
    <br/>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Es gab ein Problem mit Ihrer Eingabe.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('trainings.store') }}" method="POST" role="form">
        @csrf
        <div class="form-group">
            <strong for="date">Datum</strong>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <strong for="member_id">Mitglied</strong>
            <select class="form-control" id="member_id" name="member_id">
                @foreach(\App\Models\Member::all() as $member)
                    <option id="{{$member->id}}"
                            value={{$member->id}}>{{$member->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <strong for="department_id">Abteilung</strong>
            <select class="form-control" id="department_id" name="department_id">
                @foreach(\App\Models\Department::all() as $department)
                    <option id="{{$department->id}}" value={{$department->id}}>{{$department->name}}</option>
                @endforeach
            </select>
        </div>
        <br/>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Speichern</button>
        </div>
    </form>
@endsection
