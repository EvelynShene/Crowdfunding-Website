<?php
    require_once('../database/Database.php');
    require_once('../interface/iCategory.php');
    class Category extends Database implements iCategory{
        public function get_all_categories()
        {
            $sql = "SELECT *
                FROM category
                ORDER BY category ASC";
            return $this->getRows($sql);
        } // end get_all_categories

        public function get_interested_categories($loginname){
            $sql = "SELECT interest.category
                FROM interest
                WHERE loginname = ? ";
            return $this->getRows($sql,[$loginname]);

        }//end get_interested_categories

        public function get_other_categories($loginname){
            $sql = "SELECT *
                FROM category
                where category not in (SELECT category
                FROM interest
                WHERE loginname = ?)";
            return $this->getRows($sql,[$loginname]);
        }

        public function insert_interest_category($loginname, $category){
            $sql = "INSERT INTO interest values(?,?)";
            return $this->insertRow($sql, [$loginname,$category]);
        }

        public function remove_interested_category($loginname, $category){
            $sql = "DELETE FROM interest WHERE loginname = ? AND category = ?";
            return $this->deleteRow($sql,[$loginname,$category]);
        }
    }

    $category = new Category();

?>
