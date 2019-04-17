@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-5">Update Contact</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('contacts.update', $contact->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $contact->first_name }}" required/>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $contact->last_name }}" required/>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $contact->email }}" required/>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}" />
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday:</label>
                    <input class="datepicker" id="datepicker" type="text" name="birthday" value="{{ date('Y-m-d', strtotime($contact->birthday)) }}" />
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" name="address" value="{{ $contact->address }}" />
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" name="city" value="{{ $contact->city }}" />
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" class="form-control" name="state" value="{{ $contact->state }}" />
                </div>
                <div class="form-group">
                    <label for="zip">Zip:</label>
                    <input type="text" class="form-control" name="zip" value="{{ $contact->zip }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript">
        $( "#datepicker" ).datepicker({
            minDate: new Date(1900,0,0),
            maxDate: new Date(2019,0,0,),
            yearRange: '1900:2019',
            changeYear: true,
            changeMonth: true,
            changeDay: true,
            dateFormat: 'yy-mm-dd'
        });
    </script>
@endsection