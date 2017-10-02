<?php
interface iLikes{
	public function get_all_likes($loginname);
    public function insert_interest_project($loginname, $pid);
    public function remove_interested_project($loginname, $pid);
    public function isliked($loginname,$pid);
}
