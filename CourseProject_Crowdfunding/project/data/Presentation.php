<?php
    require_once('../database/Database.php');
    require_once('../interface/iPresentation.php');
    class Presentation extends Database implements iPresentation{
        public function add_presentation($pid,$stored_path,$fname){
            $sql = "INSERT INTO presentation VALUES(?, now(), ?,?)";
            return $this->insertRow($sql, [$pid,$stored_path,$fname]);
        }

        public function get_presentation($pid){
           $sql = "SELECT *
                FROM presentation
                WHERE pid = ?
                ORDER BY updatetime desc";
            return $this->getRows($sql, [$pid]);
        }
    }

    $presentation = new Presentation();
?>
