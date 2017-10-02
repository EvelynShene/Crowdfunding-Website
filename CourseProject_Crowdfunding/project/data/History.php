<?php
    require_once('../database/Database.php');
    require_once('../interface/iHistory.php');
    class History extends Database implements iHistory{
        public function save_history_info($loginname, $history_info, $actid, $tag){
            $sql = "INSERT INTO history VALUES(?, ?, now(), ?, ?)"        ;
            return $this->insertRow($sql, [$loginname, $history_info, $actid, $tag]);
        }

        public function get_history_info($loginname){
           $sql = "SELECT *
                FROM history
                WHERE loginname = ?
                ORDER BY acttime desc
                LIMIT 90";
            return $this->getRows($sql, [$loginname]);
        }
    }

    $history = new History();

?>
