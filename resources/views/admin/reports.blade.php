@extends('layout.tourist_master')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('title', 'Admin | Reports')

@section('content')
    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box table-opp-color-box">
                    <h4>All Reports</h4>
                    <br><br>
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
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Bar Chart
            var barChartCtx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(barChartCtx, {
                type: 'bar',
                data: {
                    labels: ['Tourists', 'Drivers', 'Plans'],
                    datasets: [{
                        label: 'Count',
                        data: [@json($tourists), @json($drivers),
                            @json($plans)
                        ], // Remove extra square bracket
                        backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)',
                            'rgba(74, 182, 182, 0.1)'
                        ],
                        borderColor: ['rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 1)',
                            'rgba(74, 182, 182, 1)'
                        ],
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
                    labels: ['Tourists', 'Drivers', 'Plans'],
                    datasets: [{
                        data: [@json($tourists), @json($drivers),
                            @json($plans)
                        ],
                        backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(74, 182, 182, 0.1)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: ['rgba(75, 192, 192, 1)', 'rgba(74, 182, 182, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                }
            });

        });
    </script>

@endsection
