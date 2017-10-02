<?php
    require_once('../database/Database.php');
    require_once('../interface/iLikes.php');
    class Likes extends Database implements iLikes{
        public function get_all_Likes($loginname)
        {
            $sql = "SELECT loginname, pname, description
                    FROM likes natural join project
                    WHERE loginname = ? ";
            return $this->getRows($sql, [$loginname]);
        }

        public function insert_interest_project($loginname, $pid){
            $sql = "INSERT INTO likes(loginname,pid) VALUES (?,?)";
            return $this->insertRow($sql,[$loginname,$pid]);
        }

        public function remove_interested_project($loginname, $pid){
            $sql = "DELETE FROM likes WHERE loginname = ? and pid = ?";
            return $this->deleteRow($sql,[$loginname,$pid]);
        }

        public function isliked($loginname,$pid){
            $sql = "SELECT count(*) as islike FROM likes WHERE loginname = ? AND pid = ?";
            return $this->getRow($sql,[$loginname,$pid]);
        }

    }

    $likes = new Likes();

?>
