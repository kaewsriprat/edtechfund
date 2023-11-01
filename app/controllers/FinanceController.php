<?php

class FinanceController extends Controller
{

    public function index(): void
    {
        Site::redirect('/finance/assets');
    }

    public function assets()
    {
        if (count($_SESSION) == 0 || $_SESSION['user']['isLogin'] == false) {
            Site::redirect('/auth/login');
        }

        if(count($_POST) == 0) {
            $month = date('m');
            $year = 2566;
            if($month >= 10) {
                $year = $year - 1;
            }
        } else {
            $month = $_POST['monthSelect'];
            $year = $_POST['yearSelect'];
            if($month >= 10) {
                $year = $year - 1;
            }
        }

        $this->model('FinanceModel');
        
        $data = array(
            'title' => 'การเงิน',
            'assets' => $this->FinanceModel->get_assets($month, $year),
            'assets_value' => $this->FinanceModel->get_assets_value($month, $year)
        );
        $this->adminView('finance/assets', $data);
    }

    public function balance()
    {
        if (count($_SESSION) == 0 || $_SESSION['user']['isLogin'] == false) {
            Site::redirect('/auth/login');
        }

        $this->model('FinanceModel');
        $data = array(
            'title' => 'การเงิน',
            'balance' => $this->FinanceModel->get_balance(),
            'balance_summary' => $this->FinanceModel->get_balance_summary(),
        );

        $this->adminView('finance/balance', $data);
    }
}

class_alias('FinanceController', 'Finance');
