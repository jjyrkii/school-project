@extends('members.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Member</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('members.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3><b>Persönliche Informationen</b></h3>
    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="name">Name</strong>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                           value="{{ $member->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="first_name">Vorname</strong>
                    <input type="text" class="form-control" id="first_name" placeholder="Vorname" name="first_name"
                           value="{{ $member->first_name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="street">Straße</strong>
                    <input type="text" class="form-control" id="street" placeholder="Straße" name="street"
                           value="{{ $member->street }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="house_number">Hausnummer</strong>
                    <input type="text" class="form-control" id="house_number" placeholder="Hausnummer"
                           name="house_number" value="{{ $member->house_number }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="postal_code">PLZ</strong>
                    <input type="text" class="form-control" id="postal_code" placeholder="PLZ" name="postal_code"
                           value="{{ $member->postal_code }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="city">Ort</strong>
                    <input type="text" class="form-control" id="city" placeholder="Ort" name="city"
                           value="{{ $member->city }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="phone">Telefon</strong>
                    <input type="tel" class="form-control" id="phone" placeholder="Telefon" name="phone"
                           value="{{ $member->phone }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="email">E-Mail</strong>
                    <input type="email" class="form-control" id="email" placeholder="E-Mail" name="email"
                           value="{{ $member->email }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="birth_date">Geburtstag</strong>
                    <input type="date" class="form-control" id="birth_date" placeholder="Geburtstag" name="birth_date"
                           value="{{ $member->birth_date }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="join_date">Beitrittsdatum</strong>
                    <input type="date" class="form-control" id="join_date" placeholder="Beitrittsdatum"
                           name="join_date" value="{{ $member->join_date }}">
                </div>
                <br/>
            </div>
            <h3><b>Abteilungen</b></h3>
            @foreach(\App\Models\Department::all() as $department)
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-check">
                        <strong for="join_date">{{$department->name}}</strong>
                        <input
                            {{$member->hasDepartment($department) ? 'checked' : ''}} type="checkbox"
                            class="form-check-input" id="{{$department->id}}"
                            name="department_{{$department->name}}" value="">
                    </div>
                </div>
            @endforeach
        </div>
        <br/>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <br/>
    <br/>
    <h3><b>Trainings</b></h3>
    <table class="table table-bordered">
        <tr>
            <th>Datum</th>
            <th>Abteilung</th>
        </tr>
        @foreach($member->trainings() as $training)
            <tr id="{{ $training['id'] }}">
                <td>{{ $training['date'] }}</td>
                <td>{{ $training['department'] }}</td>
            </tr>
        @endforeach
    </table>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-primary" href="{{ route('trainings.create', $member) }}">Training eintragen</a>
    </div>
    <br/>
@endsection
