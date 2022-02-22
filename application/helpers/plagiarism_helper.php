<?php
//Fungsi untuk pengecekkan hak akses
function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('id_role', $role_id);
    $ci->db->where('id_menu', $menu_id);
    $result = $ci->db->get('access_menu');

    if ($result->num_rows() > 0) {
        return "checked ='checked'";
    }
}
