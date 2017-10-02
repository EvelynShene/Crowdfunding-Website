<?php
interface iFollows{
	public function get_all_followers($loginname);
    public function get_unfollowed_users($loginname);
    public function add_follow($loginname1,$loginname2);
    public function unfollow($loginname1,$loginname2);
}
