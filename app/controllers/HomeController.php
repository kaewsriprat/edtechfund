<?php

class HomeController extends Controller
{

    public function index(): void
    {
        if (count($_SESSION) == 0 || $_SESSION['user']['isLogin'] == false) {
            Site::redirect('/auth/login');
        }
        
        $this->model('HomeModel');
        $year = 2023;
        $data = array(
            'title' => 'Home',
            'assessment' => $this->data_group($this->HomeModel->get_assessment_result($year)),
        );
        $this->adminView('home/home', $data);
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
