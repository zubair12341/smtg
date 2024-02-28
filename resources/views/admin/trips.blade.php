@extends('layout.tourist_master')

@section('title', 'Admin | All Users Trips')

@section('content')
<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box table-opp-color-box">
                <h4>Users Trips</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Destination</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trips as $trip)
                            <tr>
                                <td>{{ \App\Models\User::where(['id' => $trip->user_id])->value('name') }}</td>

                                <td>{{$trip->destination}}</td>
                                <td>{{$trip->start_date}}</td>
                                <td>{{$trip->end_date}}</td>
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title="View Trip" href="{{ route('admin.view_trip', ['id'=>$trip->id]) }}" class="btn btn-primary btn-sm text-white"><i class="fas fa-eye"></i></a>

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

@endsection
@push('scripts')
<script>
    let trip_id = null
    $(document).on('click','.delete_trip1',function(){
        trip_id = $(this).data('id');
        let text = "Do you really want to delete this trip";
        if (confirm(text) == true) {
            console.log($(this).data('url'));
            window.location=$(this).data('url')
        }
    });
</script>
@endpush
