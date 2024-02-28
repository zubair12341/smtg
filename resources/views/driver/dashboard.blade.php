@extends('layout.tourist_master')
@section('title', 'Driver Dashboard')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
            <div class="db-info-list">
                <div class="dashboard-stat-icon bg-blue">
                    <i class="far fa-chart-bar"></i>
                </div>
                <div class="dashboard-stat-content">
                    <h4>Total Bookings</h4>
                    <h5>{{ $t_rides }}</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="db-info-list">
                <div class="dashboard-stat-icon bg-green">
                    <i class="far fa-chart-bar"></i>
                </div>
                <div class="dashboard-stat-content">
                    <h4>Total Accepted</h4>
                    <h5>{{ $numberOfAccept }}</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="db-info-list">
                <div class="dashboard-stat-icon bg-red">
                    <i class="far fa-chart-bar"></i>
                </div>
                <div class="dashboard-stat-content">
                    <h4>Total Rejected</h4>
                    <h5>{{ $numberOfReject }}</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="db-info-list">
                <div class="dashboard-stat-icon bg-dark text-white">
                    <i class="far fa-chart-bar"></i>
                </div>
                <div class="dashboard-stat-content">
                    <h4>Total Completed</h4>
                    <h5>{{ $numberOfComp }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="dashboard-box chart-box">
               <h4>Bar Chart</h4>
               <canvas id="barChart" style="height: 250px; width: 100%;"></canvas>
            </div>
        </div>
        <div class="col-lg-4 chart-box">
            <div class="dashboard-box">
               <h4>Search Engine</h4>
               <canvas id="pieChart" style="height: 250px; width: 100%;"></canvas>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Trips Request</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tourist Name</th>
                                <th>Destination</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($trips != null && count($trips) > 0)
                            @foreach ($trips as $singleTrip)
                                <tr>
                                    <td>{{ \App\Models\User::where(['id' => $singleTrip->user_id])->value('name') }}</td>
                                    <td>{{ $singleTrip->destination }}</td>
                                    <td>{{ $singleTrip->start_date }}</td>
                                    <td>{{ $singleTrip->end_date }}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="View" href="{{ route('view_trip', ['id'=>$singleTrip->id]) }}" class="btn btn-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Reject" href="{{ route('reject.request', ['id'=>$singleTrip->id]) }}" class="btn btn-danger btn-sm text-white"><i class="fas fa-ban"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Accept" href="{{ route('except.request', ['id'=>$singleTrip->id]) }}" class="btn btn-success btn-sm text-white"><i class="fas fa-check"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                        <td><p>No Request avaiallable</p></td>
                        </tr>
                        <!-- Handle case when $trips is empty or null -->
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Accepted Trip Request</h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tourist Name</th>
                                <th>Destination</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($accepted_trips != null && count($accepted_trips) > 0)
                            @foreach ($accepted_trips as $singleTrip)
                                <tr>
                                    <td>{{ \App\Models\User::where(['id' => $singleTrip->user_id])->value('name') }}</td>
                                    <td>{{ $singleTrip->destination }}</td>
                                    <td>{{ $singleTrip->start_date }}</td>
                                    <td>{{ $singleTrip->end_date }}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="View" href="{{ route('view_trip', ['id'=>$singleTrip->id]) }}" class="btn btn-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                        <td><p>No accepted Trips avaiallable</p></td>
                        </tr>
                        <!-- Handle case when $trips is empty or null -->
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Completed Trips</h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tourist Name</th>
                                <th>Destination</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($comp_trips != null && count($comp_trips) > 0)
                            @foreach ($comp_trips as $singleTrip)
                                <tr>
                                    <td>{{ \App\Models\User::where(['id' => $singleTrip->user_id])->value('name') }}</td>
                                    <td>{{ $singleTrip->destination }}</td>
                                    <td>{{ $singleTrip->start_date }}</td>
                                    <td>{{ $singleTrip->end_date }}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="View" href="{{ route('view_trip', ['id'=>$singleTrip->id]) }}" class="btn btn-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                        <td><p>No Completed Trips avaiallable</p></td>
                        </tr>
                        <!-- Handle case when $trips is empty or null -->
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Rejected Request</h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tourist Name</th>
                                <th>Destination</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($rejected_trips != null && count($rejected_trips) > 0)
                            @foreach ($rejected_trips as $singleTrip)
                                <tr>
                                    <td>{{ \App\Models\User::where(['id' => $singleTrip->user_id])->value('name') }}</td>
                                    <td>{{ $singleTrip->destination }}</td>
                                    <td>{{ $singleTrip->start_date }}</td>
                                    <td>{{ $singleTrip->end_date }}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="View" href="{{ route('view_trip', ['id'=>$singleTrip->id]) }}" class="btn btn-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                        <td><p>No accepted Trips avaiallable</p></td>
                        </tr>
                        <!-- Handle case when $trips is empty or null -->
                        @endif
                        </tbody>
                    </table>
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

   



</div>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Bar Chart
var barChartCtx = document.getElementById('barChart').getContext('2d');
var barChart = new Chart(barChartCtx, {
    type: 'bar',
    data: {
        labels: ['Accepted', 'Rejected', 'Pending'],
        datasets: [{
            label: 'Count',
            data: [@json($numberOfAccept), @json($numberOfReject), @json($numberOfReq)], // Remove extra square bracket
            backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(74, 182, 182, 0.1)'],
            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 1)', 'rgba(74, 182, 182, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Pie Chart
var pieChartCtx = document.getElementById('pieChart').getContext('2d');
var pieChart = new Chart(pieChartCtx, {
    type: 'pie',
    data: {
        labels: ['Accepted', 'Rejected', 'Pending'],
        datasets: [{
            data: [@json($numberOfAccept), @json($numberOfReject), @json($numberOfReq)],
            backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(74, 182, 182, 0.1)', 'rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(74, 182, 182, 1)', 'rgba(255, 99, 132, 1)'],
            borderWidth: 1
        }]
    }
});

    });
</script>
