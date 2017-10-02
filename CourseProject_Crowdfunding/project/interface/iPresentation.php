<?php
interface iPresentation{
    public function add_presentation($pid,$stored_path,$fname);
    public function get_presentation($pid);
}
