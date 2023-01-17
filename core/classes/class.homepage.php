<?php

class Homepage extends Connection
{


    public function total_user(){
        $result = $this->select('tbl_users', 'count(user_id)');
        $row = $result->fetch_array();
        return $row[0];
    }

    public function total_assessment(){
        $result = $this->select('tbl_health_assessment', 'count(assessment_id)');
        $row = $result->fetch_array();
        return $row[0];
    }

    public function total_plant(){
        $result = $this->select('tbl_plants', 'count(plant_id)');
        $row = $result->fetch_array();
        return $row[0];
    }
}

?>
