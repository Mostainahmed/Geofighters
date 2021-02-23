<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Distributor extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->config->item('base_url');
        $this->config->item('api_url');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
    }

    function get_distributor_list_serverside($post){
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];

        $this->db->select('*');
        $this->db->select('(SELECT assigned_area_name FROM tbl_assigned_area WHERE assigned_area_id = tbl_distributor.assigned_area_id LIMIT 1) AS assigned_area_name');
        $this->db->group_start()->or_like('distributor_name', $post['search']['value'])->or_like('distributor_id', $post['search']['value'])->or_like('distributor_phone_no', $post['search']['value'])->group_end();       
        $data['data'] = $this->db->order_by($order_col, $order_dir)->limit($post['length'], $post['start'])->get('tbl_distributor')->result_array();
        $data['recordsTotal'] = $this->db->count_all_results('tbl_distributor');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function add_distributor($post){
        $post['distributor_id'] = "DR-".mt_rand(100000,999999);
        $post['createdby'] = $this->session->userdata('username');
        $data = $this->db
                    ->select('distributor_id ')
                    ->where('distributor_id ', $post['distributor_id'])
                    ->get('tbl_distributor')
                    ->row_array();
        if($data>0){
            $random_value = "DR-".mt_rand(100000,999999);
            $post['distributor_id '] = $random_value;
        }
        $result = $this->db->insert('tbl_distributor', $post);
        return $result;
    }

    function delete_distributor($post){
        $this->db->where('distributor_id', $post);
        $response = $this->db->delete('tbl_distributor');
        return $response;
    }

    //Mobile API model
    function get_distributor_array(){
        $result = $this->db
                    ->select('distributor_id , distributor_name, distributor_phone_no, region_id, sub_region_id, assigned_area_id')
                    ->get('tbl_distributor')
                    ->result_array();
        return $result;
    }

    function get_distributor_number(){
        return $this->db->count_all_results('tbl_distributor');
    }

    function update_distributor($post){
        $data['distributor_name'] = $post['distributor_name'];
        $data['distributor_phone_no'] = $post['distributor_phone_no'];
        $result = $this->db
                    ->where('distributor_id', $post['distributor_id'])
                    ->update('tbl_distributor', $data);
        return $result;
    }

    function get_distributor_list_by_assigned_area_id($post){
        $result = $this->db
                    ->select("distributor_id , distributor_name")
                    ->where('assigned_area_id', $post)
                    ->get('tbl_distributor')
                    ->result_array();
        return $result;
    }
}