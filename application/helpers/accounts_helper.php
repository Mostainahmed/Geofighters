<?php
/**
 * Created by PhpStorm.
 * User: csera
 * Date: 3/2/2020
 * Time: 11:54 PM
 */

function get_client_head($clientid){
    $_ci =& get_instance();
    $client_info = $_ci->db->get_where('tbl_Clients',array('clientid'=>$clientid))->row();
    if(!empty($client_info) && $client_info->head_code !=null){
        return $client_info->head_code;
    }else{
        $ac_receive = 1100110000;
        $head_code = $_ci->db->query("SELECT acc_create_account_head('$clientid',1,'$ac_receive') head_code")->row('head_code');
        return $head_code;
    }
}


function get_vendor_head($clientid){
    $_ci =& get_instance();
    $client_info = $_ci->db->get_where('vendors',array('vendors_id'=>$clientid))->row();
    if(!empty($client_info) && $client_info->head_code !=null){
        return $client_info->head_code;
    }else{
        $ac_payable = 2100050000;
        $head_code = $_ci->db->query("SELECT acc_create_account_head_vendor('$clientid',2,'$ac_payable') head_code")->row('head_code');
        return $head_code;
    }
}