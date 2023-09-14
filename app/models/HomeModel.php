<?php

class HomeModel extends Model
{
    public function get_assessment_result($year) {
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
}
