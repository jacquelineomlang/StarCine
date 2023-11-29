@extends('layouts.user_app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
 
            <div class="card mt-2" style="background-color: lightblue; color: black;">
                <div class="card-header">{{ __('Select Your Chosen Movie and Book Now!') }}</div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="width: 25%">Movie</th>
                        <th scope="col" style="width: 15%">Genre</th>
                        <th scope="col" style="width: 15%">Description</th>
                        <th scope="col" style="width: 15%">Price</th>
                        <th scope="col" style="width: 15%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->genre }}</td>
                            <td>{{ $movie->description }}</td>
                            <td>{{ $movie->price }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookingModal{{ $movie->id }}">
                                    Create Booking
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
    </div>
</div>

@foreach ($movies as $movie)
    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal{{ $movie->id }}" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel{{ $movie->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel{{ $movie->id }}">MOVIE TITLE: {{ $movie->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <!-- Place your booking form or additional information here -->
                <h2>Available Room</h2>

                <div class="row">
                <h4 class="col-4 ">Date </h4>
                <h4 class="col-4 ">Time </h4>
                <h4 class="col-4 ">Action </h4>
                </div>
                @foreach ($schedules as $schedule)
                    @if($movie->id == $schedule->movie_id)
                    

                    <div class="row">
                    <h4 class="col-4 ">{{ $schedule->date }} </h4>
                    <h4 class="col-4 ">{{ $schedule->time }} </h4>
                    <h4 class="col-4 ">
                        <a href="{{ route('bookings.create', ['id' => $schedule->id]) }}" class="btn btn-primary">Create Booking</a></h4>
                    </div>


                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>


    <!-- End of Booking Modal -->
@endforeach


<div class="container mt-5">
                <h1>Bookings</h1>
        
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Movie Title</th>
                                <th>Genre</th>
                                <th>Room</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->title }}</td>
                                    <td>{{ $booking->genre }}</td>
                                    <td>{{ $booking->room }}</td>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ $booking->time }}</td>
                                    <td>{{ $booking->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
            
            </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.modal').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });
    });
</script>
@endsection
