<?php

class FinanceModel extends Model
{

    public function get_balance()
    {
        $sql = "SELECT * FROM balance WHERE summary != 0 ORDER BY year DESC";
        try {
            $stmt = $this->Rdb->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function get_balance_summary()
    {
        $sql = "SELECT income.income, expense.expense
        FROM
        (SELECT ROUND(SUM(summary),2) AS expense
        FROM balance
        WHERE category = 'รายจ่าย') AS expense
        JOIN
        (SELECT ROUND(SUM(summary),2) AS income
        FROM balance
        WHERE category = 'รายได้') AS income";

        try {
            $stmt = $this->Rdb->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function get_assets($month, $year)
    {
        // $sql = "SELECT assets.item, assets.summary, assets.category, assets.month, assets.year FROM assets WHERE assets.month = :month AND assets.year = :year";
        $sql = "SELECT DISTINCT assets.item, assets.category, credit.credit, debit.debit, assets.month, assets.year
                FROM assets
                LEFT JOIN 
                (SELECT item, summary as credit
                FROM assets
                WHERE assets.month = :month
                AND assets.year = :year 
                AND assets.category = 'สินทรัพย์') AS credit
                ON assets.item = credit.item
                
                LEFT JOIN
                (SELECT item, summary as debit
                FROM assets
                WHERE assets.month = :month
                AND assets.year = :year
                AND assets.category = 'หนี้สินและทุน') AS debit
                ON assets.item = debit.item
                
                WHERE assets.month = :month
                AND assets.year = :year
                ORDER BY credit.credit DESC, debit.debit DESC";

        $data = array(
            'month' => $month,
            'year' => $year
        );

        try {
            $stmt = $this->Rdb->prepare($sql);
            $this->bind($stmt, $data);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $credit_debit = $this->credit_debit($result);
            $result['credit_total'] = $credit_debit['credit'];
            $result['debit_total'] = $credit_debit['debit'];
            $result['total'] = $this->assets_total($credit_debit['credit'], $credit_debit['debit']);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function get_assets_value($month, $year)
    {
        $sql = "SELECT sum(assets.summary) AS assets_value, acv.value AS calculate_value
        FROM assets
        JOIN assets_calculate_value acv
        ON assets.month = acv.month AND assets.year = acv.year
        WHERE assets.month = :month AND assets.year = :year AND category = 'หนี้สินและทุน'
        GROUP BY assets.year, assets.month, acv.value";

        $data = array(
            'month' => $month,
            'year' => $year
        );

        try {
            $stmt = $this->Rdb->prepare($sql);
            $this->bind($stmt, $data);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $result['total'] = $this->assets_month_total($result['assets_value'], $result['calculate_value']);
            $result['month'] = $month;
            $result['year'] = $year;

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    private function assets_month_total($assets_value, $calculate_value)
    {
        if ($calculate_value < 0) {
            return $assets_value - abs($calculate_value);
        } else {
            return $assets_value + $calculate_value;
        }
    }

    public function get_yearly_assets_total(){
        $sql = "SELECT credit.month_name_abbr_th, credit.credit, debit.debit
                FROM 
                (SELECT mm.month_name_abbr_th, SUM(assets.summary) AS credit
                FROM assets
                JOIN month_master mm
                ON assets.month = mm.id
                WHERE assets.category = 'สินทรัพย์'
                GROUP BY assets.month
                ORDER BY mm.fiscal_year_month_order) AS credit
                JOIN
                (SELECT mm.month_name_abbr_th, SUM(assets.summary) AS debit
                FROM assets
                JOIN month_master mm
                ON assets.month = mm.id
                WHERE assets.category = 'หนี้สินและทุน'
                GROUP BY assets.month
                ORDER BY mm.fiscal_year_month_order) AS debit
                ON credit.month_name_abbr_th = debit.month_name_abbr_th";

        try {
            $stmt = $this->Rdb->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    private function credit_debit($data)
    {
        $credit = 0;
        $debit = 0;
        foreach ($data as $item) {
            if ($item['credit'] != null) {
                $credit += $item['credit'];
            }
            if ($item['debit'] != null) {
                $debit += $item['debit'];
            }
        }
        return array(
            'credit' => $credit,
            'debit' => $debit
        );
    }



    private function assets_total($credit, $debit)
    {
        $result = $debit - $credit;
        $result = $debit - $result;
        return $result;
    }
}
