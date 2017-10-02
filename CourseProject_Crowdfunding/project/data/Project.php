<?php
    require_once('../database/Database.php');
    require_once('../interface/iProject.php');
    class Project extends Database implements iProject{

        public function get_all_projects(){
            $sql = "SELECT * FROM project";
            return $this->getRows($sql);
        }

        public function get_label_project($category){
            $sql = "SELECT * FROM project WHERE category = ?";
            return $this->getRows($sql,[$category]);
        }

        public function get_owner_project($owner){
            $sql = "SELECT * FROM project WHERE owner = ?";
            return $this->getRows($sql,[$owner]);
        }

        public function get_home_project($owner){
            $sql = "SELECT * FROM project WHERE owner = ? LIMIT 3";
            return $this->getRows($sql,[$owner]);
        }

        public function get_project_detail($pid){
            $sql = "SELECT * FROM project WHERE pid = ?";
            return $this->getRow($sql,[$pid]);
        }

        public function get_avg_rate($pid){
            $sql = "SELECT round(avg(star),2) as avgrate FROM rate WHERE pid = ?";
            return $this->getRow($sql,[$pid]);
        }

        public function add_proj($pname, $loginname, $descrip, $catg)
        {
            $sql = "INSERT INTO project VALUES('',?, ?, ?, ?, ?)";
            return $this->insertRow($sql, [$pname, $loginname, $descrip, $catg, 'idle']);
        }
        public function change_pstatus($pid)
        {
            $sql = "UPDATE project
                SET pstatus = 'request'
                WHERE pid = ?";
            return $this->updateRow($sql, [$pid]);
        }

        public function isMy_project($pid,$loginname){
            $sql = "SELECT * FROM project WHERE pid = ? AND owner = ?";
            return $this->getRow($sql,[$pid,$loginname]);
        }

        public function complete_project($pid){
            $sql = "UPDATE project
                    SET pstatus = 'completed'
                    WHERE pid = ?";
            return $this->updateRow($sql, [$pid]);
        }

    }

    $project = new Project();

?>
