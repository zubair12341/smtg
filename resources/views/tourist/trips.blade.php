@extends('layout.tourist_master')
@section('title', 'My Trips')
@section('content')
    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box table-opp-color-box">
                    <h4>My Trips</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Destination</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status By Driver</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trips as $trip)
                                    <tr>
                                        <td>{{ $trip->destination }}</td>
                                        <td>{{ $trip->start_date }}</td>
                                        <td>{{ $trip->end_date }}</td>
                                        <td>{{ $trip->status_by_driver }}
                                            @if ($trip->status_by_driver == 'rejected')
                                                <p style="color: red;font-size:12px" class="text_danger">Your driver has
                                                    reject the offer. <br> kindly go to edit and choose another driver</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a data-toggle="tooltip" data-placement="top" title="View" href="{{ route('view_trip', ['id' => $trip->id]) }}"
                                                class="btn btn-secondary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                            @if ($trip->status_by_driver != 'complete')
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('edit_trip', ['id' => $trip->id]) }}"
                                                    class="btn btn-primary btn-sm text-white"><i
                                                        class="fas fa-edit"></i></a>
                                            @endif
                                            <a data-toggle="tooltip" data-placement="top" title="Delete" href="#0" class="btn btn-danger btn-sm text-white delete_trip1"
                                                data-id="{{ $trip->id }}"
                                                data-url="{{ route('delete_trip', ['id' => $trip->id]) }}"><i
                                                    class="fas fa-trash"></i></a>

                                            <a data-toggle="tooltip" data-placement="top" title="Complain against driver" href="{{ route('complain.page', $trip->id) }}"
                                                class="btn btn-warning btn-sm text-white"><i
                                                    class="fas fa-comments"></i></a>
                                            @php

                                                $end_date = Carbon\Carbon::parse($trip->end_date);
                                                $current_date = Carbon\Carbon::now();

                                            @endphp
                                            @if ($trip->status_by_driver != 'complete')
                                                @if ($end_date->lessThan($current_date))
                                                    <a data-toggle="tooltip" data-placement="top" title="Trip Complete" href="{{ route('trip.completed', $trip->id) }}"
                                                        class="btn btn-dark btn-sm text-white"><i
                                                            class="fas fa-check"></i></a>
                                                @endif
                                            @endif

                                            @if ($trip->status_by_driver == 'complete')
                                            <a data-toggle="tooltip" data-placement="top" title="Review about trip" href="{{ route('trip.rating', $trip->id) }}"
                                                class="btn btn-success btn-sm text-white"><i
                                                    class="fas fa-star"></i></a>
                                            @endif
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if (session('error'))
            swal({
                title: "Error",
                text: "{{ session('error') }}",
                icon: "error",
                button: "OK",
            });
        @endif
        @if (session('success'))
            swal({
                title: "Success",
                text: "{{ session('success') }}",
                icon: "success",
                button: "OK",
            });
        @endif
    </script>

@endsection
@push('scripts')
    <script>
        let trip_id = null
        $(document).on('click', '.delete_trip1', function() {
            trip_id = $(this).data('id');
            let text = "Do you really want to delete this trip";
            if (confirm(text) == true) {
                console.log($(this).data('url'));
                window.location = $(this).data('url')
            }
        });
    </script>
@endpush
