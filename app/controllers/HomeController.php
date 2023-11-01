<?php

class HomeController extends Controller
{

    public function index(): void
    {
        Site::redirect('/home/overallDashboard');
    }

    public function overallDashboard() {
        $this->model('HomeModel');
        $data = array(
            'title' => 'ตัวชี้วัดสำนัก',
            'assessment' => $this->data_group($this->HomeModel->get_assessment_result(2023)),
            'projects' => $this->HomeModel->get_projects_status(),
        );
        $this->adminView('home/overall', $data);
    }

    public function indicatorsDashboard() {
        if (count($_SESSION) == 0 || $_SESSION['user']['isLogin'] == false) {
            Site::redirect('/auth/login');
        }
        
        $this->model('HomeModel');
        $year = 2023;
        $data = array(
            'title' => 'ตัวชี้วัดสำนัก',
            'assessment' => $this->data_group($this->HomeModel->get_assessment_result($year)),
        );
        $this->adminView('home/indicators', $data);
    }

    public function projectsDashboard() {

        if(!isset($_POST['yearSelect'])) {
            $year = 2566;
        } else{
            $year = $_POST['yearSelect'];
        }

        $this->model('HomeModel');
        $this->model('ProjectsModel');

        $data = array(
            'title' => 'โครงการ',
            'projects_status' => $this->HomeModel->get_projects_by_status_year($year),
            'fiscal_year' => $this->ProjectsModel->get_sign_fiscalyear()
        );
        $this->adminView('home/projects', $data);
    }

    private function scoreCal($data) {
        $maxScore = 5;
        $scoreArray = array();
        foreach ($data as $key => $value) {
            $scorePercent = ($value['result'] / $maxScore) * 100;
            array_push($scoreArray, [$value['category'],$value['result'],$scorePercent]);
        }
        return $scoreArray;
    }

    private function data_group($data) {
        $data_group = array(); 
        foreach ($data as $key => $value) {
            $data_group[$value['period']][] = $value;
        }
        return $data_group;
    }

    

}

class_alias('HomeController', 'Home');
