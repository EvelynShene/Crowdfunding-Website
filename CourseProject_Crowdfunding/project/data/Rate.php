<?php
    require_once('../database/Database.php');
    require_once('../interface/iRate.php');
    class Rate extends Database implements iRate{
        public function get_project_rates($pid){
            $sql = "SELECT * From rate WHERE pid = ?";
            return $this->getRows($sql,[$pid]);
        }

        public function add_projrate($sponsor,$pid,$star){
            $sql = "INSERT INTO rate(sponsor,pid,star) VALUES (?,?,?)";
            return $this->insertRow($sql,[$sponsor,$pid,$star]);
        }
    }

    $rate = new Rate();

?>
