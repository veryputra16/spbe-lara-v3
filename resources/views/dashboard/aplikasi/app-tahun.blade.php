<div class="col-lg-8 d-flex">
    <div class="card card-height-fix w-100">
        {{-- <div class="card-header">
                            <h4>Data Aplikasi berdasarkan Tahun</h4>
                        </div> --}}
        <div class="card-body">
            <div class="table-responsive table-invoice">
                <div id="chartTahun" style="height: 400px;"></div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Highcharts.chart('chartTahun', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Data Aplikasi berdasarkan Tahun'
                },
                xAxis: {
                    categories: {!! json_encode($yearlyData->pluck('tahun')) !!}
                },
                yAxis: {
                    title: {
                        text: 'Total Aplikasi'
                    },
                    allowDecimals: false,
                    min: 0
                },
                series: [{
                        name: 'Semua',
                        data: {!! json_encode($yearlyData->pluck('semua')) !!}
                    },
                    {
                        name: 'Lokal',
                        data: {!! json_encode($yearlyData->pluck('lokal')) !!}
                    },
                    {
                        name: 'Pusat',
                        data: {!! json_encode($yearlyData->pluck('pusat')) !!}
                    },
                    {
                        name: 'Aktif',
                        data: {!! json_encode($yearlyData->pluck('aktif')) !!}
                    },
                    {
                        name: 'Non Aktif',
                        data: {!! json_encode($yearlyData->pluck('nonaktif')) !!}
                    }
                ]
            });
        });
    </script>
@endpush
