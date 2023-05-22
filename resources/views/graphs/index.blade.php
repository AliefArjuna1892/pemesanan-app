@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Graphs</div>

                    <div class="card-body">
                        <form action="{{ route('graphs.index') }}" method="GET">
                            <div class="form-group">
                                <label for="start_period">Start Period</label>
                                <input type="date" class="form-control" id="start_period" name="start_period" value="{{ $startPeriod }}">
                            </div>

                            <div class="form-group">
                                <label for="end_period">End Period</label>
                                <input type="date" class="form-control" id="end_period" name="end_period" value="{{ $endPeriod }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Generate Graph</button>
                        </form>

                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
    <script>
        const data = {!! json_encode($data) !!};

        const options = {
            chart: {
                type: 'bar',
                height: 350
            },
            series: [
                {
                    name: 'Total Room Price',
                    data: data.map(item => item.total_room_price)
                },
                {
                    name: 'Total Extra Charge',
                    data: data.map(item => item.total_extra_charge)
                },
                {
                    name: 'Final Total',
                    data: data.map(item => item.final_total)
                }
            ],
            xaxis: {
                categories: data.map(item => item.room_type)
            },
            yaxis: {
                title: {
                    text: 'Amount'
                }
            },
            legend: {
                position: 'top'
            }
        };

        const chart = new ApexCharts(document.querySelector('#chart'), options);
        chart.render();
    </script>
@endsection
