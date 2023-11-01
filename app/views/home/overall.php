<div class="container-xxl flex-grow-1 container-p-y">
    <!-- BREADCRUMB -->
    <h5 class="fw-bold pb-2 pt-4">
        <!-- home icon -->
        <a href="/home" class="text-muted fw-light">
            <i class="bx bx-home pb-1"></i>
        </a>
        / หน้าแรก
    </h5>

    <div class="row">
        <div class="col-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <span class="d-block fw-semibold mb-1">สรุปผลการดำเนินงานรายไตรมาส</span>
                </div>
                <div id="indicatorsChartByPeriod"></div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <span class="d-block fw-semibold mb-1">ผลการดำเนินงานโครงการ</span>
                </div>
                <div id="projectsChart"></div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        let projects = <?php echo json_encode($projects); ?>;

        let assessmentByPeriod = [{
            'data': [{
                'x': 'ไตรมาสที่ 1',
                'y': 1.0140,
                goals: [{
                    name: 'ค่าเป้าหมาย',
                    value: 5,
                    strokeColor: 'rgb(255, 171, 0)'
                }]
            }, {
                'x': 'ไตรมาสที่ 2',
                'y': 1.1905,
                goals: [{
                    name: 'ค่าเป้าหมาย',
                    value: 5,
                    strokeColor: 'rgb(255, 171, 0)'
                }]
            }, {
                'x': 'ไตรมาสที่ 3',
                'y': 1.8618,
                goals: [{
                    name: 'ค่าเป้าหมาย',
                    value: 5,
                    strokeColor: 'rgb(255, 171, 0)'
                }]
            }, {
                'x': 'ไตรมาสที่ 4',
                'y': 3.7025,
                goals: [{
                    name: 'ค่าเป้าหมาย',
                    value: 5,
                    strokeColor: 'rgb(255, 171, 0)'
                }]
            }]
        }];

        projectChart('projectsChart', seriesBuilder('Projects', projects), 350, '40')
        indicatorsChart('indicatorsChartByPeriod', assessmentByPeriod, 350, '40')

    })

    function indicatorsChart(id, series, height = 170, columnWidth = '75') {
        var options = {
            series: series,
            //max y axis
            yaxis: {
                max: 6
            },
            chart: {
                height: height,
                type: 'bar'
            },
            plotOptions: {
                bar: {
                    columnWidth: columnWidth + '%'
                }
            },
            colors: ['#696cff'],
            dataLabels: {
                enabled: true
            },
            legend: {
                show: true,
                showForSingleSeries: true,
                customLegendItems: ['คะแนนที่ได้', 'ค่าเป้าหมาย'],
                markers: {
                    fillColors: ['#696cff', 'rgb(255, 171, 0)']
                }
            }
        };

        var chart = new ApexCharts(
            document.querySelector("#" + id), options);
        chart.render();
    }

    function seriesBuilder(serieName, data) {
        let series = [];
        let dataArr = [];

        data.forEach(element => {
            dataArr.push({
                x: element['status'],
                y: element['count_projects'],
                fillColor: projectStatusColorLookup(element['status'])
            })
        });

        series.push({
            name: serieName,
            data: dataArr
        })
        return series;
    }

    function projectChart(id, series, height = 170, columnWidth = '75') {
        var options = {
            series: series,
            chart: {
                height: height,
                type: 'bar'
            },
            plotOptions: {
                bar: {
                    columnWidth: columnWidth + '%'
                }
            },
            colors: ['#696cff'],
            dataLabels: {
                enabled: true
            },
        };

        var chart = new ApexCharts(
            document.querySelector("#" + id), options);
        chart.render();
    }

    function projectStatusColorLookup(status) {
        //เสร็จสิ้นโครงการ,ขอระงับสัญญาชั่วคราว,อยู่ระหว่างดำเนินการ,ขอยกเลิกสัญญา
        switch (status) {
            case 'เสร็จสิ้นโครงการ':
                //success
                return '#00cc00';
            case 'ขอระงับสัญญาชั่วคราว':
                return '#ffcc00';
            case 'อยู่ระหว่างดำเนินการ':
                return '#696cff';
            case 'ขอยกเลิกสัญญา':
                return '#ff4d4d';
            default:
                return '#696cff';
        }
    }
</script>