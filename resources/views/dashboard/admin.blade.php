<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-6 m-4 text-gray-900 justify-center">
                    {{-- {{ __("You're logged in as Admin!") }} --}}
                    <div class="col-xl-3 col-md-3 mr-4 sm:rounded-lg">
                        <div class="card bg-primary text-white mb-4 l">
                            <div class="card-body text-sm">Total User 
                                <h2 class="text-6xl">{{$users}}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 ml-4">
                        <div class="card bg-purple-500 text-white mb-4">
                            <div class="card-body text-sm">Total Event
                                <h2 class="text-6xl">{{$event}}</h2>
                            </div>
                            <div class=" card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link text-end" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 ml-4">
                        <div class="card  bg-orange-500 text-white mb-4">
                            <div class="card-body text-sm">Total Resources
                                <h2 class="text-6xl">{{$resources}}</h2>
                            </div>
                            <div class=" card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class=" fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row p-6 text-gray-900">                   
                    <div class="p-6 col-xl-6 ">
                        <!-- Bar Chart -->
                        <canvas id="userChart" width="500" height="400"></canvas>
                    </div>

                    <div class="col-xl-6 ml-4">
                        <!-- FullCalendar -->
                        <div id="calendar" style="width: 600px; height: 600px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample data for the chart
        var userData = @json($userChartData);

        // Get the canvas element
        var userChartCanvas = document.getElementById('userChart').getContext('2d');

        // Create the chart
        var userChart = new Chart(userChartCanvas, {
            type: 'bar',
            data: {
                labels: userData.labels,
                datasets: [{
                    label: 'User Data Analytics',
                    data: userData.data,
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 255, 0, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 255, 0, 1)'],
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

        // Initialize FullCalendar
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                // Configure FullCalendar options here
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                // Add events as needed
                events: [
                    // Your events data here
                    //  { title: 'Event 1', start: '2023-12-01' },
                    //  { title: 'Event 2', start: '2023-12-15' },
                ]
            });
        });
    </script>

</x-app-layout>