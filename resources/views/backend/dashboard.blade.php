@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')


    {{-- 1 13 32 14 22 20 --}}
    {{-- @foreach ($data_actividades_diarias as $data_actividad_diaria)
        {{ $data_actividad_diaria }}
    @endforeach --}}




    <!-- Body: Body -->
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <div class="row clearfix g-3">
                <div class="col-xl-8 col-lg-12 col-md-12 flex-column">
                    <div class="row g-3">


                        <div class="row g-3 mb-3 row-deck">

                            <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">

                                <div class="card ">

                                    <div class="card-body">

                                        <div class="d-flex align-items-center">
                                            <div class="avatar lg  rounded-1 no-thumbnail bg-lightyellow color-defult"><i
                                                    class="bi bi-journal-check fs-4"></i></div>
                                            <div class="flex-fill ms-4">
                                                <div class="">
                                                    SEMANA PASADA
                                                </div>
                                                <h5 class="mb-0 ">{{ $numero_tickets_anterior }}</h5>
                                            </div>
                                            <a href="#" title="view-members"
                                                class="btn btn-link text-decoration-none  rounded-1"><i
                                                    class="icofont-hand-drawn-right fs-2 "></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar lg  rounded-1 no-thumbnail bg-lightblue color-defult"><i
                                                    class="bi bi-list-check fs-4"></i></div>
                                            <div class="flex-fill ms-4">
                                                <div class="">
                                                    SEMANA ACTUAL
                                                </div>
                                                <h5 class="mb-0 ">{{ $numero_tickets_actual }}</h5>
                                            </div>
                                            <a href="#" title="space-used"
                                                class="btn btn-link text-decoration-none  rounded-1"><i
                                                    class="icofont-hand-drawn-right fs-2 "></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">

                                            @if ($numero_incremento_prod == 0)
                                                <div class="avatar lg  rounded-1 no-thumbnail bg-warning color-defult"><i
                                                        class="bi bi-clipboard-data fs-4"></i></div>
                                            @endif

                                            @if ($numero_incremento_prod < 0)
                                                <div class="avatar lg  rounded-1 no-thumbnail bg-danger color-red"><i
                                                        class="bi bi-clipboard-data fs-4"></i></div>
                                            @endif

                                            @if ($numero_incremento_prod > 0)
                                                <div class="avatar lg  rounded-1 no-thumbnail bg-success color-defult"><i
                                                        class="bi bi-clipboard-data fs-4"></i></div>
                                            @endif

                                            <div class="flex-fill ms-4">
                                                <h5 class="mb-0 ">

                                                    <div class="col mr-2">
                                                        @if ($numero_incremento_prod > 0)
                                                            <h5 class="mb-0 ">
                                                                INCREMENTO PRODUCCION</h5>
                                                        @endif

                                                        @if ($numero_incremento_prod < 0)
                                                            <h5 class="mb-0 ">
                                                                DECREMENTO PRODUCCION</h5>
                                                        @endif

                                                        @if ($numero_incremento_prod == 0)
                                                            <h5 class="mb-0 ">
                                                                INICIANDO ACTIVIDADES</h5>
                                                        @endif

                                                    </div>

                                                </h5>
                                            </div>
                                            <a href="#" title="renewal-date"
                                                class="btn btn-link text-decoration-none  rounded-1"><i
                                                    class="icofont-hand-drawn-right fs-2 "></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Row End -->


                        <div class="col-md-12">
                            <div class="card">
                                <div id="apex-ActividadesFinalizadasDia"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Proyectos</h6>
                                </div>

                                <div class="card-body">
                                    <div class="row g-2 row-deck">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body " style="background-color:#F19828">
                                                    <i class="icofont-checked fs-3"></i>
                                                    <h6 class="mt-3 mb-0 fw-bold small-14">En Desarrollo</h6>
                                                    <span style="font-size:large">{{ $numero_proyectos_desarrollo }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body " style="background-color:#F55580">
                                                    <i class="icofont-ban fs-3"></i>
                                                    <h6 class="mt-3 mb-0 fw-bold small-14">En Pausa</h6>
                                                    <span style="font-size:large">{{ $numero_proyectos_pausa }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body " style="background-color:#A7DAFF">
                                                    <i class="icofont-stopwatch fs-3"></i>
                                                    <h6 class="mt-3 mb-0 fw-bold small-14">En Certificacion</h6>
                                                    <span
                                                        style="font-size:large">{{ $numero_proyectos_certificacion }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body " style="background-color:#484C7F">
                                                    <i class="icofont-beach-bed fs-3"></i>
                                                    <h6 class="mt-3 mb-0 fw-bold small-14">Total</h6>
                                                    <span
                                                        style="font-size:large">{{ $numero_proyectos_desarrollo + $numero_proyectos_certificacion + $numero_proyectos_pausa }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            {{-- <div class="card">
                                <div class="mt-3" id="container_estado_proyectos"></div>
                            </div> --}}
                            <div class="card">
                                <br>
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Total Proyectos</h6>
                                    <h4 class="mb-0 fw-bold ">
                                        {{ $numero_proyectos_desarrollo + $numero_proyectos_certificacion + $numero_proyectos_pausa }}
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mt-3" id="apex-EstadoProyectos"></div>
                                </div>
                            </div>

                        </div>



                        <div class="col-md-12">
                            <div class="card">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <h6 class="mb-0 fw-bold ">Avance de Proyectos</h6>
                                    </div>
                                    <div class="card-body mem-list">

                                        @if ($proyectos_avance)
                                            @foreach ($proyectos_avance as $proyecto_avance)
                                                <div class="progress-count mb-4">
                                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                                        <h6 class="mb-0 fw-bold d-flex align-items-center">
                                                            {{ $proyecto_avance->nombre }}</h6>
                                                        <h5 class="mb-0 fw-bold d-flex align-items-center">
                                                            {{ $proyecto_avance->avance }}%</h5>
                                                        <span class="small text-muted">{{ $proyecto_avance->tiempo }}
                                                            dias</span>
                                                    </div>
                                                    @if ($proyecto_avance->avance > 70)
                                                        <div class="progress" style="height: 10px;">
                                                            <div class="progress-bar light-success-bg" role="progressbar"
                                                                style="width: {{ $proyecto_avance->avance }}%"
                                                                aria-valuenow="{{ $proyecto_avance->avance }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    @endif

                                                    @if ($proyecto_avance->avance >= 50 && $proyecto_avance->avance <= 70)
                                                        <div class="progress" style="height: 10px;">
                                                            <div class="progress-bar bg-lightyellow" role="progressbar"
                                                                style="width: {{ $proyecto_avance->avance }}%"
                                                                aria-valuenow="{{ $proyecto_avance->avance }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    @endif

                                                    @if ($proyecto_avance->avance < 50)
                                                        <div class="progress" style="height: 10px;">
                                                            <div class="progress-bar light-orange-bg" role="progressbar"
                                                                style="width: {{ $proyecto_avance->avance }}%"
                                                                aria-valuenow="{{ $proyecto_avance->avance }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    @endif

                                                </div>
                                            @endforeach
                                        @endif


                                    </div>
                                </div>
                            </div>




                            <div class="card">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold "></h6>
                                </div>
                                <div class="card">
                                    <div class="card-header py-3">
                                        <h6 class="mb-0 fw-bold ">Tiempo de Desarrollo en Proyectos Finalizados</h6>
                                    </div>
                                    <div class="card-body mem-list">
                                        @if ($data_proyectos_tiempo)
                                            @foreach ($data_proyectos_tiempo as $data_proyecto_tiempo)
                                                <div class="progress-count mb-4">
                                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                                        <h6 class="mb-0 fw-bold d-flex align-items-center">
                                                            {{ $data_proyecto_tiempo->proyecto }}</h6>
                                                        <h5 class="mb-0 fw-bold d-flex align-items-center">100%</h5>
                                                        <span class="small text-muted">{{ $data_proyecto_tiempo->tiempo }}
                                                            dias</span>
                                                    </div>

                                                    <div class="progress" style="height: 10px;">
                                                        <div class="progress-bar light-success-bg" role="progressbar"
                                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>

                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>



                                {{--
                                <div id="container_meses_end"></div>

                                <br>

                                <div id="container_errores_tecnicos_2021"></div>

                                <br>

                                <div id="container_errores_tecnicos_2022"></div>

                                <br>

                                <div id="container_category"></div> --}}


                            </div>



                            <div id="hiringsources"></div>


                        </div>





                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12">
                    <div class="row g-3 row-deck">
                        <div class="col-md-6 col-lg-6 col-xl-12">
                            <div class="card bg-primary">
                                <div class="card-body row">
                                    <div class="col">
                                        <span
                                            class="avatar lg bg-white rounded-circle text-center d-flex align-items-center justify-content-center"><i
                                                class="icofont-file-text fs-5"></i></span>
                                        <h1 class="mt-3 mb-0 fw-bold text-white">{{ $numero_proyectos_desarrollo }}</h1>
                                        <span class="text-white">Proyectos en desarrollo</span>
                                    </div>
                                    <div class="col">
                                        <img class="img-fluid" src="{{ url('/') . '/images/interview.svg' }}"
                                            alt="interview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-12  flex-column">
                            <div class="card mb-3">
                                <div class="card-body">

                                    <div id="apex-ActividadesFinalizadasAnalista"></div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">

                                    <div id="#apex-ActividadesFinalizadasAnalista"></div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">

                                    {{-- <div id="container_users_end"></div> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- Row End -->
        </div>
    </div>
    <!-- Jquery Page Js -->
    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/page/hr.js') }}"></script>

    {{-- <script src="{{ asset('js/dayjs.min.js') }}"></script> --}}


    {{-- <script src="{{ asset('code/highcharts.js') }}"></script>
    <script src="{{ asset('code/modules/exporting.js') }}"></script>
    <script src="{{ asset('code/modules/export-data.js') }}"></script>
    <script src="{{ asset('code/modules/accessibility.js') }}"></script>

    <script src="{{ asset('js/highcharts.js') }}"></script> --}}

    <script language="JavaScript">
        // Employees Data
        $(document).ready(function() {

            mostrarEstadoProyectos();

            mostrarActividadesFinalizadasDia();

            mostrarActividadesFinalizadasAnalista();

            //mostrarActividadesAsignadasAnalista();

        });



        function mostrarEstadoProyectos() {
            var options = {
                align: 'center',
                chart: {
                    height: 250,
                    type: 'donut',
                    align: 'center',
                },
                labels: ['En Desarrollo', 'En Pausa', 'En Certificacion'],
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    show: true,
                },
                colors: ['var(--chart-color2)', 'var(--chart-color3)', 'var(--chart-color4)'],
                series: [{{ $numero_proyectos_desarrollo }}, {{ $numero_proyectos_pausa }},
                    {{ $numero_proyectos_certificacion }}
                ],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            }
            var chart = new ApexCharts(document.querySelector("#apex-EstadoProyectos"), options);
            chart.render();
        }

        function mostrarActividadesFinalizadasDia() {
            var options = {
                series: [{
                    data: [1, 0, 13, 32, 14, 0, 0, 0, 0, 22, 20]
                }],
                chart: {
                    type: 'line',
                    height: 350
                },
                stroke: {
                    curve: 'stepline',
                },
                dataLabels: {
                    enabled: false
                },
                title: {
                    text: 'Stepline Chart',
                    align: 'left'
                },
                markers: {
                    hover: {
                        sizeOffset: 4
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#apex-ActividadesFinalizadasDia"), options);
            chart.render();
        }

        function mostrarActividadesFinalizadasAnalista() {

            var options = {
                series: [{
                    name: 'Servings',
                    data: [44, 55, 41, 67, 22, 43, 21, 33, 45, 31, 87, 65, 35]
                }],

                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 0
                },
                grid: {
                    row: {
                        colors: ['#fff', '#f2f2f2']
                    }
                },
                xaxis: {
                    labels: {
                        rotate: -45
                    },
                    categories: ['Apples', 'Oranges', 'Strawberries', 'Pineapples', 'Mangoes', 'Bananas',
                        'Blackberries', 'Pears', 'Watermelons', 'Cherries', 'Pomegranates', 'Tangerines', 'Papayas'
                    ],
                    tickPlacement: 'on'
                },
                yaxis: {
                    title: {
                        text: 'Servings',
                    },
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "horizontal",
                        shadeIntensity: 0.25,
                        gradientToColors: undefined,
                        inverseColors: true,
                        opacityFrom: 0.85,
                        opacityTo: 0.85,
                        stops: [50, 0, 100]
                    },
                }
            };


            var chart = new ApexCharts(document.querySelector("#apex-ActividadesFinalizadasAnalista"), options);
            chart.render();
        }


        function mostrarActividadesAsignadasAnalista() {

            var options = {
                series: [{
                    name: 'Servings',
                    data: [44, 55, 41, 67, 22, 43, 21, 33, 45, 31, 87, 65, 35]
                }],

                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 0
                },
                grid: {
                    row: {
                        colors: ['#fff', '#f2f2f2']
                    }
                },
                xaxis: {
                    labels: {
                        rotate: -45
                    },
                    categories: ['Apples', 'Oranges', 'Strawberries', 'Pineapples', 'Mangoes', 'Bananas',
                        'Blackberries', 'Pears', 'Watermelons', 'Cherries', 'Pomegranates', 'Tangerines', 'Papayas'
                    ],
                    tickPlacement: 'on'
                },
                yaxis: {
                    title: {
                        text: 'Servings',
                    },
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "horizontal",
                        shadeIntensity: 0.25,
                        gradientToColors: undefined,
                        inverseColors: true,
                        opacityFrom: 0.85,
                        opacityTo: 0.85,
                        stops: [50, 0, 100]
                    },
                }
            };

            var chart1 = new ApexCharts(document.querySelector("#apex-ActividadesAsignadasAnalista"), options);
            chart1.render();

        }
    </script>

@endsection
