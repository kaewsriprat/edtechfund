<?php

class HomeModel extends Model
{
    public function get_assessment_result($year)
    {
        $sql = "(SELECT *, 1 AS period
            FROM assessment
            WHERE MONTH(assessment_date) = 12 AND YEAR(assessment_date) = :lastYear)
            UNION
            (SELECT *, 2 AS period
            FROM assessment
            WHERE MONTH(assessment_date) = 3 AND YEAR(assessment_date) = :year)
            UNION
            (SELECT *, 3 AS period
            FROM assessment
            WHERE MONTH(assessment_date) = 6 AND YEAR(assessment_date) = :year)
            UNION
            (SELECT *, 4 AS period
            FROM assessment
            WHERE MONTH(assessment_date) = 8 AND YEAR(assessment_date) = :year)";
        $data = array(
            'year' => $year,
            'lastYear' => $year - 1,
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

    public function get_projects_status()
    {
        $sql = "SELECT status, count(status) AS count_projects
        FROM projects
        GROUP BY status 
        ORDER BY count(status) DESC";

        try {
            $stmt = $this->Rdb->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function get_projects_by_status_year($year)
    {
        $sql = "SELECT sign_fiscalyear, status, count(*) AS count_projects
        FROM projects
        WHERE sign_fiscalyear = :year
        GROUP BY status
        ORDER BY count_projects ASC";

        $data = array(
            'year' => $year,
        );

        try {
            $stmt = $this->Rdb->prepare($sql);
            $this->bind($stmt, $data);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
