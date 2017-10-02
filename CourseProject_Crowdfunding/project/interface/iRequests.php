<?php
interface iRequests{
	public function get_all_requests();
	public function get_request_detail($rid);
    public function get_owner_requests($owner);
    public function get_home_requests($owner);
    public function get_my_requests($loginname);
    public function get_request_sponsors($rid);
    public function post_request($pid, $min_amount, $max_amount, $endtime, $planned_compl_time);
}
