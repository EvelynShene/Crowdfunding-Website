<?php
    require_once('../database/Database.php');
    require_once('../interface/iMyprofile.php');
    class Myprofile extends Database implements iMyprofile{
        public function get_profile_info($loginname)
        {
            $sql = "SELECT *
                FROM user
                WHERE loginname = ?";
            return $this->getRow($sql, [$loginname]);
        } // end get_profile_info
    }
    $myprofile = new Myprofile();

?>
