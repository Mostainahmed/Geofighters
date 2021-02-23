<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_User extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->config->item('base_url');
        $this->config->item('api_url');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
    }

    function get_rsm_array(){
        $result = $this->db
                    ->select('user_id , full_name, phone_no')
                    ->get('tbl_rsm')
                    ->result_array();
        return $result;
    }

    function get_asm_array(){
        $result = $this->db
                    ->select('user_id , full_name, phone_no')
                    ->get('tbl_asm')
                    ->result_array();
        return $result;
    }

    function get_tse_array(){
        $result = $this->db
                    ->select('user_id , full_name, phone_no')
                    ->get('tbl_tse')
                    ->result_array();
        return $result;
    }

    function assign_rsm($post){
        $rsm_details = $this->db
                    ->select("*")
                    ->where("user_id", $post["user_id"])
                    ->get('tbl_rsm')
                    ->row_array();
       
        $rsm_data['rsm_name'] = $rsm_details['full_name'];
        $rsm_data['rsm_id'] = $rsm_details['user_id'];
        $rsm_data['is_assigned'] = TRUE;
        $result1 = $this->db
                        ->where("region_id", $post['region_id'])
                        ->set('rsm_id', $rsm_data['rsm_id'])
                        ->set('rsm_name', $rsm_data['rsm_name'])
                        ->set('is_assigned', $rsm_data['is_assigned'])
                        ->update('tbl_regions');
        if($result1){
            $result2 = $this->db
                        ->where("region_id", $post['region_id'])
                        ->set('rsm_id', $rsm_data['rsm_id'])
                        ->set('rsm_name', $rsm_data['rsm_name'])
                        ->update('tbl_sub_regions');
        }else{
            return false;
        }
        if($result2){
            $result3 = $this->db
                        ->where("region_id", $post['region_id'])
                        ->set('rsm_id', $rsm_data['rsm_id'])
                        ->set('rsm_name', $rsm_data['rsm_name'])
                        ->update('tbl_assigned_area');
        }else{
            return false;
        }
        if($result3){
            $result4 = $this->db
                        ->where("region_id", $post['region_id'])
                        ->set('rsm_id', $rsm_data['rsm_id'])
                        ->set('rsm_name', $rsm_data['rsm_name'])
                        ->update('tbl_distributor');
        }
        return $result4;
    }

    function assign_asm($post){
        $rsm_details = $this->db
                    ->select("*")
                    ->where("user_id", $post["user_id"])
                    ->get('tbl_asm')
                    ->row_array();
       
        $rsm_data['asm_name'] = $rsm_details['full_name'];
        $rsm_data['asm_id'] = $rsm_details['user_id'];
        $result1 = $this->db
                        ->where("sub_region_id", $post['sub_region_id'])
                        ->set('asm_id', $rsm_data['asm_id'])
                        ->set('asm_name', $rsm_data['asm_name'])
                        ->update('tbl_sub_regions');
        if($result1){
            $result2 = $this->db
                        ->where("sub_region_id", $post['sub_region_id'])
                        ->set('asm_id', $rsm_data['asm_id'])
                        ->set('asm_name', $rsm_data['asm_name'])
                        ->update('tbl_assigned_area');
        }else{
            return false;
        }
        if($result2){
            $result3 = $this->db
                        ->where("sub_region_id", $post['sub_region_id'])
                        ->set('asm_id', $rsm_data['asm_id'])
                        ->set('asm_name', $rsm_data['asm_name'])
                        ->update('tbl_distributor');
        }
        return $result3;
    }

    function assign_asm_to_rsm($post){
        $rsm_details = $this->db
                    ->select("*")
                    ->where("user_id", $post["rsm_id"])
                    ->get('tbl_rsm')
                    ->row_array();

        $data['rsm_name'] = $rsm_details['full_name'];
        $data['rsm_id'] = $post['rsm_id'];
        $data['is_assigned'] = TRUE;
        $result = $this->db
                    ->where('user_id', $post['asm_id'])
                    ->update('tbl_asm', $data);
        return $result;
    }

    function get_user_list_serverside($post){
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];
        $this->db->group_start()->or_like('username', $post['search']['value'])->or_like('designation', $post['search']['value'])->or_like('fullname', $post['search']['value'])->or_like('nid', $post['search']['value'])->or_like('phone_no', $post['search']['value'])->or_like('email', $post['search']['value'])->group_end();
        $data['data'] = $this->db->order_by($order_col, $order_dir)->limit($post['length'], $post['start'])->get('tbl_users')->result_array();
      
        $data['recordsTotal'] = $this->db->count_all_results('tbl_users');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function update_user($post){
        $post['updatedby'] = $this->session->userdata('username');
        $this->db->where('user_id', $post['user_id']);
        $response = $this->db->update('tbl_users', $post);
        return $response;
    }

    function get_city_to_city_allowance(){
        $general_data = $this->db
                    ->select('designation_name, transport_mode, daily_food_allowance_for_travel')
                    ->get('tbl_allowance_city_to_city_per_day')
                    ->result_array();
        $dhaka_data = $this->db
                        ->select('designation_name, hotel_rent_dhaka, no_voucher_rent_inside_dhaka')
                        ->get('tbl_allowance_city_to_city_per_day')
                        ->result_array();
        
        $other_division = $this->db
                            ->select('designation_name, divisional_hotel_rent, no_voucher_house_rent_divisional')
                            ->get('tbl_allowance_city_to_city_per_day')
                            ->result_array();

        $other_district = $this->db
                            ->select('designation_name, other_hotel_rent, no_voucher_house_rent_others')
                            ->get('tbl_allowance_city_to_city_per_day')
                            ->result_array();
        $result = [
            "common_data" => $general_data,
            "dhaka" => $dhaka_data,
            "other_division" => $other_division,
            "other_district" => $other_district
        ];
        return $result;
    }

    function get_inter_city_allowance(){
        $result = $this->db
                    ->select('*')
                    ->get('tbl_allowance_within_city')
                    ->result_array();
        return $result;
    }

    function get_user_list(){
        $result = $this->db
                    ->select('fullname, user_id')
                    ->get('tbl_users')
                    ->result_array();
        return $result;
    }

    function assign_base_station($post){
        $data['base_station_id'] = $post['base_station'];
        $data['user_id'] = $post['user_id'];
        $data['region_id'] = $post['region_id'];

        $base_station = $this->db
                            ->select('sub_region_id, sub_region_name')
                            ->where('sub_region_id', $data['base_station_id'])
                            ->get('tbl_sub_regions')
                            ->row_array();

        $user_details = $this->db
                            ->select('*')
                            ->where('user_id', $post['user_id'])
                            ->get('tbl_users')
                            ->row_array();

        $update_usr_base = $this->db
                    ->set('base_station_id', $data['base_station_id'])
                    ->set('base_station', $base_station['sub_region_name'])
                    ->where('user_id', $data['user_id'])
                    ->update('tbl_users');
        if($update_usr_base){
            if($user_details['designation'] == "RSM"){
                $result = $this->db
                            ->set('base_station_id', $base_station['sub_region_id'])
                            ->set('base_station', $base_station['sub_region_name'])
                            ->where('user_id', $data['user_id'])
                            ->update('tbl_rsm');
            }else if($user_details['designation'] == "ASM"){
                $result = $this->db
                            ->set('base_station_id', $base_station['sub_region_id'])
                            ->set('base_station', $base_station['sub_region_name'])
                            ->where('user_id', $data['user_id'])
                            ->update('tbl_asm');
            }else if($user_details['designation'] == "TSE"){
                $result = $this->db
                            ->set('base_station_id', $base_station['sub_region_id'])
                            ->set('base_station', $base_station['sub_region_name'])
                            ->where('user_id', $data['user_id'])
                            ->update('tbl_tse');
            }
        }
        return $result;
    }

    function getUserName($post){
        $result = $this->db
                    ->select('username')
                    ->where('user_id', $post)
                    ->get('tbl_users')
                    ->row_array();
        return $result['username'];
    }
}