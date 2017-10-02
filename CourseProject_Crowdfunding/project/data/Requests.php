<?php
    require_once('../database/Database.php');
    require_once('../interface/iRequests.php');
    class Requests extends Database implements iRequests{
        public function get_all_requests(){
            $sql = "SELECT *
                    FROM request natural join project";
            return $this->getRows($sql);
        } // end get_all_requests

        public function get_request_detail($rid){
            $sql = "SELECT *
                    FROM request natural join project
                    WHERE rid = ?";
            return $this->getRow($sql,[$rid]);
        }

        public function get_owner_requests($owner){
            $sql = "SELECT * FROM request natural join project WHERE owner = ? ORDER BY pid";
            return $this->getRows($sql,[$owner]);
        }

        public function get_home_requests($owner){
            $sql = "SELECT * FROM request natural join project WHERE owner = ? LIMIT 3";
            return $this->getRows($sql,[$owner]);
        }

        public function get_my_requests($loginname){
            $sql = "SELECT *
                    FROM request natural join project WHERE owner = ?";
            return $this->getRows($sql,[$loginname]);
        }

        public function get_request_sponsors($rid){
            $sql = "SELECT * FROM request natural join invest WHERE rid = ?";
            return $this->getRows($sql,[$rid]);
        }

        public function post_request($pid, $min_amount, $max_amount, $endtime, $planned_compl_time)
        {
        $sql = "INSERT INTO request VALUES('',?, ?, ?, ?, ?, 'pending', now(), '0.00')"        ;
        return $this->insertRow($sql, [$pid, $min_amount, $max_amount, $endtime, $planned_compl_time]);
        }
    }
    $requests = new Requests();
?>
