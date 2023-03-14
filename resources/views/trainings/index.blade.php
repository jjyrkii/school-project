@extends('members.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Member Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('members.create') }}"> Create New Member</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Anschrift</th>
            <th>Telefonnummer</th>
            <th>E-Mail</th>
            <th>Geburtstag</th>
            <th>Beitrittsdatum</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ sprintf('%s, %s', $member->name, $member->first_name) }}</td>
                <td>{{ sprintf('%s %s, %s %s', $member->street, $member->house_number, $member->postal_code, $member->city) }}</td>
                <td>{{ $member->phone }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->birth_date }}</td>
                <td>{{ $member->join_date }}</td>
                <td>
                    <form action="{{ route('members.destroy',$member->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('members.show',$member->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('members.edit',$member->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $members->links() !!}
@endsection
