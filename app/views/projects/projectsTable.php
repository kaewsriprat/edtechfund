<div class="container-xxl flex-grow-1 container-p-y">
    <!-- BREADCRUMB -->
    <h5 class="fw-bold pb-2 pt-4">
        <!-- home icon -->
        <a href="/home" class="text-muted fw-light">
            <i class="bx bx-home pb-1"></i>
        </a>
        / โครงการ
    </h5>

    <?php

    $selectedYear = $data['projects'][0]['sign_fiscalyear'];
    $year = $data['sign_fiscalyear'];

    ?>
    <div class="row">
        <div class="col-3 mb-3">
            <label for="" class="form-label fw-bold fs-5">เลือกปีงบประมาณ</label>
            <form action="" method="POST" id="yearForm">
                <select class="form-select form-select-lg" name="yearSelect" id="yearSelect" onchange="yearFormPost()">
                    <?php
                    foreach ($year as $item) {
                        echo '<option value="' . $item['sign_fiscalyear'] . '" ' . ($item['sign_fiscalyear'] == $selectedYear ? " selected" : "") . '>' . $item['sign_fiscalyear'] . '</option>';
                    }
                    ?>
                </select>
            </form>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-3">
            <div class="card">
                <div class="card-header bg-label-primary text-primary">
                    <span class="fs-5 fw-bold"><i class="bx bxs-file pe-3"></i>โครงการในปี <?php echo $data['sum_projects']['sign_fiscalyear']; ?>
                </div>
                <div class="card-body text-end mt-3">
                    <span class="fs-3 fw-bold text-primary"><?php echo $data['sum_projects']['project_count']; ?> โครงการ</span>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header bg-label-info text-info">
                    <span class="fs-5 fw-bold"><i class="bx bx-dollar-circle pe-3"></i>งบประมาณทั้งหมด
                </div>
                <div class="card-body text-end mt-3">
                    <span class="fs-3 fw-bold text-info"><?php echo number_format($data['sum_projects']['budget']); ?> บาท</span>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header bg-label-warning text-warning">
                    <span class="fs-5 fw-bold"><i class="bx bx-transfer-alt pe-3"></i>เบิกจ่ายไปแล้ว
                </div>
                <div class="card-body text-end mt-3">
                    <span class="fs-3 fw-bold text-warning"><?php echo number_format($data['sum_projects']['paid_budget']); ?> บาท</span>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header bg-label-success text-success">
                    <span class="fs-5 fw-bold"><i class="bx bx-coin-stack pe-3"></i>เบิกจ่ายแล้วร้อยละ
                </div>
                <div class="card-body text-end mt-3">
                    <span class="fs-3 fw-bold text-success"><?php echo 'ร้อยละ ' . number_format(($data['sum_projects']['paid_budget'] / $data['sum_projects']['budget']) * 100); ?></span>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-4">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-label-primary pb-0">
                    <div class="row">
                        <div class="col-6 h4 fw-bold text-primary">
                            โครงการทั้งหมด
                        </div>
                    </div>
                </div>
                <div class="card-datatable text-nowrap">
                    <table class="datatables-ajax table table-striped table-bordered" id="projectsTable">
                        <thead>
                            <tr>
                                <th class="fw-bold d-none">id</th>
                                <th class="fw-bold">รหัสโครงการ</th>
                                <th class="fw-bold">ชื่อโครงการ</th>
                                <th class="fw-bold">งบประมาณ</th>
                                <th class="fw-bold">เบิกจ่ายแล้ว</th>
                                <th class="fw-bold">คงเหลือ</th>
                                <th class="fw-bold">สถานะ</th>
                                <th class="fw-bold">จัดการ</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="projectDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xxl modal-simple">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3>รายละเอียดโครงการ</h3>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="row">
                                <span class="col-12 col-md-5 fs-5 fw-bold">เลขที่สัญญา</span>
                                <span class="col-12 col-md-7" id="projectNumber"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <span class="col-12 col-md-5 fs-5 fw-bold">ปีงบประมาณ</span>
                                <span class="col-12 col-md-7" id="approval_fiscalyear"></span>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                                <span class="col-12 col-md-2 fs-5 fw-bold">ชื่อโครงการ <span id="projectStatus"></span></span>
                                <span class="col-12 col-md-10" id="projectName"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-header bg-label-primary py-0 mb-1 pt-1">
                                    <h6 class="text-primary mb-1">วงเงิน</h6>
                                </div>
                                <div class="card-body pb-2 text-end">
                                    <span class="fs-6 fw-bold text-secondary" id="budget"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-header bg-label-info py-0 mb-1 pt-1">
                                    <h6 class="text-info mb-1">เบิกจ่ายไปแล้ว</h6>
                                </div>
                                <div class="card-body pb-2 text-end">
                                    <span class="fs-6 fw-bold text-secondary" id="paid_budget"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-header bg-label-warning py-0 mb-1 pt-1">
                                    <h6 class="text-warning mb-1">คิดเป็นร้อยละ</h4>
                                </div>
                                <div class="card-body pb-2 text-end">
                                    <span class="fs-6 fw-bold text-secondary" id="budgetSpentPercentage"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                            <div class="accordion-item card">
                                <h2 class="accordion-header text-body d-flex justify-content-between">
                                    <button type="button" class="accordion-button collapsed bg-label-primary" data-bs-toggle="collapse" data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1">
                                        <span class="text-primary"><i class='bx bx-paper-plane pe-3'></i>วัตถุประสงค์</span>
                                    </button>
                                </h2>
                                <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                                    <div class="accordion-body pt-2" id="objective">
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header text-body d-flex justify-content-between">
                                    <button type="button" class="accordion-button collapsed bg-label-info" data-bs-toggle="collapse" data-bs-target="#accordionIcon-2" aria-controls="accordionIcon-2">
                                        <span class="text-info"><i class='bx bx-bullseye pe-3'></i></i>เป้าหมาย
                                    </button>
                                </h2>
                                <div id="accordionIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                                    <div class="accordion-body pt-2" id="goal">
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header text-body d-flex justify-content-between">
                                    <button type="button" class="accordion-button collapsed bg-label-warning" data-bs-toggle="collapse" data-bs-target="#accordionIcon-3" aria-controls="accordionIcon-3">
                                        <span class="text-warning"><i class='bx bx-target-lock pe-3'></i>Output
                                    </button>
                                </h2>
                                <div id="accordionIcon-3" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                                    <div class="accordion-body pt-2" id="projectOutput">
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header text-body d-flex justify-content-between">
                                    <button type="button" class="accordion-button collapsed bg-label-success" data-bs-toggle="collapse" data-bs-target="#accordionIcon-4" aria-controls="accordionIcon-4">
                                        <span class="text-success"><i class='bx bx-crown pe-3'></i>Outcome / การนำไปใช้
                                    </button>
                                </h2>
                                <div id="accordionIcon-4" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                                    <div class="accordion-body pt-2" id="projectOutcome">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <hr>
                            <button type="button" class="btn btn-label-secondary text-secondary" data-bs-dismiss="modal">ปิดหน้าต่าง </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

