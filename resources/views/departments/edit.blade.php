@extends('layout')
@section('content')
    <h2><strong>{{ $department->name . ' bearbeiten'}}</strong></h2>
    <a class="btn btn-primary" href="{{ route('departments.index') }}">Zurück</a>
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
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <strong for="name">Name</strong>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                   value="{{ $department->name }}">
        </div>
        <div class="form-group">
            <strong for="name">Gebühren in €</strong>
            <input type="text" class="form-control" id="fee" placeholder="Gebühren" name="fee"
                   value="{{ $department->fee }}">
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Speichern</button>
    </form>
@endsection
