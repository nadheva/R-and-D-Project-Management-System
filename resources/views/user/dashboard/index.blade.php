<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-6 ms-auto mt-xl-0 ">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="card card-background card-background-mask-info" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                            <div class="card-body  text-center">
                                <h1 class="text-gradient text-dark"><span
                                        >{{$number_of_task}} </span> <span
                                        class="text-lg ms-n2"></span></h1>
                                <h6 class="mb-0 font-weight-bolder opacity-8 mb-0 text-sm"><span class="badge badge-lg d-block bg-gradient-warning mb-2 up">Number Of Task</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 ">
                        <div class="card card-background card-background-mask-warning" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                            <div class="card-body text-center">
                                <h1 class="text-gradient text-dark"> <span
                                        >{{$number_of_open_task}} </span> <span
                                        class="text-lg ms-n1"></span></h1>
                                <h6 class="mb-0 font-weight-bolder"><span class="badge badge-lg d-block bg-gradient-success mb-2 up">Number Of Open Task</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card card-background card-background-mask-success" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                            <div class="card-body text-center">
                                <h1 class="text-gradient text-dark"><span
                                        > {{$number_of_complete_task}}</span> <span
                                        class="text-lg ms-n2"></span></h1>
                                <h6 class="mb-0 font-weight-bolder"><span class="badge badge-lg d-block bg-gradient-info mb-2 up">Number Of Complete task</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 card ms-auto" >
                <div class="card-header pb-0 p-3">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Task</h6>
                        <button type="button"
                            class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Number of tasks by type">
                            <i class="fas fa-info"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-3 " height="900">
                    <div class="row pb-5" style="padding-bottom: 900px">
                        <div class="col-5 text-center">
                            <div class="chart">
                                <canvas id="chart-consumption" class="chart-canvas" height="197"></canvas>
                            </div>
                            <h4 class="font-weight-bold mt-n8">
                                <span>{{$task->count() + $rio->count()}}</span>
                                <span class="d-block text-body text-sm">Number of task <br> </span>
                            </h4>
                        </div>
                        <div class="col-7">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-0">
                                                    <span class="badge bg-gradient-primary me-3"> </span>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Loading Allocation</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">{{$task->count()}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-0">
                                                    <span class="badge bg-gradient-dark me-3"> </span>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Project RIO</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">{{$rio->count()}}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex pb-0 p-3">
                        <h6 class="my-auto">User Performance Dashboard</h6>
                    </div>
                    <div class="card-body p-3 mt-2">
                            <div class="tab-pane fade show position-relative active height-400 border-radius-lg"
                                id="cam1" role="tabpanel" aria-labelledby="cam1">
                                <div class="row mt-4">
                                    <div class="table-responsive">
                                        <table class="table table-flush" id="datatable-search">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>User</th>
                                                    <th>Number of open task</th>
                                                    <th>Number of complete task</th>
                                                    <th>Percentage of complete task on time this week</th>
                                                    <th>Percentage of complete task on time this month</th>
                                                    <th>Percentage of complete task on time this year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->where('role', '=', 'user') as $i)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $i->name }}</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $i->rio->where('status', '=', 'Open')->count() + $i->task->where('status', '=', 'Open')->count() }}</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $i->rio->where('status', '=', 'Done')->count() + $i->task->where('status', '=', 'Done')->count() }}</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                            @if($i->rio->where('due_date',  '>=', \Carbon\Carbon::now()->startOfWeek() && 'due_date',  '<=', \Carbon\Carbon::now()->endOfWeek())->count() + $i->task->where('start_date',  '>=', \Carbon\Carbon::now()->startOfWeek() && 'start_date',  '<=', \Carbon\Carbon::now()->endOfWeek())->count() !== 0)
                                                            <span class="text-secondary text-xs font-weight-bold">{{ (($i->rio->where('status', '=', 'Done')->where('due_date',  '>=', \Carbon\Carbon::now()->startOfWeek() && 'due_date',  '<=', \Carbon\Carbon::now()->endOfWeek())->count() + $i->task->where('status', '=', 'Done')->where('start_date',  '>=', \Carbon\Carbon::now()->startOfWeek() && 'start_date',  '<=', \Carbon\Carbon::now()->endOfWeek())->count())/($i->rio->where('due_date',  '>=', \Carbon\Carbon::now()->startOfWeek() && 'due_date',  '<=', \Carbon\Carbon::now()->endOfWeek())->count() + $i->task->where('start_date',  '>=', \Carbon\Carbon::now()->startOfWeek() && 'start_date',  '<=', \Carbon\Carbon::now()->endOfWeek())->count()))*100 }}%</span>
                                                            @else
                                                            <span class="text-secondary text-xs font-weight-bold">No Task This Week</span>
                                                            @endif
                                                          </td>
                                                          <td class="align-middle text-center">
                                                            @if($i->rio->where('due_date',  '>=', \Carbon\Carbon::now()->startOfMonth() && 'due_date',  '<=', \Carbon\Carbon::now()->endOfMonth())->count() + $i->task->where('start_date',  '>=', \Carbon\Carbon::now()->startOfMonth() && 'start_date',  '<=', \Carbon\Carbon::now()->endOfMonth())->count() !== 0)
                                                            <span class="text-secondary text-xs font-weight-bold">{{ (($i->rio->where('status', '=', 'Done')->where('due_date',  '>=', \Carbon\Carbon::now()->startOfMonth() && 'due_date',  '<=', \Carbon\Carbon::now()->endOfMonth())->count() + $i->task->where('status', '=', 'Done')->where('start_date',  '>=', \Carbon\Carbon::now()->startOfMonth() && 'start_date',  '<=', \Carbon\Carbon::now()->endOfMonth())->count())/($i->rio->where('due_date',  '>=', \Carbon\Carbon::now()->startOfMonth() && 'due_date',  '<=', \Carbon\Carbon::now()->endOfMonth())->count() + $i->task->where('start_date',  '>=', \Carbon\Carbon::now()->startOfMonth() && 'start_date',  '<=', \Carbon\Carbon::now()->endOfMonth())->count()))*100 }}%</span>
                                                            @else
                                                            <span class="text-secondary text-xs font-weight-bold">No Task This Month</span>
                                                            @endif
                                                          </td>
                                                          <td class="align-middle text-center">
                                                            @if($i->rio->where('due_date',  '>=', \Carbon\Carbon::now()->startOfYear() && 'due_date',  '<=', \Carbon\Carbon::now()->endOfYear())->count() + $i->task->where('start_date',  '>=', \Carbon\Carbon::now()->startOfYear() && 'start_date',  '<=', \Carbon\Carbon::now()->endOfYear())->count() !== 0)
                                                            <span class="text-secondary text-xs font-weight-bold">{{ (($i->rio->where('status', '=', 'Done')->where('due_date',  '>=', \Carbon\Carbon::now()->startOfYear() && 'due_date',  '<=', \Carbon\Carbon::now()->endOfYear())->count() + $i->task->where('status', '=', 'Done')->where('start_date',  '>=', \Carbon\Carbon::now()->startOfYear() && 'start_date',  '<=', \Carbon\Carbon::now()->endOfYear())->count())/($i->rio->where('due_date',  '>=', \Carbon\Carbon::now()->startOfYear() && 'due_date',  '<=', \Carbon\Carbon::now()->endOfYear())->count() + $i->task->where('start_date',  '>=', \Carbon\Carbon::now()->startOfYear() && 'start_date',  '<=', \Carbon\Carbon::now()->endOfYear())->count()))*100 }}%</span>
                                                            @else
                                                            <span class="text-secondary text-xs font-weight-bold">No Task This Year</span>
                                                            @endif
                                                          </td>
                                                          {{-- <td class="align-middle text-center">
                                                            @if(($division_month = $i->rio->whereMonth('due_date',  '=', \Carbon\Carbon::now()->month())->count() + $i->task->where('start_date',  '=', \Carbon\Carbon::now()->month())->count()) !== 0)
                                                            <span class="text-secondary text-xs font-weight-bold">
                                                                {{
                                                                (($i->rio->where('status', '=', 'Done')->where('due_date',  '=', \Carbon\Carbon::now()->month())->count() + $i->task->where('status', '=', 'Done')->where('start_date',  '=', \Carbon\Carbon::now()->month())->count())/($division_month))*100 }}%</span>
                                                            @else
                                                            <span class="text-secondary text-xs font-weight-bold">No Task This Month</span>
                                                            @endif
                                                          </td> --}}
                                                          {{-- <td class="align-middle text-center">
                                                            @if(($division_year = $i->rio->where('due_date',  '=', \Carbon\Carbon::now()->year())->count() + $i->task->where('start_date',  '=', \Carbon\Carbon::now()->year())->count()) == 0)
                                                            <span class="text-secondary text-xs font-weight-bold">No Task This Month</span>
                                                            @else
                                                            <span class="text-secondary text-xs font-weight-bold">
                                                                {{
                                                                (($i->rio->where('status', '=', 'Done')->where('due_date',  '=', \Carbon\Carbon::now()->year())->count() + $i->task->where('status', '=', 'Done')->where('start_date',  '=', \Carbon\Carbon::now()->year())->count())/($division_year))*100 }}%</span>
                                                            <span class="text-secondary text-xs font-weight-bold">No Task This Month</span>
                                                            @endif
                                                          </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                // Rounded slider
                const setValue = function(value, active) {
                    document.querySelectorAll("round-slider").forEach(function(el) {
                        if (el.value === undefined) return;
                        el.value = value;
                    });
                    const span = document.querySelector("#value");
                    span.innerHTML = value;
                    if (active)
                        span.style.color = 'red';
                    else
                        span.style.color = 'black';
                }

                document.querySelectorAll("round-slider").forEach(function(el) {
                    el.addEventListener('value-changed', function(ev) {
                        if (ev.detail.value !== undefined)
                            setValue(ev.detail.value, false);
                        else if (ev.detail.low !== undefined)
                            setLow(ev.detail.low, false);
                        else if (ev.detail.high !== undefined)
                            setHigh(ev.detail.high, false);
                    });

                    el.addEventListener('value-changing', function(ev) {
                        if (ev.detail.value !== undefined)
                            setValue(ev.detail.value, true);
                        else if (ev.detail.low !== undefined)
                            setLow(ev.detail.low, true);
                        else if (ev.detail.high !== undefined)
                            setHigh(ev.detail.high, true);
                    });
                });

                // Count To
                if (document.getElementById('status1')) {
                    const countUp = new CountUp('status1', document.getElementById("status1").getAttribute("countTo"));
                    if (!countUp.error) {
                        countUp.start();
                    } else {
                        console.error(countUp.error);
                    }
                }
                if (document.getElementById('status2')) {
                    const countUp = new CountUp('status2', document.getElementById("status2").getAttribute("countTo"));
                    if (!countUp.error) {
                        countUp.start();
                    } else {
                        console.error(countUp.error);
                    }
                }
                if (document.getElementById('status3')) {
                    const countUp = new CountUp('status3', document.getElementById("status3").getAttribute("countTo"));
                    if (!countUp.error) {
                        countUp.start();
                    } else {
                        console.error(countUp.error);
                    }
                }
                if (document.getElementById('status4')) {
                    const countUp = new CountUp('status4', document.getElementById("status4").getAttribute("countTo"));
                    if (!countUp.error) {
                        countUp.start();
                    } else {
                        console.error(countUp.error);
                    }
                }
                if (document.getElementById('status5')) {
                    const countUp = new CountUp('status5', document.getElementById("status5").getAttribute("countTo"));
                    if (!countUp.error) {
                        countUp.start();
                    } else {
                        console.error(countUp.error);
                    }
                }
                if (document.getElementById('status6')) {
                    const countUp = new CountUp('status6', document.getElementById("status6").getAttribute("countTo"));
                    if (!countUp.error) {
                        countUp.start();
                    } else {
                        console.error(countUp.error);
                    }
                }

                // Chart Doughnut Consumption by room
                var ctx1 = document.getElementById("chart-consumption").getContext("2d");

                var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

                gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
                gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

                new Chart(ctx1, {
                    type: "doughnut",
                    data: {
                        labels: ['Loading Allocation', 'Projecct RIO', ],
                        datasets: [{
                            label: "Loading Allocation and Project RIO",
                            weight: 9,
                            cutout: 90,
                            tension: 0.9,
                            pointRadius: 2,
                            borderWidth: 2,
                            backgroundColor: ['#FF0080', '#A8B8D8', ],
                            data: [{{ $task->count() }}, {{ $rio->count() }}, ],
                            fill: false
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                },
                                ticks: {
                                    display: false
                                }
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                },
                                ticks: {
                                    display: false,
                                }
                            },
                        },
                    },

                });
            </script>
            <script>
                const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
                    searchable: true,
                    fixedHeight: true
                });
                const dataTableSearch1 = new simpleDatatables.DataTable("#datatable-search1", {
                    searchable: true,
                    fixedHeight: true
                });
            </script>
        @endpush
</x-app-layout>
