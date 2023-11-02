<div class="container-xxl flex-grow-1 container-p-y">
  <!-- BREADCRUMB -->
  <h5 class="fw-bold pb-2 pt-4">
    <!-- home icon -->
    <a href="/home" class="text-muted fw-light">
      <i class="bx bx-home pb-1"></i>
    </a>
    / สินทรัพย์
  </h5>

  <div class="row">
    <div class="col-6">
      <div class="card" style="min-height:100%;">
        <div class="card-header bg-label-primary py-3">
          <span class="fw-bold fs-5"><i class="bx bx-bar-chart pe-2"></i>เปรียบเทียบรายรับ/รายจ่าย (ล้านบาท)</span>
        </div>
        <div class="card-body pt-4 pb-0">
          <div id="chartDiv"></div>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-label-success py-3">
              <span class="fw-bold fs-5"><i class="bx bx-line-chart pe-2"></i>รายรับ</span>
            </div>
            <div class="card-body">
              <div class="text-end mt-4">
                <span class="fw-bold fs-3 text-success"><?php echo round($balance_summary['income'] / 1000000, 2) ?> ล้านบาท</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 mt-4">
          <div class="card">
            <div class="card-header bg-label-warning py-3">
              <span class="fw-bold fs-5"><i class="bx bx-line-chart-down pe-2"></i>รายจ่าย</span>
            </div>
            <div class="card-body">
              <div class="text-end mt-4">
                <span class="fw-bold fs-3 text-warning"><?php echo round($balance_summary['expense'] / 1000000, 2) ?> ล้านบาท</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="my-4">
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-label-primary pb-0">
          <div class="row">
            <div class="col-6 h4 fw-bold text-primary">
              รายรับ / รายจ่าย
            </div>
          </div>
        </div>
        <div class="card-datatable text-nowrap">
          <table class="datatables-ajax table table-striped table-bordered" id="projectsTable">
            <thead>
              <tr>
                <th class="fw-bold">id</th>
                <th class="fw-bold">รายการ</th>
                <th class="fw-bold">ประเภท</th>
                <th class="fw-bold">จำนวนเงิน</th>
                <th class="fw-bold">เดือน</th>
                <th class="fw-bold">ปี</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  $(document).ready(function() {

    const balance = <?php echo json_encode($balance); ?>;
    const balanceSum = <?php echo json_encode($balance_summary); ?>;

    initDemoChart(balanceSum)
    initDataTable(balance)
  });

  function initDemoChart(data) {
    var options = {
      series: [Math.round((data.income / 1000000), 2), Math.round((data.expense / 1000000), 2)],
      labels: ['รายรับ (ล้านบาท)', 'รายจ่าย (ล้านบาท)'],
      colors: ['#696cff', 'rgb(255, 171, 0)'],
      chart: {
        height: 200,
        type: 'pie'
      },
      dataLabels: {
        enabled: true
      },
      legend: {
        show: true,
        showForSingleSeries: true,
        customLegendItems: ['รายรับ', 'รายจ่าย'],
        markers: {
          fillColors: ['#696cff', 'rgb(255, 171, 0)']
        }
      }
    };

    var chart = new ApexCharts(document.querySelector("#chartDiv"), options);
    chart.render();
  }

  function initDataTable(data) {
    data.forEach((item, index) => {
      //remove sign_fiscalyear
      delete data[index]['created_date']
      data[index]['category'] = categoryBadge(item['category']);
      data[index]['summary'] = parseInt(item['summary']).toLocaleString() + ' บาท'
      data[index]['month'] = thaiMonthLookup(parseInt(item['month']))
    })

    //create columns from data
    var columns = [];
    for (var key in data[0]) {
      columns.push({
        data: key
      });
    }

    $('#projectsTable').DataTable({
      responsive: true,
      columns: columns,
      data: data,
      order: [
        [5, 'desc']
      ],
      columnDefs: [{
        targets: 2,
        className: 'text-wrap',
        width: '200px'
      }, ],


    });
  }

  function thaiMonthLookup(monthId) {
    switch (monthId) {
      case 1:
        return 'มกราคม'
      case 2:
        return 'กุมภาพันธ์'
      case 3:
        return 'มีนาคม'
      case 4:
        return 'เมษายน'
      case 5:
        return 'พฤษภาคม'
      case 6:
        return 'มิถุนายน'
      case 7:
        return 'กรกฎาคม'
      case 8:
        return 'สิงหาคม'
      case 9:
        return 'กันยายน'
      case 10:
        return 'ตุลาคม'
      case 11:
        return 'พฤศจิกายน'
      case 12:
        return 'ธันวาคม'
    }
  }

  function categoryBadge(category) {
    if (category == 'รายได้') {
      return '<span class="badge bg-success">รายได้</span>'
    } else {
      return '<span class="badge bg-warning">รายจ่าย</span>'
    }
  }
</script>