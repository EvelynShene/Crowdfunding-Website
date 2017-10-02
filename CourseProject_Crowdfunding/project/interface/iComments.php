<?php
interface iComments{
	public function get_all_comments($loginname);
    public function get_home_comments($loginname);
    public function add_comments($loginname,$pid,$opinion);
    public function get_project_comments($pid);
}
