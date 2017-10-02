<?php
    require_once('../database/Database.php');
    require_once('../interface/iFollows.php');
    class Follows extends Database implements iFollows{
        public function get_all_followers($loginname)
        {
            $sql = "SELECT loginname2
                FROM follows
                WHERE loginname1 = ?";
            return $this->getRows($sql, [$loginname]);
        } // end get_all_followers

        public function get_unfollowed_users($loginname){
            $sql = "SELECT * FROM user
                    WHERE loginname <> ? AND loginname not in (SELECT loginname2
                                            FROM follows
                                            WHERE loginname1 = ?)";
            return $this->getRows($sql,[$loginname,$loginname]);
        }

        public function add_follow($loginname1,$loginname2){
            $sql = "INSERT INTO follows(loginname1, loginname2) VALUES (?,?)";
            return $this->insertRow($sql,[$loginname1,$loginname2]);
        }

        public function unfollow($loginname1,$loginname2){
            $sql = "DELETE FROM follows WHERE loginname1 = ? AND loginname2 = ?";
            return $this->deleteRow($sql,[$loginname1,$loginname2]);
        }
    }
    $follows = new Follows();

?>
