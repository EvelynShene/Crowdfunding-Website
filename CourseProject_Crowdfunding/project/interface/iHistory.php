<?php
interface iHistory{
	public function get_history_info($loginname);
	public function save_history_info($loginname, $history_info, $actid, $tag);
}
