@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col l12 m12 s12">

            <div class="card grey darken-3">
                <div class="card-content">
                    <h3>Dashboard</h3>
                </div>
                @if(request()->user()->role->name == "User")
                <div class="card-content">

                    <h5>My Bookings</h5>


                        <table class="responsive-table centered highlight">
                            <thead>
                            <tr>
                                <th>Turf Name</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Money</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Model\Booking::with(['turf'])->where('user_id', request()->user()->id)->latest()->get() as $row)
                                <tr>
                                    <td><a href="{{ route('permalink', $row->turf->id) }}">{{ $row->turf->name }}</a></td>
                                    <td>{{ \Carbon\Carbon::parse($row->date)->setTime($row->from,0)->toDayDateTimeString() }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->date)->setTime($row->from + $row->hours,0)->toDayDateTimeString() }}</td>
                                    <td>₹{{ $row->amount }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                </div>
                @endif

                @if(request()->user()->role->name == "Owner")
                    <div class="card-content">

                        <a href="/home/turf" class="right btn blue"> Add New Turf</a>
                        <h5> My Turfs </h5>

                        <table class="responsive-table centered">
                            <thead>
                            <tr>
                                <th>Turf Name</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Money</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Model\Turf::where('user_id', request()->user()->id)->get() as $row)
                                <tr>
                                    <td><a href="{{ route('permalink', $row->id) }}">{{ $row->name }}</a></td>
                                    <td>{{ $row->address }}</td>
                                    <td>{{ $row->type }}</td>
                                    <td>₹{{ $row->price }}</td>
                                    <td>
                                        <ul>
                                            <li><a href="/home/turf/{{ $row->id }}/bookings">Bookings</a></li>
                                            <li><a class="pointer" onclick="deleteRow('{{route('ajax-turf-id-delete', $row->id)}}')">Delete</a></li>
                                        </ul>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if(request()->user()->role->name == "Administrator")
                    <div class="card-content">

                        <h5>Unverified Users</h5>
                        @if(!\App\User::where('verified', 0)->exists())
                            No Records :)
                        <table class="responsive-table centered">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\User::where('verified', 0)->get() as $row)
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>
                                        <ul>
                                            <li><a class="pointer" onclick="verifyUser('{{route('ajax-user-id-verify', $row->id)}}')">Verify</a></li>
                                        </ul>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>

                        </table>
                        @endif

                    </div>
@endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function deleteRow(url) {
            if (confirm('Are you sure?')) {
                window.axios.get(url)
                    .then((x) => window.location.reload())
            }
        }

        function verifyUser(url) {
            if (confirm('Are you sure?')) {
                window.axios.get(url)
                    .then((x) => window.location.reload())
            }
        }
    </script>
@endsection

