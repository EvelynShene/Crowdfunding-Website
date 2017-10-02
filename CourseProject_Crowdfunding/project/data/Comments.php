<?php
    require_once('../database/Database.php');
    require_once('../interface/iComments.php');
    class Comments extends Database implements iComments{
        public function get_all_comments($loginname)
        {
            $sql = "SELECT *
                    FROM comment natural join project
                    WHERE loginname = ?";
            return $this->getRows($sql, [$loginname]);
        }

        public function get_home_comments($loginname){
            $sql = "SELECT *
                    FROM comment natural join project
                    WHERE loginname = ?
                    LIMIT 3";
            return $this->getRows($sql, [$loginname]);
        }

        public function add_comments($loginname,$pid,$opinion){
            $sql = "INSERT INTO comment VALUES (?,?,now(),?)";
            return $this->insertRow($sql,[$loginname,$pid,$opinion]);
        }

        public function get_project_comments($pid){
            $sql = "SELECT *
                    FROM comment
                    WHERE pid = ?
                    ORDER BY cposttime desc";
            return $this->getRows($sql, [$pid]);
        }
    }
    $comments = new Comments();

?>
