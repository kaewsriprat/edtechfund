<?php

class ProjectsController extends Controller
{
    public function index(): void
    {
        if (count($_SESSION) == 0 || $_SESSION['user']['isLogin'] == false) {
            Site::redirect('/auth/login');
        }

        $year = date('Y') + 543;
        if($_POST['yearSelect'] != null) {
            $year = $_POST['yearSelect'];
        }

        $this->model('ProjectsModel');
        $data = array(
            'title' => 'โครงการทั้งหมด',
            'projects' => $this->ProjectsModel->get_projects($year),
            'sum_projects' => $this->ProjectsModel->get_sum_project($year),
            'sign_fiscalyear' => $this->ProjectsModel->get_sign_fiscalyear()
        );
        
        $this->adminView('projects/projects', $data);
    }

    public function get_project_by_id($id): void
    {
        $this->model('ProjectsModel');
        $projects = $this->ProjectsModel->get_project_by_id($id);
        echo json_encode($projects);
    }
}

class_alias('ProjectsController', 'projects');

?>