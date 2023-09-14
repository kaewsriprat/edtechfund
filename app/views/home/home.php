<div class="container-xxl flex-grow-1 container-p-y">
  <!-- BREADCRUMB -->
  <h5 class="fw-bold pb-2 pt-4">
    <!-- home icon -->
    <a href="/home" class="text-muted fw-light">
      <i class="bx bx-home pb-1"></i>
    </a>
    / หน้าแรก
  </h5>
  <h4>ผลการประเมินตัวชี้วัดของกองทุนฯ</h4>

  <hr>
  <div class="row" id="chartDiv">

    <div class="col-12">
      <div class="card mb-3">
        <div class="card-body">
          <span class="d-block fw-semibold mb-1">สรุปผลการดำเนินงานรายไตรมาส</span>
        </div>
        <div id="indicatorsChartByPeriod"></div>
        <span class="text-danger" style="font-size: 0.7em;">* ข้อมูลไตรมาสที่ 4 คำนวน ณ สิ้นเดือนสิงหาคม 2566</span>
      </div>
    </div>

    <hr>

    <div class="col-6">
      <div class="card mb-3">
        <div class="card-body">
          <span class="d-block fw-semibold mb-1">ผลการดำเนินงานไตรมาสที่ 1</span>
        </div>
        <div id="indicatorsChartPeriod1"></div>
      </div>
    </div>
    <div class="col-6">
      <div class="card mb-3">
        <div class="card-body">
          <span class="d-block fw-semibold mb-1">ผลการดำเนินงานไตรมาสที่ 2</span>
        </div>
        <div id="indicatorsChartPeriod2"></div>
      </div>
    </div>
    <div class="col-6">
      <div class="card mb-3">
        <div class="card-body">
          <span class="d-block fw-semibold mb-1">ผลการดำเนินงานไตรมาสที่ 3</span>
        </div>
        <div id="indicatorsChartPeriod3"></div>
      </div>
    </div>
    <div class="col-6">
      <div class="card mb-3">
        <div class="card-body">
          <span class="d-block fw-semibold mb-1">ผลการดำเนินงานไตรมาสที่ 4</span>
        </div>
        <div id="indicatorsChartPeriod4"></div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    let assessment = <?php echo json_encode($data['assessment']); ?>;

    let serires1 = seriesBuilder('ไตรมาสที่ 1', assessment[1])
    let serires2 = seriesBuilder('ไตรมาสที่ 2', assessment[2])
    let serires3 = seriesBuilder('ไตรมาสที่ 3', assessment[3])
    let serires4 = seriesBuilder('ไตรมาสที่ 4', assessment[4])

    let assessmentByPeriod = [{
      'data': [{
        'x': 'ไตรมาสที่ 1',
        'y': 1.0140,
        'goal': [{
          name: 'ค่าเป้าหมาย',
          value: 5,
          strokeColor: 'rgb(255, 171, 0)'
        }]
      }, {
        'x': 'ไตรมาสที่ 2',
        'y': 1.1905,
        'goal': [{
          name: 'ค่าเป้าหมาย',
          value: 5,
          strokeColor: 'rgb(255, 171, 0)'
        }]
      }, {
        'x': 'ไตรมาสที่ 3',
        'y': 1.8618,
        'goal': [{
          name: 'ค่าเป้าหมาย',
          value: 5,
          strokeColor: 'rgb(255, 171, 0)'
        }]
      }, {
        'x': 'ไตรมาสที่ 4',
        'y': 3.7025,
        'goal': [{
          name: 'ค่าเป้าหมาย',
          value: 5,
          strokeColor: 'rgb(255, 171, 0)'
        }]
      }]
    }];

    columnWithMarkerChart('indicatorsChartByPeriod', assessmentByPeriod, 350, '40')
    columnWithMarkerChart('indicatorsChartPeriod1', serires1, 250, '60')
    columnWithMarkerChart('indicatorsChartPeriod2', serires2, 250, '60')
    columnWithMarkerChart('indicatorsChartPeriod3', serires3, 250, '60')
    columnWithMarkerChart('indicatorsChartPeriod4', serires4, 250, '60')

    function seriesBuilder(serieName, data) {
      let series = [];
      let dataArr = [];

      data.forEach((item, index) => {
        dataArr.push({
          x: `ด้านที่ ${index+1}`,
          y: item['result'],
          goals: [{
            name: 'ค่าเป้าหมาย',
            value: 5,
            strokeColor: 'rgb(255, 171, 0)'
          }]
        })
      })
      series.push({
        name: serieName,
        data: dataArr
      })
      return series
    }

    function columnWithMarkerChart(id, series, height = 170, columnWidth = '75') {
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
            columnWidth: columnWidth+'%'
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

  });
</script>