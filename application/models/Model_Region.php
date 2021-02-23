<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Region extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->config->item('base_url');
        $this->config->item('api_url');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
    }
    
    function add_region($post){
        $post['createdby'] = $this->session->userdata('username');
        $post['region_id'] = "R-".mt_rand(100,999);
        $data = $this->db
                    ->select('region_id')
                    ->where('region_id', $post['region_id'])
                    ->get('tbl_regions')
                    ->row_array();
        if($data>0){
            $random_value = "R-".mt_rand(100,999);
            $post['region_id'] = $random_value;
        }
        $data_region_name = $this->db
                    ->select('region_name')
                    ->where('region_name', $post['region_name'])
                    ->get('tbl_regions')
                    ->row_array();
        if($data_region_name>0){
            return 3;
        }else{
            $result = $this->db->insert('tbl_regions', $post);
            return $result;
        }
    }

    function get_region_array(){
        $result = $this->db
                    ->select('region_id, region_name, rsm_name')
                    ->get('tbl_regions')
                    ->result_array();
        return $result;
    }

    function get_region_array_for_rsm(){
        $result = $this->db
                    ->select('region_id, region_name, rsm_name')
                    ->where("is_assigned!='1'")
                    ->get('tbl_regions')
                    ->result_array();
        return $result;
    }

    function get_sub_region_array(){
        $this->db->select("SR.sub_region_id,SR.sub_region_name,RN.region_name");
        $this->db->join('tbl_regions as RN', 'RN.region_id = SR.region_id');
        return $this->db->get_where('tbl_sub_regions as SR')->result_array();
    }

    function get_region_number(){
        return $this->db->count_all_results('tbl_regions');
    }

    function get_sub_region_number(){
        return $this->db->count_all_results('tbl_sub_regions');
    }

    function get_route_number(){
        return $this->db->count_all_results('tbl_assigned_area');
    }

    function add_sub_region($post){
        $post['createdby'] = $this->session->userdata('username');
        $post['sub_region_id'] = "SR-".mt_rand(1000,9999);
        $data = $this->db
                    ->select('sub_region_id')
                    ->where('sub_region_id', $post['sub_region_id'])
                    ->get('tbl_sub_regions')
                    ->row_array();
        if($data>0){
            $random_value = "SR-".mt_rand(1000,9999);
            $post['sub_region_id'] = $random_value;
        }
        $data_sub_region_name = $this->db
                    ->select('sub_region_name')
                    ->where('sub_region_name', $post['sub_region_name'])
                    ->get('tbl_sub_regions')
                    ->row_array();
        if($data_sub_region_name>0){
            return 3;
        }else{
            $region_name = $this->db
                                ->select('region_name')
                                ->where('region_id', $post['region_id'])
                                ->get('tbl_regions')
                                ->row_array();
            $post['region_name'] = $region_name['region_name'];
            $result = $this->db->insert('tbl_sub_regions', $post);
            return $result;
        }
    }

    function get_sub_regions_by_regionid($regionid){
        $result = $this->db
                    ->select("sub_region_id, sub_region_name")
                    ->where('region_id', $regionid)
                    ->get('tbl_sub_regions')
                    ->result_array();
        return $result;
    }

    function add_routes($post){
        $post['createdby'] = $this->session->userdata('username');
        $post['assigned_area_id'] = "AR-".mt_rand(10000,99999);
        $data = $this->db
                    ->select('assigned_area_id')
                    ->where('assigned_area_id', $post['assigned_area_id'])
                    ->get('tbl_assigned_area')
                    ->row_array();
        if($data>0){
            $random_value = "AR-".mt_rand(10000,99999);
            $post['assigned_area_id'] = $random_value;
        }

        $data_area_name = $this->db
                    ->select('assigned_area_name')
                    ->where('assigned_area_name', $post['assigned_area_name'])
                    ->get('tbl_assigned_area')
                    ->row_array();
        if($data_area_name>0){
            return 3;
        }else{
            $result = $this->db->insert('tbl_assigned_area', $post);
            return $result;
        }
    }

    function get_routes_list_by_sub_region_id($post){
        $result = $this->db
                    ->select("assigned_area_id, assigned_area_name")
                    ->where('sub_region_id', $post)
                    ->get('tbl_assigned_area')
                    ->result_array();
        return $result;
    }

    //Mobile API model
    function get_sub_region_array_for_mobile(){
        $result = $this->db
                    ->select('sub_region_id, sub_region_name, region_id, rsm_id, asm_id')
                    ->get('tbl_sub_regions')
                    ->result_array();
        return $result;
    }

    //Mobile API model
    function get_area_array(){
        $result = $this->db
                    ->select('assigned_area_id, assigned_area_name, region_id, sub_region_id, tse_id')
                    ->get('tbl_assigned_area')
                    ->result_array();
        return $result;
    }

    function get_region_list_serverside($post){
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];
        $this->db->group_start()->or_like('region_id  ', $post['search']['value'])->or_like('region_name', $post['search']['value'])->or_like('rsm_name', $post['search']['value'])->group_end();
        $data['data'] = $this->db->order_by($order_col, $order_dir)->limit($post['length'], $post['start'])->get('tbl_regions')->result_array();
      
        $data['recordsTotal'] = $this->db->count_all_results('tbl_regions');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function get_sub_region_list_serverside($post){
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];
        $this->db->select('*');
        $this->db->select('(SELECT region_name FROM tbl_regions WHERE region_id = tbl_sub_regions.region_id LIMIT 1) AS region_name');
        $this->db->group_start()
                ->or_like('sub_region_id', $post['search']['value'])
                ->or_like('sub_region_name', $post['search']['value'])
                ->or_like('rsm_name', $post['search']['value'])
                ->or_like('asm_name', $post['search']['value'])->group_end();    
        $data['data'] = $this->db->order_by($order_col, $order_dir)->limit($post['length'], $post['start'])->get('tbl_sub_regions')->result_array();      
        $data['recordsTotal'] = $this->db->count_all_results('tbl_sub_regions');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function get_routes_list_serverside($post){
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];

        $this->db->select('*');
        $this->db->select('(SELECT region_name FROM tbl_regions WHERE region_id = tbl_assigned_area.region_id LIMIT 1) AS region_name');
        $this->db->select('(SELECT sub_region_name FROM tbl_sub_regions WHERE sub_region_id = tbl_assigned_area.sub_region_id LIMIT 1) AS sub_region_name');
        $this->db->group_start()
                ->or_like('assigned_area_id', $post['search']['value'])
                ->or_like('assigned_area_name', $post['search']['value'])
                ->or_like('region_id', $post['search']['value'])
                ->or_like('rsm_name', $post['search']['value'])
                ->or_like('asm_name', $post['search']['value'])
                ->or_like('tse_name', $post['search']['value'])->group_end();       
        $data['data'] = $this->db->order_by($order_col, $order_dir)->limit($post['length'], $post['start'])->get('tbl_assigned_area')->result_array();
        $data['recordsTotal'] = $this->db->count_all_results('tbl_assigned_area');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function update_sub_region($post){
        $data['sub_region_name'] = $post['sub_region_name'];
        $result = $this->db
                    ->where('sub_region_id', $post['sub_region_id'])
                    ->update('tbl_sub_regions', $data);
        return $result;
    }

    function update_region($post){
        $data['region_name'] = $post['region_name'];
        $result = $this->db
                    ->where('region_id', $post['region_id'])
                    ->update('tbl_regions', $data);
        return $result;
    }

    function update_routes($post){
        $data['assigned_area_name'] = $post['assigned_area_name'];
        $result = $this->db
                    ->where('assigned_area_id', $post['assigned_area_id'])
                    ->update('tbl_assigned_area', $data);
        return $result;
    }

    function save_routes_from_phone($post){
        $route_id = "ROU-".mt_rand(100,999);
        $post['route_id'] = $route_id;
        $route_details_check = $this->db
                                ->select('route_details')
                                ->where('route_details', $post['route_details'])
                                ->get('tbl_saved_routes')
                                ->row_array();
        if($route_details_check>0){
            return false;
        }
        $route_id_check = $this->db
                            ->select('route_id')
                            ->where('route_id', $post['route_id'])
                            ->get('tbl_saved_routes')
                            ->row_array();
        
        if($route_id_check>0){
            $route_id = "ROU-".mt_rand(100,999);
            $post['route_id'] = $route_id;
        }
        $data = $this->db
                    ->insert('tbl_saved_routes', $post);
        if($data == "1"){
            $row_id = $this->db
                ->select('id')
                ->where('route_id', $route_id)
                ->get('tbl_saved_routes')
                ->row_array();
            $neumeric_id = $row_id['id'];
            $route_no = "Route-".$neumeric_id;
            $route_no_result = $this->db
                        ->set('route_no', $route_no)
                        ->where('route_id', $route_id)
                        ->update('tbl_saved_routes');
            if($route_no_result){
                $result = $this->db
                            ->select('*')
                            ->where('route_no', $route_no)
                            ->get('tbl_saved_routes')
                            ->row_array();
                return $result;
            }
        }else{
            return 0;
        }
    }

    function get_saved_routes_by_user_id($user_id){
        //$where = "status != '0'";
        $result['data'] = $this->db
                    ->select('*')
                    ->where('user_id', $user_id)
                    ->get('tbl_saved_routes')
                    ->result_array();
        $result['number_of_saved_routes'] = count($result['data']);
        return $result;
    }

    function save_tour_plan_from_phone($post){
        $travel_plan_id = "TRAV-".mt_rand(100000, 999999);
        $post['travel_plan_id'] = $travel_plan_id;
        $travel_plan_id_check = $this->db
                            ->select('travel_plan_id')
                            ->where('travel_plan_id', $travel_plan_id)
                            ->get('tbl_travel_plan')
                            ->row_array();
        
        if($travel_plan_id_check>0){
            $travel_plan_id = "TRAV-".mt_rand(100000, 999999);
            $post['travel_plan_id'] = $travel_plan_id;
        }
        $check_duplicate_date_plan = $this->db
                                        ->select('planned_date')
                                        ->where('planned_date', $post['planned_date'])
                                        ->where('username', $post['username'])
                                        ->where('designation', $post['designation'])
                                        ->get('tbl_travel_plan')
                                        ->row_array();
        if($check_duplicate_date_plan>0){
            $result = false;
            return $result;
        }else{
            $route_ids_array = explode(",",$post['route_ids']);
            $result = $this->db
                    ->insert('tbl_travel_plan', $post);
            if($result){
                for($i = 0; $i<sizeof($route_ids_array); $i++){
                    $route_id_wise_route_details = $this->db
                                                    ->select('*')
                                                    ->where('route_id', $route_ids_array[$i])
                                                    ->get('tbl_saved_routes')
                                                    ->row_array();
                    $data['route_id'] = $route_id_wise_route_details['route_id'];
                    $data['route_no'] = $route_id_wise_route_details['route_no'];
                    $data['route_name'] = $route_id_wise_route_details['route_name'];
                    $data['route_details'] = $route_id_wise_route_details['route_details'];
                    $data['travel_plan_id'] = $post['travel_plan_id'];
                    $data['planned_date'] = $post['planned_date'];
                    $data['createdby'] = $post['username'];
                    $data['user_id'] = $post['user_id'];
                    $final_result = $this->db
                                        ->insert('tbl_travel_plan_details', $data);
                    //return $final_result;
                }
            }
            return $final_result;
        }
    }

    function addNewAreaFromPhone($post){
        $user_data = $this->db
                        ->select('username, fullname, designation')
                        ->where('user_id', $post['user_id'])
                        ->get('tbl_users')
                        ->row_array();

        // $region_data = $this->db
        //                 ->select('region_name, is_assigned, rsm_name, rsm_id')
        //                 ->where('region_id', $post['region_id'])
        //                 ->get('tbl_regions')
        //                 ->row_array();

        $sub_region_data = $this->db
                        ->select('sub_region_name, rsm_id, rsm_name, region_id, region_name, asm_id, asm_name')
                        ->where('sub_region_id', $post['sub_region_id'])
                        ->get('tbl_sub_regions')
                        ->row_array();
        
        $area_name_data_check = $this->db
                                    ->select('assigned_area_name')
                                    ->where('assigned_area_name', $post['assigned_area_name'])
                                    ->get('tbl_assigned_area')
                                    ->row_array();

        if($area_name_data_check>0){
            $result['statusCode'] = "3";
            $result['status'] = "Area name exist!";
            return $result;
        }else{
            $data['assigned_area_id'] = "AR-".mt_rand(10000,99999);
            $assigned_area_id = $this->db
                    ->select('assigned_area_id')
                    ->where('assigned_area_id', $data['assigned_area_id'])
                    ->get('tbl_assigned_area')
                    ->row_array();
            if($assigned_area_id>0){
                $random_value = "AR-".mt_rand(10000,99999);
                $data['assigned_area_id'] = $random_value;
            }
            $data['assigned_area_name'] = $post['assigned_area_name'];
            $data['rsm_id'] = $sub_region_data['rsm_id'];
            $data['rsm_name'] = $sub_region_data['rsm_name'];
            $data['asm_id'] = $sub_region_data['asm_id'];
            $data['asm_name'] = $sub_region_data['asm_name'];
            $data['region_id'] = $sub_region_data['region_id'];
            $data['sub_region_id'] = $post['sub_region_id'];
            $data['is_mobile'] = true;
            $data['accepted_status'] = false;
            $data['createdby'] = $user_data['username'];
            $result = $this->db
                        ->insert('tbl_assigned_area', $data);
            if($result){
                $final_result['statusCode'] = "1";
                $final_result['status'] = "Area name added successfully";
                return $final_result;
            }
        }
    }
}