</div>

<!-- import axios cdn -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function() {
        initDataTable(<?php echo json_encode($data['projects']) ?>);
    })

    function initDataTable(data) {
        data.forEach((item, index) => {
            //remove sign_fiscalyear
            delete data[index]['sign_fiscalyear']
            data[index]['budget'] = parseInt(item['budget']).toLocaleString() + ' บาท'
            data[index]['paid_budget'] = parseInt(item['paid_budget']).toLocaleString() + ' บาท'
            data[index]['remain_budget'] = parseInt(item['remain_budget']).toLocaleString() + ' บาท'

            data[index]['status'] = projectStatusBadge(item['status'])

            data[index]['actions'] = `
            <div class="row">
                <div class="col-12 text-center">
                <button class="btn btn-sm btn-label-info" id="projectDetail" onclick="showModal(${item['id']})" title="ดูรายละเอียด">
                        <i class="bx bx-info-circle" style="font-size: 16px;"></i>
                    </button>
                </div>
            </div>
            `;
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
            columnDefs: [{
                    targets: 0,
                    className: 'd-none',
                },
                //text wrap col projectName and min width = 200px
                {
                    targets: 2,
                    className: 'text-wrap',
                    width: '200px'
                },
                {
                    targets: 6,
                    className: 'text-center'
                },
            ],


        });
    }

    function showModal(id) {
        $('#projectDetailModal').modal('show');
        var basurl = window.location.origin;
        axios
            .get(`${basurl}/projects/get_project_by_id/${id}`)
            .then((res) => {
                var budgetSpentPercentage = (parseInt(res.data['paid_budget']) / parseInt(res.data['budget'])) * 100;

                document.getElementById('projectNumber').innerHTML = res.data['project_number'];
                document.getElementById('approval_fiscalyear').innerHTML = res.data['approval_fiscalyear'];
                document.getElementById('projectName').innerHTML = res.data['project_name'];
                document.getElementById('projectStatus').innerHTML = projectStatusBadge(res.data['status']);

                document.getElementById('budget').innerHTML = parseInt(res.data['budget']).toLocaleString() + ' บาท';
                document.getElementById('paid_budget').innerHTML = parseInt(res.data['paid_budget']).toLocaleString() + ' บาท';
                document.getElementById('budgetSpentPercentage').innerHTML = parseInt(budgetSpentPercentage).toLocaleString() + '%';

                document.getElementById('objective').innerHTML = res.data['objective'];
                document.getElementById('goal').innerHTML = res.data['goal'];
                document.getElementById('projectOutput').innerHTML = res.data['project_output'];
                document.getElementById('projectOutcome').innerHTML = res.data['project_outcome'];
            })
    }

    function projectStatusBadge(status) {
        if (status == 'เสร็จสิ้นโครงการ') {
            return '<span class="badge bg-success">เสร็จสิ้นโครงการ</span>'
        } else if (status == 'อยู่ระหว่างดำเนินการ') {
            return '<span class="badge bg-warning">อยู่ระหว่างดำเนินการ</span>'
        } else if (status == 'ขอยกเลิกสัญญา') {
            return '<span class="badge bg-secondary">ยกเลิกสัญญา</span>'
        } else if (status == 'ขอระงับสัญญาชั่วคราว') {
            return '<span class="badge bg-danger">ขอระงับสัญญาชั่วคราว</span>'
        }
    }

    function yearFormPost() {
        document.getElementById('yearForm').submit();
    }
</script>