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
            <div id="gmap" style="height: 50%; width: 100%;"></div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ ucfirst($contact->first_name) }} {{ ucfirst($contact->last_name) }}</h5>
                    <table class="table table-striped table-responsive w-100 d-md-table">
                        <tr>
                            <td>ID:</td>
                            <td>{{ $contact->id }}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <td>Birthday:</td>
                            <td>{{ $contact->birthday }}</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>{{ $contact->address }}</td>
                        </tr>
                        <tr>
                            <td>City:</td>
                            <td>{{ $contact->city }}</td>
                        </tr>
                        <tr>
                            <td>State:</td>
                            <td>{{ $contact->state }}</td>
                        </tr>
                        <tr>
                            <td>Zip Code:</td>
                            <td>{{ $contact->zip }}</td>
                        </tr>
                    </table>
                    <p class="card-text"><small class="text-muted">Last updated {{ $contact->updated_at }}</small></p>
                </div>
            </div>
            <div>
                <a href="{{ route('contacts.create')}}" class="btn btn-success m-3">New contact</a>
                <a href="{{ route('contacts.index')}}" class="btn btn-primary m-3">View contacts</a>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        var geocoder;
        var map;
        var address = "{{ $contact->address }}, {{ $contact->city }}, {{ $contact->state }}, {{ $contact->zip }}";
        function initMap() {
            var map = new google.maps.Map(document.getElementById('gmap'), {
                zoom: 8
            });
            geocoder = new google.maps.Geocoder();
            codeAddress(geocoder, map);
        }

        function codeAddress(geocoder, map) {
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    //alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GMAPS_API_KEY') }}&callback=initMap">
    </script>
@endsection