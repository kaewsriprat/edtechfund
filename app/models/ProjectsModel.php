<?php

class ProjectsModel extends Model
{
    public function get_projects($year)
    {
        $sql = "SELECT projects.id, projects.project_number, projects.project_name, projects.sign_fiscalyear, projects.budget, projects.paid_budget, projects.budget - projects.paid_budget AS remain_budget, projects.status
                FROM projects
                WHERE sign_fiscalyear = :year";

        $data = array(
            'year' => $year
        );

        try {
            $stmt = $this->Rdb->prepare($sql);
            $this->bind($stmt, $data);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function get_project_by_id($id)
    {
        $sql = "SELECT * FROM projects WHERE id = :id";

        $data = array(
            ':id' => $id
        );

        try {
            $stmt = $this->Rdb->prepare($sql);
            $this->bind($stmt, $data);
            $stmt->execute($data);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function get_sign_fiscalyear()
    {
        $sql = "SELECT DISTINCT sign_fiscalyear FROM projects";
        try {
            $stmt = $this->Rdb->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function get_sum_project($year)
    {
        $sql = "SELECT sign_fiscalyear, COUNT(id) AS project_count, SUM(budget) AS budget, SUM(paid_budget) AS paid_budget
                FROM projects
                WHERE sign_fiscalyear = :year";
         $data = array(
            'year' => $year
         );
        try {
            $stmt = $this->Rdb->prepare($sql);
            $this->bind($stmt, $data);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
