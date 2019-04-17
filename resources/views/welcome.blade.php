@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="col-sm-12">
            <h1 class="display-5">Contacts</h1>
            <table class="table table-striped table-dark table-bordered table-responsive w-100 d-md-table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Birthday</td>
                    <td>Address</td>
                    <td>City</td>
                    <td>State</td>
                    <td>Zip</td>
                    <td colspan=3>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ date('m-d-Y', strtotime($contact->birthday)) }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->city }}</td>
                        <td>{{ $contact->state }}</td>
                        <td>{{ $contact->zip }}</td>
                        <td>
                            <a href="{{ route('contacts.show',$contact->id) }}" class="btn btn-warning">View</a>
                        </td>
                        <td>
                            <a href="{{ route('contacts.edit',$contact->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $contacts->links() !!}
            <div>
                <a href="{{ route('contacts.create')}}" class="btn btn-success m-3">New contact</a>
            </div>
        </div>
    </div>
@endsection