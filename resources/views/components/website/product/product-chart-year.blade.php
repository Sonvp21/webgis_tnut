<div>
    <div class="col-span-1">
        <h2 class="font-bold uppercase text-slate-800 my-3">Thống kê sản phẩm đăng ký xây dựng, phát triển thương hiệu theo năm</h2>
        <div id="patent-by-year" class="h-72 w-full overflow-hidden rounded bg-white shadow"></div>
        <script>
            Highcharts.chart('patent-by-year', {
                chart: {
                    type: 'area',
                },
                title: {
                    text: null,
                },
                xAxis: {
                    categories: @json($years),
                    title: {
                        text: 'Năm'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Số lượng sản phẩm'
                    }
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:,.0f}</b>'
                },
                plotOptions: {
                    area: {
                        marker: {
                            enabled: true,
                            symbol: 'circle',
                            radius: 2,
                            states: {
                                hover: {
                                    enabled: true,
                                    radius: 4
                                }
                            }
                        },
                        dataLabels: {
                            enabled: true,
                            formatter: function() {
                                return this.y;
                            },
                            style: {
                                color: '#000000',
                                textOutline: 'none',
                                fontWeight: 'bold'
                            }
                        }
                    }
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
