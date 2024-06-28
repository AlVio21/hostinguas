@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Dashboard</h2>
        {{-- Html --}}
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">
                Diagram menampilkan jumlah orders berdasarkan product. Diagram akan direset pada awal bulan.
            </p>
        </figure>

        {{-- CSS --}}
        <style>
            .highcharts-figure,
            .highcharts-data-table table {
                min-width: 310px;
                max-width: 800px;
                margin: 1em auto;
            }

            #container {
                height: 400px;
            }

            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #ebebeb;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }

            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }

            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }

            .highcharts-data-table td,
            .highcharts-data-table th,
            .highcharts-data-table caption {
                padding: 0.5em;
            }

            .highcharts-data-table thead tr,
            .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }

            .highcharts-data-table tr:hover {
                background: #fffef1;
            }
        </style>

        {{-- Javascript --}}
        <script>
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Jumlah Orders Berdasarkan Product',
                    align: 'center'
                },
                subtitle: {
                    text: 'Source: Orders Database',
                    align: 'left'
                },
                xAxis: {
                    categories: [
                        @foreach($ordersByProduct as $order)
                            '{{ $order->product_name }}',
                        @endforeach
                    ],
                    crosshair: true,
                    accessibility: {
                        description: 'Product'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Orders'
                    }
                },
                tooltip: {
                    valueSuffix: ' Orders'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Orders',
                    data: [
                        @foreach($ordersByProduct as $order)
                            {{ $order->total_orders }},
                        @endforeach
                    ],
                    color: '#FFD700' 
                }]
            });
        </script>
    </div>
</div>
@endsection
