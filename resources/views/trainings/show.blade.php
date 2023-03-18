@extends('layout')
@section('content')
    <h2><strong>Training ansehen</strong></h2>
    <a class="btn btn-primary" href="{{ route('trainings.index') }}">Zurück</a>
    <br/>
    <br/>
    <strong>Datum</strong>
    <p>{{ DateTime::createFromFormat('Y-m-d', $training->date)->format('d. m. Y') }}</p>
    <strong>Mitglied</strong>
    @foreach(\App\Models\Member::all() as $member)
        @if($training->member_id === $member->id)
            <p>{{$member->name}}</p>
        @endif
    @endforeach
    <strong>Abteilung</strong>
    @foreach(\App\Models\Department::all() as $department)
        @if($training->department_id === $department->id)
            <p>{{$department->name}}</p>
        @endif
    @endforeach
@endsection
