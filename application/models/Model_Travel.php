<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Travel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->config->item('base_url');
        $this->config->item('api_url');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
    }

    function get_travel_plan_list_serverside($post){
        $where = "status!='1'";
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];
        $this->db->group_start()
                ->or_like('travel_plan_id ', $post['search']['value'])
                ->or_like('username', $post['search']['value'])
                ->or_like('designation', $post['search']['value'])
                ->or_like('region_name', $post['search']['value'])
                ->or_like('base_station', $post['search']['value'])
                ->or_like('distance_type', $post['search']['value'])
                ->or_like('base_station', $post['search']['value'])
                ->group_end();
        $data['data'] = $this->db
                            ->order_by($order_col, $order_dir)
                            ->limit($post['length'], $post['start'])
                            ->where($where)
                            ->order_by('planned_date', 'DESC')
                            ->get('tbl_travel_plan')
                            ->result_array();
        $data['recordsTotal'] = $this->db->count_all_results('tbl_travel_plan');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function get_travel_plan_by_user_id($user_id){
        $user_id_data_check = $this->db
                                ->select('*')
                                ->where('user_id', $user_id)
                                ->get('tbl_travel_plan')
                                ->result_array();
        if(count($user_id_data_check)>0){
            $pending = "status != 1 AND travel_end_status != 1";
            $where = "status != 0 AND travel_end_status != 1";
            $result['status'] = true;
            $result['accepted_travel_plan'] = $this->db
                        ->select('*')
                        ->where('user_id', $user_id)
                        ->where($where)
                        ->limit(7)
                        ->order_by('planned_date','DESC')
                        ->get('tbl_travel_plan')
                        ->result_array();
            $result['pending_travel_plan'] = $this->db
                                                ->select('*')
                                                ->where('user_id', $user_id)
                                                ->where($pending)
                                                ->limit(7)
                                                ->order_by('planned_date', 'DESC')
                                                ->get('tbl_travel_plan')
                                                ->result_array();

            // $accepted_route_details_array = explode(",",$result['accepted_travel_plan']['route_ids']);
            // $pending_route_details_array = explode(",",$result['pending_travel_plan']['route_ids']);
            // for($i = 0; $i<sizeof($accepted_route_details_array); $i++){
            //     $accepted_route_ids_array[$i] = $this->db
            //                             ->select('route_no, route_name, route_details')
            //                             ->where('route_id', $accepted_route_details_array[$i])
            //                             ->get('tbl_saved_routes')
            //                             ->row_array();
            // }
            // for($i = 0; $i<sizeof($pending_route_details_array); $i++){
            //     $pending_route_ids_array[$i] = $this->db
            //                             ->select('route_no, route_name, route_details')
            //                             ->where('route_id', $pending_route_details_array[$i])
            //                             ->get('tbl_saved_routes')
            //                             ->row_array();           
            // }
            // $result['accepted_route_details'] = $accepted_route_ids_array;
            // $result['pending_route_details'] = $pending_route_ids_array;
            return $result;
        }else{
            $result['status'] = false;
            $result['accepted_travel_plan'] = [];
            $result['pending_travel_plan'] = [];
            return $result;
        }
        
    }

    function getTravelPlanDateWise($post){
        $where = "status != '0'";
        $date_check = $this->db
                        ->select('planned_date, status')
                        ->where('planned_date', $post['date'])
                        ->where('user_id', $post['user_id'])
                        ->get('tbl_travel_plan')
                        ->row_array();
        if($date_check['status'] == 0){
            $result['status'] = false;
            $result['data'] = [];
            return $result;
        }
        if($date_check>0){
            $result['status'] = true;
            $number_of_routes = $this->db
                                    ->select('travel_plan_id, route_ids')
                                    ->where('planned_date', $post['date'])
                                    ->where('user_id', $post['user_id'])
                                    ->get('tbl_travel_plan')
                                    ->row_array();

            $result['details'] = $this->db
                    ->select('*')
                    ->where($where)
                    ->where('user_id', $post['user_id'])
                    ->where('planned_date', $post['date'])
                    ->get('tbl_travel_plan')
                    ->row_array();

            $route_ids_array = explode(",",$number_of_routes['route_ids']);
            for($i = 0; $i<sizeof($route_ids_array); $i++){
                $route_ids_array[$i] = $this->db
                                        ->select('travel_plan_id, route_id, route_no, route_name, route_details')
                                        ->where('travel_plan_id', $number_of_routes['travel_plan_id'])
                                        ->where('planned_date', $post['date'])
                                        ->where('user_id', $post['user_id'])
                                        ->where('route_id', $route_ids_array[$i])
                                        ->get('tbl_travel_plan_details')
                                        ->row_array();
            
            }
            $result['daily_planned_routes'] = $route_ids_array;
            return $result;
        }else{
            $result['status'] = false;
            $result['data'] = [];
            return $result;
        }
        
    }

    function accept_travel_plan($post){
        $acceptedby = $this->session->userdata('username');
        $result = $this->db
                    ->where('travel_plan_id', $post)
                    ->set('status', '1')
                    ->set('acceptedby', $acceptedby)
                    ->update('tbl_travel_plan');
        return $result;
    }

    function get_budget_claim_list_serverside($post){
        $where = "approved_status != '1' AND travel_end_status != 0 AND decline_status != 1";
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];
        $this->db->select('*');
        $this->db->select('(SELECT base_station FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS base_station');
        $this->db->select('(SELECT sub_region_name FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS travelled_to');
        $this->db->select('(SELECT filename FROM tbl_travel_bill_pics WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS bill_image');
        // $this->db->select('(SELECT route_name FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS route_name');
        // $this->db->select('(SELECT route_details FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS route_details');
        $this->db->group_start()
                ->or_like('travel_plan_id ', $post['search']['value'])
                ->or_like('username', $post['search']['value'])
                ->or_like('designation', $post['search']['value'])
                ->or_like('distance_type', $post['search']['value'])
                ->group_end();
        $data['data'] = $this->db
                            ->order_by($order_col, $order_dir)
                            ->limit($post['length'], $post['start'])
                            ->where($where)
                            ->order_by('planned_date', 'DESC')
                            ->get('tbl_budget_claim_cost_details')
                            ->result_array();
        $data['recordsTotal'] = $this->db->count_all_results('tbl_budget_claim_cost_details');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function save_travel_cost_details_from_phone($post){
        $designation = $post['designation'];
        $distance_type = $post['distance_type'];
        $voucher_status = $post['voucher_status'];
        $city_type = $post['city_type'];

        //return $designation;
        $date_check = $this->db
                          ->select('planned_date')
                          ->where('planned_date', $post['planned_date'])
                          ->where('user_id', $post['user_id'])
                          ->get('tbl_budget_claim_cost_details')
                          ->row_array();

        if($date_check>0){
            $result['status'] = "8";
            $result['data'] = [];
            return $result;
        }
        
        $travel_plan_id_check = $this->db
                                    ->select('travel_plan_id')
                                    ->where('travel_plan_id', $post['travel_plan_id'])
                                    ->get('tbl_budget_claim_cost_details')
                                    ->row_array();
        if($travel_plan_id_check>0){
            $result['status'] = "5";
            $result['data'] = [];
            return $result;
        }

        // if($designation == "RSM" && $distance_type == "City to City" && $voucher_status == "No Voucher" && $city_type == "Inside Dhaka"){

        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'RSM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
            
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('no_voucher_rent_inside_dhaka')
        //                                 ->where('designation_name', 'RSM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['no_voucher_rent_inside_dhaka'];

        // }else if($designation == "RSM" && $distance_type == "City to City" && $voucher_status == "No Voucher" && $city_type == "Other Division"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'RSM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('no_voucher_house_rent_divisional')
        //                                 ->where('designation_name', 'RSM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['no_voucher_house_rent_divisional'];
            
        // }else if($designation == "RSM" && $distance_type == "City to City" && $voucher_status == "No Voucher" && $city_type == "Other District"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'RSM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('no_voucher_house_rent_others')
        //                                 ->where('designation_name', 'RSM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['no_voucher_house_rent_others'];

        // }else if($designation == "RSM" && $distance_type == "City to City" && $voucher_status == "With Voucher" && $city_type == "Inside Dhaka"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'RSM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('hotel_rent_dhaka')
        //                                 ->where('designation_name', 'RSM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['hotel_rent_dhaka'];

        // }else if($designation == "RSM" && $distance_type == "City to City" && $voucher_status == "With Voucher" && $city_type == "Other Division"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'RSM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('divisional_hotel_rent')
        //                                 ->where('designation_name', 'RSM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['divisional_hotel_rent'];

        // }else if($designation == "RSM" && $distance_type == "City to City" && $voucher_status == "With Voucher" && $city_type == "Other District"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'RSM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('other_hotel_rent')
        //                                 ->where('designation_name', 'RSM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['other_hotel_rent'];

        // }else if($designation == "ASM" && $distance_type == "City to City" && $voucher_status == "No Voucher" && $city_type == "Inside Dhaka"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'ASM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('no_voucher_rent_inside_dhaka')
        //                                 ->where('designation_name', 'ASM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['no_voucher_rent_inside_dhaka'];

        // }else if($designation == "ASM" && $distance_type == "City to City" && $voucher_status == "No Voucher" && $city_type == "Other Division"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'ASM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('no_voucher_house_rent_divisional')
        //                                 ->where('designation_name', 'ASM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['no_voucher_house_rent_divisional'];

        // }else if($designation == "ASM" && $distance_type == "City to City" && $voucher_status == "No Voucher" && $city_type == "Other District"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'ASM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('no_voucher_house_rent_others')
        //                                 ->where('designation_name', 'ASM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['no_voucher_house_rent_others'];

        // }else if($designation == "ASM" && $distance_type == "City to City" && $voucher_status == "With Voucher" && $city_type == "Inside Dhaka"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'ASM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('hotel_rent_dhaka')
        //                                 ->where('designation_name', 'ASM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['hotel_rent_dhaka'];

        // }else if($designation == "ASM" && $distance_type == "City to City" && $voucher_status == "With Voucher" && $city_type == "Other Division"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'ASM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('divisional_hotel_rent')
        //                                 ->where('designation_name', 'ASM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['divisional_hotel_rent'];

        // }else if($designation == "ASM" && $distance_type == "City to City" && $voucher_status == "With Voucher" && $city_type == "Other District"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'ASM')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('other_hotel_rent')
        //                                 ->where('designation_name', 'ASM')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['other_hotel_rent'];
                                                
        // }else if($designation == "TSE" && $distance_type == "City to City" && $voucher_status == "No Voucher" && $city_type == "Inside Dhaka"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'TSE')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('no_voucher_rent_inside_dhaka')
        //                                 ->where('designation_name', 'TSE')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['no_voucher_rent_inside_dhaka'];

        // }else if($designation == "TSE" && $distance_type == "City to City" && $voucher_status == "No Voucher" && $city_type == "Other Division"){
        //     $food_allowance = $this->db
        //                                 ->select('daily_food_allowance_for_travel')
        //                                 ->where('designation_name', 'TSE')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('no_voucher_house_rent_divisional')
        //                                 ->where('designation_name', 'TSE')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['no_voucher_house_rent_divisional'];

        // }else if($designation == "TSE" && $distance_type == "City to City" && $voucher_status == "No Voucher" && $city_type == "Other District"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'TSE')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('no_voucher_house_rent_others')
        //                                 ->where('designation_name', 'TSE')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['no_voucher_house_rent_others'];

        // }else if($designation == "TSE" && $distance_type == "City to City" && $voucher_status == "With Voucher" && $city_type == "Inside Dhaka"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'TSE')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('hotel_rent_dhaka')
        //                                 ->where('designation_name', 'TSE')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['hotel_rent_dhaka'];

        // }else if($designation == "TSE" && $distance_type == "City to City" && $voucher_status == "With Voucher" && $city_type == "Other Division"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'TSE')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('divisional_hotel_rent')
        //                                 ->where('designation_name', 'TSE')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['divisional_hotel_rent'];

        // }else if($designation == "TSE" && $distance_type == "City to City" && $voucher_status == "With Voucher" && $city_type == "Other District"){
        //     $food_allowance = $this->db
        //                         ->select('daily_food_allowance_for_travel')
        //                         ->where('designation_name', 'TSE')
        //                         ->get('tbl_allowance_city_to_city_per_day')
        //                         ->row_array();
        //     $hotel_rent_allowance = $this->db
        //                                 ->select('other_hotel_rent')
        //                                 ->where('designation_name', 'TSE')
        //                                 ->get('tbl_allowance_city_to_city_per_day')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance_for_travel'];
        //     $post['hotel_rent_allowance'] = $hotel_rent_allowance['other_hotel_rent'];

        // }else if($designation == "RSM" && $distance_type == "Within City"){
        //     $food_allowance = $this->db
        //                                 ->select('daily_food_allowance')
        //                                 ->where('designation_name', 'RSM')
        //                                 ->get('tbl_allowance_within_city')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance'];           

        // }else if($designation == "ASM" && $distance_type == "Within City"){
        //     $food_allowance = $this->db
        //                                 ->select('daily_food_allowance')
        //                                 ->where('designation_name', 'ASM')
        //                                 ->get('tbl_allowance_within_city')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance'];

        // }else if($designation == "TSE" && $distance_type == "Within City"){
        //     $food_allowance = $this->db
        //                                 ->select('daily_food_allowance')
        //                                 ->where('designation_name', 'TSE')
        //                                 ->get('tbl_allowance_within_city')
        //                                 ->row_array();

        //     $post['food_allowance'] = $food_allowance['daily_food_allowance'];

        // }else{
        //     return false;
        // }
        
        $result['data'] = $this->db
                    ->insert('tbl_budget_claim_cost_details', $post);
        if($result['data']){
            $result['status'] = "1";
            $result['data'] = [];
            return $result;
        }
    }

    function dayTrackerEnd($post){
        $other_data = $this->db
                        ->select('planned_date')
                        ->where('travel_plan_id', $post['travel_plan_id'])
                        ->get('tbl_travel_plan')
                        ->row_array();
        $post['travel_date'] = $other_data['planned_date'];
        $post['day_end_status'] = '1';

        $result['data'] = $this->db
                            ->set('day_end_status', $post['day_end_status'])
                            ->set('day_end', $post['day_end'])
                            ->set('end_lat', $post['end_lat'])
                            ->set('end_lng', $post['end_lng'])
                            ->where('travel_plan_id', $post['travel_plan_id'])
                            ->where('user_id', $post['user_id'])
                            ->update('tbl_user_time_travel_tracking');
        if($result['data']){
            $where = "travel_start_status != '0'";
            $travel_plan_table_day_end_status_change = $this->db
                                                        ->set('travel_end_status', '1')
                                                        ->where($where)
                                                        ->where('travel_plan_id', $post['travel_plan_id'])
                                                        ->update('tbl_travel_plan');
            if($travel_plan_table_day_end_status_change){
                $budget_claim_table_travel_end_status = $this->db
                                                            ->set('travel_end_status', '1')
                                                            ->where('travel_plan_id', $post['travel_plan_id'])
                                                            ->update('tbl_budget_claim_cost_details');
                if($budget_claim_table_travel_end_status){
                    $result['status'] = "1";
                    return $result;
                }else{
                    $result['status'] = '0';
                    return $result;
                }
            }
        } 
}

    function dayTrackerStart($post){
        $travel_id_data_check = $this->db
                                    ->select('*')
                                    ->where('travel_plan_id', $post['travel_plan_id'])
                                    ->get('tbl_user_time_travel_tracking')
                                    ->row_array();
        if($travel_id_data_check>0){
            $result['status'] = "5";
            $result['data'] = [];
            return $result;
        }

        $other_data = $this->db
                        ->select('planned_date')
                        ->where('travel_plan_id', $post['travel_plan_id'])
                        ->get('tbl_travel_plan')
                        ->row_array();
        $post['travel_date'] = $other_data['planned_date'];
        $post['start_day_status'] = '1';

        $result['data'] = $this->db
                            ->insert('tbl_user_time_travel_tracking', $post);
        if($result['data']){
            $where = "travel_start_status != '1' AND travel_end_status != '1'";
            $start_day_status_in_tbl_travel_plan = $this->db
                                                    ->set('travel_start_status', '1')
                                                    ->where($where)
                                                    ->where('travel_plan_id', $post['travel_plan_id'])
                                                    ->update('tbl_travel_plan');
            
            if($start_day_status_in_tbl_travel_plan){
                $end_status_in_travel_plan_cost_details = $this->db
                                                            ->set('travel_end_status', '1')
                                                            ->where('travel_plan_id', $post['travel_plan_id'])
                                                            ->update('tbl_budget_claim_cost_details'); 
                if($end_status_in_travel_plan_cost_details){
                    $result['status'] = "1";
                    return $result;
                }
            }else{
                $result['status'] = "0";
                return $result;
            }
        } 
    }

    function approve_budget_claim($post){
        $data['admin_remarks'] = $post['admin_remarks'];
        $data['total_budget_claim'] = $post['total_budget_claim'];
        $data['approved_status'] = "1";
        $data['approvedby'] = $this->session->userdata('username');
        $result = $this->db
                    ->where('travel_plan_id', $post['travel_plan_id'])
                    ->update('tbl_budget_claim_cost_details', $data);
        return $result;
    }

    function decline_budget_claim($post){
        $data['admin_remarks'] = $post['admin_remarks'];
        $data['total_budget_claim'] = $post['total_budget_claim'];
        $data['decline_status'] = "1";
        $data['declinedby'] = $this->session->userdata('username');
        $result = $this->db
                    ->where('travel_plan_id', $post['travel_plan_id'])
                    ->update('tbl_budget_claim_cost_details', $data);
        return $result;
    }

    function insert_travel_bill_pic($data) {
        $result = $this->db->insert('tbl_travel_bill_pics', $data);
        return $result;
        // Important Line
        //return $this->db->affected_rows();
    }

    function get_declined_budget_claim_list_serverside($post){
        $where = "approved_status != '1' AND travel_end_status != 0 AND decline_status != 0";
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];
        $this->db->select('*');
        $this->db->select('(SELECT base_station FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS base_station');
        $this->db->select('(SELECT sub_region_name FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS travelled_to');
        $this->db->select('(SELECT filename FROM tbl_travel_bill_pics WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS bill_image');

        // $this->db->select('(SELECT route_name FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS route_name');
        // $this->db->select('(SELECT route_details FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS route_details');
        $this->db->group_start()
                ->or_like('travel_plan_id ', $post['search']['value'])
                ->or_like('username', $post['search']['value'])
                ->or_like('designation', $post['search']['value'])
                ->or_like('distance_type', $post['search']['value'])
                ->group_end();
        $data['data'] = $this->db
                            ->order_by($order_col, $order_dir)
                            ->limit($post['length'], $post['start'])
                            ->where($where)
                            ->order_by('planned_date', 'DESC')
                            ->get('tbl_budget_claim_cost_details')
                            ->result_array();
        $data['recordsTotal'] = $this->db->count_all_results('tbl_budget_claim_cost_details');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function get_approved_budget_claim_list_serverside($post){
        $where = "approved_status != '0' AND travel_end_status != 0 AND decline_status != 1";
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];
        $this->db->select('*');
        $this->db->select('(SELECT base_station FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS base_station');
        $this->db->select('(SELECT sub_region_name FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS travelled_to');
        $this->db->select('(SELECT filename FROM tbl_travel_bill_pics WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS bill_image');

        // $this->db->select('(SELECT route_name FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS route_name');
        // $this->db->select('(SELECT route_details FROM tbl_travel_plan WHERE travel_plan_id = tbl_budget_claim_cost_details.travel_plan_id LIMIT 1) AS route_details');
        $this->db->group_start()
                ->or_like('travel_plan_id ', $post['search']['value'])
                ->or_like('username', $post['search']['value'])
                ->or_like('designation', $post['search']['value'])
                ->or_like('distance_type', $post['search']['value'])
                ->group_end();
        $data['data'] = $this->db
                            ->order_by($order_col, $order_dir)
                            ->limit($post['length'], $post['start'])
                            ->where($where)
                            ->order_by('planned_date', 'DESC')
                            ->get('tbl_budget_claim_cost_details')
                            ->result_array();
        $data['recordsTotal'] = $this->db->count_all_results('tbl_budget_claim_cost_details');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function get_accepted_travel_plan_list_serverside($post){
        $where = "status!='0'";
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];
        $this->db->group_start()
                ->or_like('travel_plan_id ', $post['search']['value'])
                ->or_like('username', $post['search']['value'])
                ->or_like('designation', $post['search']['value'])
                ->or_like('region_name', $post['search']['value'])
                ->or_like('base_station', $post['search']['value'])
                ->or_like('distance_type', $post['search']['value'])
                ->or_like('base_station', $post['search']['value'])
                ->group_end();
        $data['data'] = $this->db
                            ->order_by($order_col, $order_dir)
                            ->limit($post['length'], $post['start'])
                            ->where($where)
                            ->order_by('planned_date', 'DESC')
                            ->get('tbl_travel_plan')
                            ->result_array();
        $data['recordsTotal'] = $this->db->count_all_results('tbl_travel_plan');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function get_incomplete_travel_plan_list_serverside($post){
        $where = "status!='0' AND travel_end_status != '1'";
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];
        $this->db->group_start()
                ->or_like('travel_plan_id ', $post['search']['value'])
                ->or_like('username', $post['search']['value'])
                ->or_like('designation', $post['search']['value'])
                ->or_like('region_name', $post['search']['value'])
                ->or_like('base_station', $post['search']['value'])
                ->or_like('distance_type', $post['search']['value'])
                ->or_like('base_station', $post['search']['value'])
                ->group_end();
        $data['data'] = $this->db
                            ->order_by($order_col, $order_dir)
                            ->limit($post['length'], $post['start'])
                            ->where($where)
                            ->order_by('planned_date', 'DESC')
                            ->get('tbl_travel_plan')
                            ->result_array();
        $data['recordsTotal'] = $this->db->count_all_results('tbl_travel_plan');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function end_travel_plan($post){
        $where = "status !='0' AND travel_end_status != '1' AND travel_start_status != 0";
        $result = $this->db
                    ->where('');
    }
}