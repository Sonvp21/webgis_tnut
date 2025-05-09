<div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style>
        .highcharts-credits {
            display: none !important;
        }
    </style>
    <div class="col-span-1">
        <h2 class="font-bold uppercase text-slate-800 my-3">Thống kê sản phẩm đăng ký xây dựng, phát triển thương hiệu theo đơn vị hành chính</h2>
        <div id="subject-by-administrative-unit" class="h-72 w-full overflow-hidden rounded bg-white shadow"></div>
        <script>
            Highcharts.chart('subject-by-administrative-unit', {
                chart: {
                    type: 'column',
                },
                title: {
                    text: null,
                },
                xAxis: {
                    categories: @json($districts),
                    crosshair: true,
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Số lượng (sản phẩm)',
                    },
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0; "></td>' +
                        '<td style="padding:0"><b>{point.y:,.0f} sản phẩm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true,
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            style: {
                                textOutline: 'none',
                                fontWeight: 'bold'
                            },
                            formatter: function() {
                                return this.y;
                            }
                        }
                    },
                },
                series: [{
                    name: 'sản phẩm',
                    data: @json($data),
                }],
                legend: {
                    enabled: false // Ẩn legend
                }
            });
        </script>
    </div>
</div>
