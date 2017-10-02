<?php
interface iProject{
    public function get_all_projects();
    public function get_label_project($category);
    public function get_owner_project($owner);
    public function get_home_project($owner);
    public function get_project_detail($pid);
    public function get_avg_rate($pid);
    public function change_pstatus($pid);
    public function isMy_project($pid,$loginname);
    public function complete_project($pid);
}//end iProject
