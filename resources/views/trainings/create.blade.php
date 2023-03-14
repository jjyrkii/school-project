@extends('trainings.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Training</h2>
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
    <form action="{{ route('trainings.store') }}" method="POST" role="form">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="date">Datum</strong>
                    <input type="date" class="form-control" id="date" name="date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="member_id">Datum</strong>
                    <select class="form-control" id="member_id" name="member_id">
                        @foreach(\App\Models\Member::all() as $member)
                            <option id="{{$member->id}}">{{$member->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong for="department_id">Datum</strong>
                    <select class="form-control" id="department_id" name="department_id">
                        @foreach(\App\Models\Department::all() as $department)
                            <option id="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br/>
            <br/>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
@endsection
