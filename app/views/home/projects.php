<div class="container-xxl flex-grow-1 container-p-y">
    <!-- BREADCRUMB -->
    <h5 class="fw-bold pb-2 pt-4">
        <!-- home icon -->
        <a href="/home" class="text-muted fw-light">
            <i class="bx bx-home pb-1"></i>
        </a>
        / หน้าแรก
    </h5>
    <h4>สรุปผลการดำเนินงานโครงการ</h4>

    <hr>
    <div class="row" id="chartDiv">

        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <span class="d-block fw-semibold mb-1">ผลการดำเนินงานโครงการ</span>
                    <div class="row">
                        <div class="col-12">
                            <form method="POST">
                                <label for="yearSelect">กรุณาเลือกปี</label>
                                <div class="d-flex d-inline">
                                    <select class="form-select w-50" name="yearSelect" id="yearSelect">
                                        <?php for ($i = 0; $i < count($fiscal_year); $i++) {
                                            if ($projects_status[0]['sign_fiscalyear'] == $fiscal_year[$i]['sign_fiscalyear']) {
                                                echo '<option value="' . $fiscal_year[$i]['sign_fiscalyear'] . '" selected>' . $fiscal_year[$i]['sign_fiscalyear'] . '</option>';
                                            } else {
                                                echo '<option value="' . $fiscal_year[$i]['sign_fiscalyear'] . '">' . $fiscal_year[$i]['sign_fiscalyear'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-success btn-sm ms-3"><i class="bx bx-save pe-2"></i>บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="projectsByStatus"></div>
                <span class="text-danger" style="font-size: 0.7em;">* ข้อมูลไตรมาสที่ 4 คำนวน ณ สิ้นเดือนสิงหาคม 2566</span>
            </div>
        </div>

        <hr>

    </div>

    <script>
        $(document).ready(function() {
            let projects_status = <?php echo json_encode($projects_status); ?>;
            let series1 = seriesBuilder('Projects', projects_status)
            columnWithMarkerChart('projectsByStatus', series1, 350, '40')

        });

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

        function columnWithMarkerChart(id, series, height = 170, columnWidth = '75') {
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