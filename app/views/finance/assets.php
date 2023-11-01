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
    <div class="col-12 mb-4">
      <div class="card">
        <div class="card-body pt-3">
          <form method="POST">
            <div class="row">
              <div class="col-4">
                <label for="monthSelect">กรุณาเลือกเดือน</label>
                <select class="form-select" name="monthSelect" id="monthSelect">
                  <option value="0" selected disabled>เลือกเดือน</option>
                  <?php
                  //loop option thai month name with numberic value; selected from $assets[0]['month']
                  for ($i = 1; $i <= 12; $i++) {
                    if ($i == $assets[0]['month']) {
                      echo "<option value='" . $i . "' selected>" . thai_month_arr($i) . "</option>";
                    } else {
                      echo "<option value='" . $i . "'>" . thai_month_arr($i)  . "</option>";
                    }
                  }

                  function thai_month_arr($month_number)
                  {
                    $thai_month_arr = array(
                      1 => 'มกราคม',
                      2 => 'กุมภาพันธ์',
                      3 => 'มีนาคม',
                      4 => 'เมษายน',
                      5 => 'พฤษภาคม',
                      6 => 'มิถุนายน',
                      7 => 'กรกฎาคม',
                      8 => 'สิงหาคม',
                      9 => 'กันยายน',
                      10 => 'ตุลาคม',
                      11 => 'พฤศจิกายน',
                      12 => 'ธันวาคม'
                    );
                    return $thai_month_arr[$month_number];
                  }

                  ?>
                </select>
              </div>
              <div class="col-4">
                <label for="yearSelect">กรุณาเลือกปีงบประมาณ</label>
                <select class="form-select" name="yearSelect" id="yearSelect">
                  <!-- <option value="0" selected disabled>เลือกเดือน</option> -->
                  <option value="2566" selected>2566</option>
                </select>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-success btn-sm ms-3 mt-4 w-25"><i class="bx bx-save pe-2"></i>บันทึก</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <div class="col-6">
      <div class="card">
        <div class="card-header bg-label-primary py-3">
          <span class="fw-bold fs-5"><i class="bx bx-line-chart pe-2"></i>สินทรัพย์ประจำเดือน <?php echo thai_month_arr($assets[0]['month']); ?> ปีงบประมาณ <?php echo $assets[0]['year']; ?></span>
        </div>
        <div class="card-body">
          <div class="text-end mt-4">
            <span class="fw-bold fs-4 text-primary"><?php echo number_format($assets['credit_total']/1000000); ?> ล้านบาท</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card">
        <div class="card-header bg-label-danger py-3">
          <span class="fw-bold fs-5"><i class="bx bx-line-chart-down pe-2"></i>หนี้สินและทุนประจำเดือน <?php echo thai_month_arr($assets[0]['month']); ?> ปีงบประมาณ <?php echo $assets[0]['year']; ?></span>
        </div>
        <div class="card-body">
          <div class="text-end mt-4">
            <span class="fw-bold fs-4 text-danger"><?php echo number_format($assets['total']/1000000); ?> ล้านบาท</span>
          </div>
        </div>
      </div>
    </div>

  </div>
  <hr class="my-4">
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-label-secondary pb-0">
          <div class="row">
            <div class="col-6 h4 fw-bold text-secondary">
              สินทรัพย์/หนี้สินและทุน ประจำเดือน<?php echo thai_month_arr($assets[0]['month']); ?> ปีงบประมาณ <?php echo $assets[0]['year']; ?>
            </div>
          </div>
        </div>
        <div class="card-datatable text-nowrap">
          <table class="datatables-ajax table table-striped table-bordered" id="projectsTable">
            <thead>
              <tr>
                <th class="fw-bold d-none">id</th>
                <th class="fw-bold">รายการ</th>
                <th class="fw-bold">ประเภท</th>
                <th class="fw-bold">สินทรัพย์</th>
                <th class="fw-bold">หนี้สินและทุน</th>
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

    const assets = <?php echo json_encode($assets); ?>;
    initDataTable(assets)
  });

  function initDataTable(data) {
    delete data['credit_total']
    delete data['debit_total']
    delete data['total']

    //convert data into array of obj
    data = Object.values(data)

    data.forEach((item, index) => {
      // if debit = NaN, set to 0
      (isNaN(item['credit']) || item['credit'] == null ? item['credit'] = '-': item['credit'] =  `<span class="fw-bold text-primary">${parseInt(item['credit']).toLocaleString()} บาท</span>`);
      (isNaN(item['debit']) || item['debit'] == null ? item['debit'] = '-': item['debit'] = `<span class="fw-bold text-danger">${parseInt(item['debit']).toLocaleString()} บาท</span>`);
      data[index]['category'] = categoryBadge(item['category'])
      data[index]['credit'] = item['credit']
      data[index]['debit'] = item['debit']
      data[index]['month'] = thaiMonthLookup(parseInt(item['month']))
    })

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
      [4, 'desc']
    ],
    columnDefs: [{
      targets: [2,3],
      className: 'text-end',
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
    if (category == 'สินทรัพย์') {
      return '<span class="badge bg-primary">สินทรัพย์</span>'
    } else {
      return '<span class="badge bg-danger">หนี้สินและทุน</span>'
    }
  }
</script>