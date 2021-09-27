<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect(base_url());
    } else {
        $username = $ci->session->userdata('username');
    }
}
