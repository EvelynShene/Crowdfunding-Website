<?php
    require_once('../database/Database.php');
    require_once('../interface/iPledges.php');
    class Pledges extends Database implements iPledges{
        public function get_all_pledges($loginname)
        {
            $sql = "SELECT *
                    FROM (invest natural join request) natural join project
                    WHERE sponsor = ?";
            return $this->getRows($sql, [$loginname]);
        } // end get_all_pledges

        public function get_home_pledges($loginname){
            $sql = "SELECT *
                    FROM (invest natural join request) natural join project
                    WHERE istatus = 'success' and sponsor = ?
                    LIMIT 3";
            return $this->getRows($sql, [$loginname]);
        }

        public function get_all_pledges2($loginname){
            $sql = "SELECT *
                    FROM ((invest natural join request) natural join project) left outer join rate using(sponsor,pid)
                    WHERE sponsor  = ? ";
            return $this->getRows($sql,[$loginname]);
        }

        public function ispledged($sponsor,$rid){
            $sql = "SELECT count(*) as c FROM invest WHERE sponsor = ? AND rid = ?";
            return $this->getRow($sql,[$sponsor,$rid]);
        }

        public function add_pledge($sponsor,$rid,$invest){
            $sql = "INSERT INTO invest VALUES (?,?,?,'pending',now())";
            return $this->insertRow($sql,[$sponsor,$rid,$invest]);
        }

        public function get_invest_statu($sponsor,$rid){
            $sql = "SELECT istatus FROM invest WHERE sponsor = ? AND rid = ?";
            return $this->getRow($sql,[$sponsor,$rid]);
        }

        public function change_all_istatus($rid){
            $sql = "UPDATE invest SET istatus = 'success' WHERE rid = ?";
            return $this->updateRow($sql,[$rid]);
        }
    }
    $pledges = new Pledges();

?>
