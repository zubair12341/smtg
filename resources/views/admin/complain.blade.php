@extends('layout.tourist_master')

@section('title', 'Admin | All Users Trips')

@section('content')
<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box table-opp-color-box">
                <h4>Complain by user for driver</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Driver</th>
                                <th>Messaage</th>
                                <th>Action</th>
                              
                          
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complain as $trip)
                            <tr>
                                <td>{{ \App\Models\User::where(['id' => $trip->user_id])->value('name') }}</td>

                                <td>{{ \App\Models\User::where(['id' => $trip->driver_id])->value('name') }}</td>
                                <td>{{$trip->message}}</td>
                                <td>
                                      <a data-toggle="tooltip" data-placement="top" @if(\App\Models\User::where(['id' => $trip->driver_id])->value('status')==0) title="Disable Driver"  @else title="Enable Driver" @endif  href="{{ route('admin.status', $trip->driver_id) }}" class="btn btn-danger">@if(\App\Models\User::where(['id' => $trip->driver_id])->value('status')==0) <i class="fas fa-ban text-white"></i>  @else <i class="fas fa-check text-white"></i>  @endif </a></td>
                            
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

