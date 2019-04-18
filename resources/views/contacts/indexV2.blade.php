@extends('base')

@section('main')
    <div class="row p-5">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="col-sm-12">
            <form action="/search" method="post" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                           placeholder="Search users"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </span>
                </div>
                <div class="form-group">
                    <select name="items">
                        <option value="5" @if($items == 5) selected @endif >5</option>
                        <option value="10" @if($items == 10) selected @endif >10</option>
                        <option value="25" @if($items == 25) selected @endif >25</option>
                        <option value="50" @if($items == 50) selected @endif >50</option>
                        <option value="75" @if($items == 75) selected @endif >75</option>
                        <option value="100" @if($items == 100) selected @endif >100</option>
                    </select>
                </div>
            </form>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contacts</h5>
                    <table class="table table-striped table-responsive w-100 d-md-table">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            {{--                            <td>Birthday</td>--}}
                            {{--                            <td>Address</td>--}}
                            {{--                            <td>City</td>--}}
                            {{--                            <td>State</td>--}}
                            {{--                            <td>Zip</td>--}}
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
                                {{--                                <td>{{ date('m-d-Y', strtotime($contact->birthday)) }}</td>--}}
                                {{--                                <td>{{ $contact->address }}</td>--}}
                                {{--                                <td>{{ $contact->city }}</td>--}}
                                {{--                                <td>{{ $contact->state }}</td>--}}
                                {{--                                <td>{{ $contact->zip }}</td>--}}
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
                </div>
            </div>
            <div>
                <a href="{{ route('contacts.create')}}" class="btn btn-success m-3">New contact</a>
                <a href="{{ route('contacts.index')}}" class="btn btn-primary m-3">View contacts</a>
            </div>
        </div>
    </div>
@endsection