<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('user_agent');  
        $this->load->model('Model_Authentication');
        $this->load->model('Model_Phone');
        $this->load->model('Model_User');
        $this->load->model('Model_Region');
        $this->load->model('Model_Distributor');
        $this->load->model('Model_Travel');
        header('Content-Type: application/json');
    }

    function userLogin(){
        if(!isset($_POST['phone_no'])){
            $result['statuscode'] = "3";
            $result['status'] = "Phone Number Required";
            echo json_encode($result);
            exit;
        }
        if(!isset($_POST['password'])){
            $result['statuscode'] = "3";
            $result['status'] = "Password Required";
            echo json_encode($result);
            exit;
        }
        $phone = $_POST['phone_no'];
        $password = $_POST['password'];

        if(empty($phone)){
            $result['statuscode'] = "0";
            $result['status'] = "Phone Number field empty";
            echo json_encode($result);
            exit;
        }
        if(empty($password)){
            $result['statuscode'] = "0";
            $result['status'] = "Password field empty";
            echo json_encode($result);
            exit;
        }
        $result = $this->Model_Authentication->authenticate_mobile_user($phone, $password);
        if($result == "failed"){
            $status['statusCode'] = "0";
            $status['status'] = "Login Credentials Didn't match";
            echo json_encode($status);
        }else{
            $status['statusCode'] = "1";
            $status['status'] = "successful";
            $status['data'] = $result;
            echo json_encode($status);
        }
    }

    public function getRegionList(){
        $data['regions'] = $this->Model_Region->get_region_array();
        echo json_encode($data);
    }

    public function getDistributorList(){
        $data['region'] =  $this->Model_Region->get_region_array();
        $data['sub_region'] = $this->Model_Region->get_sub_region_array_for_mobile();
        $data['routes'] = $this->Model_Region->get_routes_array();
        $data['distributor'] = $this->Model_Distributor->get_distributor_array();
        echo json_encode($data);
    }

    public function getAreaListForMakingRoutes(){
        $data['region'] =  $this->Model_Region->get_region_array();
        $data['sub_region'] = $this->Model_Region->get_sub_region_array_for_mobile();
        $data['areas'] = $this->Model_Region->get_area_array();
        echo json_encode($data);
    }

    public function getAllowanceDetails(){
        $data['city_to_city'] = $this->Model_User->get_city_to_city_allowance();
        $data['inter_city'] = $this->Model_User->get_inter_city_allowance();
        echo json_encode($data);
    }

    public function receiveSavedRoutesWithUserID(){
        if(!isset($_POST['user_id']) || !isset($_POST['username']) || !isset($_POST['designation']) || 
        !isset($_POST['region_id']) || !isset($_POST['sub_region_id']) || !isset($_POST['route_name']) || !isset($_POST['route_details'])){
            $result['statuscode'] = "3";
            $result['status'] = "Fields Missing";
            echo json_encode($result);
            exit;
        }
        if(!empty($_POST['user_id']) || !empty($_POST['username']) ||
         !empty($_POST['designation']) || !empty($_POST['region_id']) || 
         !empty($_POST['sub_region_id']) || !empty($_POST['route'])){
            //$data['route_details'] = array();

            $data['user_id'] = $_POST['user_id'];
            $data['username'] = $_POST['username'];
            $data['designation'] = $_POST['designation'];
            $data['region_id'] = $_POST['region_id'];
            $data['sub_region_id'] = $_POST['sub_region_id'];
            $data['route_name'] = $_POST['route_name'];
            $data['route_details'] = $_POST['route_details'];
            $test_result['data'] = $this->Model_Region->save_routes_from_phone($data);
            if(!$test_result['data']){
                $result['statusCode'] = "0";
                $result['status'] = "Route exist!";
                echo json_encode($result);
            }else{
                $result['statusCode'] = "1";
                $result['status'] = "Route Saved Successfully";
                $result['data'] = $test_result['data'];
                echo json_encode($result);
            }
        }else{
            $data['statusCode'] = "0";
            $data['status'] = "failed";
            echo json_encode($data);
        }
    }

    public function weeklyTourPlan(){
        if(!isset($_POST['user_id']) || !isset($_POST['username']) || 
        !isset($_POST['designation']) || 
        !isset($_POST['region_id']) || !isset($_POST['region_name']) || 
        !isset($_POST['sub_region_id']) || !isset($_POST['sub_region_name']) || !isset($_POST['route_ids']) ||
        !isset($_POST['planned_date']) ||
        !isset($_POST['distance_type']) || !isset($_POST['base_station'])){
            $result['statuscode'] = "3";
            $result['status'] = "Fields Missing";
            echo json_encode($result);
            exit;
        }

        if(!empty($_POST['user_id']) || !empty($_POST['username']) ||
         !empty($_POST['designation']) || !empty($_POST['region_id']) || 
         !empty($_POST['region_name']) || !empty($_POST['sub_region_id']) ||
         !empty($_POST['sub_region_name']) || !empty($_POST['route_ids']) || !empty($_POST['planned_date']) || 
         !empty($_POST['distance_type']) || 
         !empty($_POST['base_station'])){
            $data['user_id'] = $_POST['user_id'];
            $data['username'] = $_POST['username'];
            $data['designation'] = $_POST['designation'];
            $data['region_id'] = $_POST['region_id'];
            $data['region_name'] = $_POST['region_name'];
            $data['sub_region_id'] = $_POST['sub_region_id'];
            $data['sub_region_name'] = $_POST['sub_region_name'];
            $data['route_ids'] = $_POST['route_ids'];
            $data['planned_date'] = $_POST['planned_date'];
            $data['distance_type'] = $_POST['distance_type'];
            $data['base_station'] = $_POST['base_station'];
            $data['createdby'] = $_POST['username'];
            $result = $this->Model_Region->save_tour_plan_from_phone($data);
            if($result){
                $result_data['statusCode'] = "1";
                $result_data['status'] = "Planning Successfull for: ". $_POST['planned_date'];
                echo json_encode($result_data);
            }else if(!$result){
                $result_data['statusCode'] = "5";
                $result_data['status'] = "You can't plan twice for the same date";
                echo json_encode($result_data);
            }else{
                $result_data['statusCode'] = "0";
                $result_data['status'] = "Something went wrong! Please try again later";
                echo json_encode($result_data);
            }

        }else{
            $result['statusCode'] = "0";
            $result['status'] = "Fields Empty!";
            echo json_encode($result);
            exit;
        }
    }

    public function getSavedRoutesByUserId(){
        if(!isset($_POST['user_id'])){
            $result['statuscode'] = "3";
            $result['status'] = "Fields Missing";
            echo json_encode($result);
            exit;
        }
        $user_id = $_POST['user_id'];
        $test_result['data'] = $this->Model_Region->get_saved_routes_by_user_id($user_id);
        if($test_result){
            $result['statusCode'] = "1";
            $result['route_details'] = $test_result['data'];
            echo json_encode($result);
        }else{
            $data['statusCode'] = "0";
            $data['status'] = "failed";
            echo json_encode($data);
        }
    }

    public function getTravelPlanByUserID(){
        if(!isset($_POST['user_id'])){
            $result['statuscode'] = "3";
            $result['status'] = "Fields Missing";
            echo json_encode($result);
            exit;
        }

        if(empty($_POST['user_id'])){
            $result['statuscode'] = "0";
            $result['status'] = "User ID field empty";
            echo json_encode($result);
            exit;
        }

        $user_id = $_POST['user_id'];
        $test_result = $this->Model_Travel->get_travel_plan_by_user_id($user_id);
        if($test_result['status']){
            $result_data['statusCode'] = "1";
            $result_data['status'] = "success";
            $result_data['accepted_plan_number'] = count($test_result['accepted_travel_plan']);
            $result_data['pending_plan_number'] = count($test_result['pending_travel_plan']);
            $result_data['data'] = $test_result;
            echo json_encode($result_data);
        }else if(!$test_result['status']){
            $result_data['statusCode'] = "3";
            $result_data['status'] = "No Data is planned for this user!!! Is this even a real user??";
            echo json_encode($result_data);
        }else{
            $result_data['statusCode'] = "0";
            $result_data['status'] = "Something went wrong!! Please try again later";
            echo json_encode($result_data);
        }
    }

    public function getTravelPlanDateWiseWithUserID(){
        if(!isset($_POST['user_id']) || !isset($_POST['date'])){
            $result['statuscode'] = "3";
            $result['status'] = "Fields Missing";
            echo json_encode($result);
            exit;
        }

        if(empty($_POST['user_id']) || empty($_POST['date'])){
            $result['statuscode'] = "0";
            $result['status'] = "field empty";
            echo json_encode($result);
            exit;
        }

        $data['user_id'] = $_POST['user_id'];
        $data['date'] = $_POST['date'];
        $test_result = $this->Model_Travel->getTravelPlanDateWise($data);
        if($test_result['status']){
            $result_data['statusCode'] = "1";
            $result_data['status'] = "success";
            $result_data['data_block'] = $test_result;
            echo json_encode($result_data);
        }else if(!$test_result['status']){
            $result_data['statusCode'] = "5";
            $result_data['status'] = "You don't have any plans for this day";
            echo json_encode($result_data);
        }else{
            $result_data['statusCode'] = "0";
            $result_data['status'] = "Something went wrong! Please try again later";
            echo json_encode($result_data);
        }
    }

    public function travelPlanCostDetails(){
        if(!isset($_POST['user_id']) || !isset($_POST['username']) || 
        !isset($_POST['designation']) || !isset($_POST['travel_plan_id']) ||
        !isset($_POST['planned_date']) || !isset($_POST['bus_fare']) || !isset($_POST['bus_location'])|| 
        !isset($_POST['rikshaw_fare']) || !isset($_POST['rikshaw_location']) || !isset($_POST['cng_fare'])||  
        !isset($_POST['cng_location']) || !isset($_POST['bike_fare']) || !isset($_POST['bike_location'])||   
        !isset($_POST['distance_type']) || !isset($_POST['city_type']) || !isset($_POST['voucher_status']) || !isset($_POST['remarks']) ||
        !isset($_POST['food_allowance']) || !isset($_POST['hotel_rent_allowance'])||
        !isset($_POST['food_location'])){
            $result['statuscode'] = "3";
            $result['status'] = "Fields Missing";
            echo json_encode($result);
            exit;
        }

        if(!empty($_POST['user_id']) || !empty($_POST['username']) || 
        !empty($_POST['designation']) || !empty($_POST['travel_plan_id']) ||
        !empty($_POST['planned_date']) || !empty($_POST['bus_fare'])||
        !empty($_POST['rikshaw_fare']) || !empty($_POST['cng_fare'])||
        !empty($_POST['bike_fare'])|| !empty($_POST['distance_type']) || 
        !empty($_POST['food_allowance']) || !empty($_POST['hotel_rent_allowance'])||
        !empty($_POST['city_type'])){
            $data['user_id'] = $_POST['user_id'];
            $data['username'] = $_POST['username'];
            $data['designation'] = $_POST['designation'];
            $data['travel_plan_id'] = $_POST['travel_plan_id'];
            $data['planned_date'] = $_POST['planned_date'];
            $data['bus_fare'] = $_POST['bus_fare'];
            $data['bus_location'] = $_POST['bus_location'];
            $data['rikshaw_fare'] = $_POST['rikshaw_fare'];
            $data['rikshaw_location'] = $_POST['rikshaw_location'];
            $data['cng_fare'] = $_POST['cng_fare'];
            $data['cng_location'] = $_POST['cng_location'];
            $data['bike_fare'] = $_POST['bike_fare'];
            $data['bike_location'] = $_POST['bike_location'];
            $data['distance_type'] = $_POST['distance_type'];
            $data['city_type'] = $_POST['city_type'];
            $data['voucher_status'] = $_POST['voucher_status'];
            $data['food_location'] = $_POST['food_location'];
            $data['user_remarks'] = $_POST['remarks'];
            $data['food_allowance'] = $_POST['food_allowance'];
            $data['hotel_rent_allowance'] = $_POST['hotel_rent_allowance'];
            $result = $this->Model_Travel->save_travel_cost_details_from_phone($data);
            if($result['status'] == "1"){
                $result_data['statusCode'] = "1";
                $result_data['status'] = "Detailed Cost Saved for budget claim for Travel ID ".$_POST['travel_plan_id'];
                echo json_encode($result_data);
            }else if($result['status'] == "8"){
                $result_data['statusCode'] = "8";
                $result_data['status'] = "You can't submit your daily expenditure for a day twice!";
                echo json_encode($result_data);
            }else if($result['status'] == "5"){
                $result_data['statusCode'] = "5";
                $result_data['status'] = "Can't submit for same travel plan";
                echo json_encode($result_data);
            }else{
                $result_data['statusCode'] = "0";
                $result_data['status'] = "Something went wrong!!!";
                echo json_encode($result_data);
            }

        }else{
            $result['statusCode'] = "0";
            $result['status'] = "Fields Empty!";
            echo json_encode($result);
            exit;
        }
    }

    public function dayTrackerWithTravelPlanIDAndUserIDStart(){
        if(!isset($_POST['user_id']) || !isset($_POST['travel_plan_id']) || !isset($_POST['day_start'])){
            $result['statuscode'] = "3";
            $result['status'] = "Fields Missing";
            echo json_encode($result);
            exit;
        }

        if(!empty($_POST['user_id']) || !empty($_POST['travel_plan_id']) || !empty($_POST['day_start'])){
            $data['user_id'] = $_POST['user_id'];
            $data['travel_plan_id'] = $_POST['travel_plan_id'];
            $data['day_start'] = $_POST['day_start'];
            $data['start_lat'] = $_POST['start_lat'];
            $data['start_lng'] = $_POST['start_lng'];
            $result = $this->Model_Travel->dayTrackerStart($data);
            if($result['status'] == "1"){
                $data_result['statusCode'] = "1";
                $data_result['status'] = "Your day has been started successfully";
                echo json_encode($data_result);
            }else if($result['status'] == "5"){
                $data_result['statusCode'] = "5";
                $data_result['status'] = "Same Travel plan starting cannot be tolerated!!!";
                echo json_encode($data_result);
            }else{
                $data_result['statusCode'] = "0";
                $data_result['status'] = "Soemthing went wrong!!! Please try again later!!!";
                echo json_encode($data_result);
            }
        }else{
            $result['statusCode'] = "0";
            $result['status'] = "Fields Empty!";
            echo json_encode($result);
            exit;
        }
    }

    public function dayTrackerWithTravelPlanIDAndUserIDEnd(){
        if(!isset($_POST['user_id']) || !isset($_POST['travel_plan_id']) || !isset($_POST['day_end'])){
            $result['statuscode'] = "3";
            $result['status'] = "Fields Missing";
            echo json_encode($result);
            exit;
        }

        if(!empty($_POST['user_id']) || !empty($_POST['travel_plan_id']) || !empty($_POST['day_end'])){
            $data['user_id'] = $_POST['user_id'];
            $data['travel_plan_id'] = $_POST['travel_plan_id'];
            $data['day_end'] = $_POST['day_end'];
            $data['end_lat'] = $_POST['end_lat'];
            $data['end_lng'] = $_POST['end_lng'];
            $result = $this->Model_Travel->dayTrackerEnd($data);
            if($result['status'] == "1"){
                $data_result['statusCode'] = "1";
                $data_result['status'] = "Your Travel has been ended successfully";
                echo json_encode($data_result);
            }else{
                $data_result['statusCode'] = "0";
                $data_result['status'] = "Soemthing went wrong!!! Please try again later!!!";
                echo json_encode($data_result);
            }
        }else{
            $result['statusCode'] = "0";
            $result['status'] = "Fields Empty!";
            echo json_encode($result);
            exit;
        }
    }

    public function addAreaFromPhone(){
        if(!isset($_POST['user_id']) || !isset($_POST['region_id']) || !isset($_POST['sub_region_id']) || !isset($_POST['assigned_area_name'])){
            $result['statuscode'] = "3";
            $result['status'] = "Fields Missing";
            echo json_encode($result);
            exit;
        }

        if(!empty($_POST['user_id']) || !empty($_POST['region_id']) || !empty($_POST['sub_region_id']) || !empty($_POST['assigned_area_name'])){
            $data['user_id'] = $_POST['user_id'];
            $data['region_id'] = $_POST['region_id'];
            $data['sub_region_id'] = $_POST['sub_region_id'];
            $data['assigned_area_name'] = $_POST['assigned_area_name'];
            $response = $this->Model_Region->addNewAreaFromPhone($data);
            if($response['statusCode'] == "1"){
                $result['statuscode'] = "1";
                $result['status'] = $response['status'];
                echo json_encode($result);
            }else if($response['statusCode']== "3"){
                $result['statuscode'] = "3";
                $result['status'] = $response['status'];
                echo json_encode($result);
            }else{
                $result['statuscode'] = "5";
                $result['status'] = "Something went wrong. Please try again later!!";
                echo json_encode($result);
            }
            
        }else{
            $result['statusCode'] = "0";
            $result['status'] = "Fields Empty!";
            echo json_encode($result);
            exit;
        }
    }

    public function uploadBills() {
        $param = $this->input->post(NULL, TRUE);
        if (isset($param['travel_plan_id'], $param['user_id'], $param['allowance_type'], $param['image']) ) {
            $path = "/var/www/html/geofighters/uploads/bills/";
            $image = base64_decode($param['image']);
            $data['image'] = $param['image'];
            $data['travel_plan_id'] = $param['travel_plan_id'];
            $data['user_id'] = $param['user_id'];
            $data['allowance_type'] = $param['allowance_type'];
            $data['username'] = $this->Model_User->getUserName($param['user_id']);
            $data['filename'] = $param['travel_plan_id'].'-'.$param['user_id'].'-'.$data['username'].'-'.date('YmdHis').'.jpg';
            
            $myfile = fopen($path.$data['filename'], "w");
            
            file_put_contents($path.$data['filename'], $image);
            
            $response = $this->Model_Travel->insert_travel_bill_pic($data);
            if($response){
                $result['statusCode'] = "1";
                $result['status'] = "Image Uploaded Successfully";
                echo json_encode($result);
            }else{
                $result['statusCode'] = "0";
                $result['status'] = "Something went wrong!! Please try again later!";
                echo json_encode($result);
            }
        
        }else{
            $result['statusCode'] = "3";
            $result['status'] = "Forbidden Request!!!";
            echo json_encode($result);
        }
    }

        // private function addStatusBlock($isSuccess='', $msg='No Data Found'){
        //     $statusBlock['responseCode'] = $isSuccess;
        //     $statusBlock['responseMessage'] = $isSuccess==1 ? "" : $msg;
        //     return $statusBlock;
        // }

        // private function allPerameterValid($param=''){
        //     if (isset($param['deviceId'], $param['imsi'], $param['imei1'], $param['imei2'], $param['softwareVersion'], $param['simSerialNumber'], $param['brand'], $param['model'], $param['operator'], $param['operatorName'], $param['release'], $param['sdkVersion'], $param['versionCode'], $param['username'])) {
        //     return true;
        //     } else {
        //         return false;
        //     }
        // }
}