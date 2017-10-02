<?php
interface iPledges{
	public function get_all_pledges($loginname);
    public function get_home_pledges($loginname);
    public function get_all_pledges2($loginname);
    public function ispledged($sponsor,$rid);
    public function add_pledge($sponsor,$rid,$invest);
    public function get_invest_statu($sponsor,$rid);
    public function change_all_istatus($rid);
}
