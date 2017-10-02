<?php
interface iCategory{
	public function get_all_categories();
    public function get_interested_categories($loginname);
    public function get_other_categories($loginname);
    public function insert_interest_category($loginname, $category);
    public function remove_interested_category($loginname, $category);
}
