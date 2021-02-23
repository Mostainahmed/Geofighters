<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Dashboard extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->config->item('base_url');
        $this->config->item('api_url');
        $this->load->helper('url');
        $this->load->database();
    }

    public function get_notifications($username='') {
        $notifications = array();
        $notifications = [];
        // $notifications['due_retail'] = $this->db->where(array('statuscode' => 8, 'paymentstatus !=' => 'paid'))->count_all_results('tbl_ServiceRequest');
        // $notifications['due_corp'] = $this->db->where(array('dueamount >' => 0))->count_all_results('tbl_CorporateClientAgreement');
        // $notifications['feedback'] = $this->db->join('tbl_Comments', 'tbl_Comments.serviceid = tbl_ServiceRequest.serviceid')->where("tbl_Comments.postservice_client IS NULL AND statuscode = 8 AND servicedate >= DATE(CURDATE()-8)")->count_all_results('tbl_ServiceRequest');
        // $notifications['contract_remainder'] = $this->db->where("DATE(contractenddate) > DATE(CURDATE()+90)")->count_all_results('tbl_CorporateClientAgreement');
        return $notifications;
    }

    // function get_client_count_by_type($type='') {
    //     return $this->db->where('client_type',$type)->count_all_results('tbl_Clients');
    //     // $data = array();
    //     // $query = $this->db->query("SELECT count(*) FROM tbl_Clients WHERE client_type='$type'")->result();
    //     // return $query;
    // }

    // function get_completed_order_count() {
    //     $data = array();
    //     $query = $this->db->query("SELECT count(*) as total FROM tbl_ServiceRequest WHERE status='Completed'");
    //     if ($query->num_rows() > 0) {
    //         foreach ($query->result() as $row) {
    //             $count = $row->total;
    //         }
    //         return $count;
    //     } else {
    //         return 0;
    //     }
    // }

    // function get_order_count_by_type() {
    //     $data = array();
    //     $query = $this->db->query("SELECT count(*) as total FROM tbl_ServiceRequest");
    //     if ($query->num_rows() > 0) {
    //         foreach ($query->result() as $row) {
    //             $count = $row->total;
    //         }
    //         return $count;
    //     } else {
    //         return 0;
    //     }
    // }

    // function get_total_ac_count() {
    //     return $this->db->where('deleted',0)->count_all_results('tbl_ClientAcList');
    // }

    // function get_user_acquisition_by_year_retail() {
    //     //  SELECT MONTH(created), COUNT(*) FROM `tbl_Clients` WHERE YEAR(created)='2020' AND client_type='Home' AND createdby!='ayesha' GROUP BY MONTH(created)
    //     $data_this_year_retail = $this->db->select('MONTH(created) AS month, COUNT(*) AS count')->where("YEAR(created)=YEAR(CURDATE()) AND client_type='Home' AND createdby!='ayesha'")->group_by('MONTH(created)')->get('tbl_Clients')->result_array();
    //     $data_last_year_retail = $this->db->select('MONTH(created) AS month, COUNT(*) AS count')->where("YEAR(created)=YEAR(CURDATE())-1 AND client_type='Home' AND createdby!='ayesha'")->group_by('MONTH(created)')->get('tbl_Clients')->result_array();

    //     $formatted_this_year_retail = array();
    //     for ($i=0; $i < 12; $i++) {
    //         if (isset($data_this_year_retail[$i])) {
    //             $formatted_this_year_retail[$data_this_year_retail[$i]['month']] = $data_this_year_retail[$i]['count'];
    //         }
    //     }

    //     $formatted_last_year_retail = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);
    //     for ($i=0; $i < sizeof($formatted_last_year_retail); $i++) {
    //         if (isset($data_last_year_retail[$i])) {
    //             $formatted_last_year_retail[$data_last_year_retail[$i]['month']] = $data_last_year_retail[$i]['count'];
    //         }
    //     }

    //     $data['this'] = array_values($formatted_this_year_retail);
    //     $data['last'] = array_values($formatted_last_year_retail);
    //     return $data;
    // }
    // function get_user_acquisition_by_year_corp() {
    //     $data_this_year_corp = $this->db->select('MONTH(created) AS month, COUNT(*) AS count')->where("YEAR(created)=YEAR(CURDATE()) AND client_type='Corporate' AND createdby!='ayesha'")->group_by('MONTH(created)')->get('tbl_Clients')->result_array();
    //     $data_last_year_corp = $this->db->select('MONTH(created) AS month, COUNT(*) AS count')->where("YEAR(created)=YEAR(CURDATE())-1 AND client_type='Corporate' AND createdby!='ayesha'")->group_by('MONTH(created)')->get('tbl_Clients')->result_array();

    //     $formatted_this_year_corp = array();
    //     for ($i=0; $i < 12; $i++) {
    //         if (isset($data_this_year_corp[$i])) {
    //             $formatted_this_year_corp[$data_this_year_corp[$i]['month']] = $data_this_year_corp[$i]['count'];
    //         }
    //     }

    //     $formatted_last_year_corp = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);
    //     for ($i=0; $i < sizeof($formatted_last_year_corp); $i++) {
    //         if (isset($data_last_year_corp[$i])) {
    //             $formatted_last_year_corp[$data_last_year_corp[$i]['month']] = $data_last_year_corp[$i]['count'];
    //         }
    //     }

    //     $data['this'] = array_values($formatted_this_year_corp);
    //     $data['last'] = array_values($formatted_last_year_corp);
    //     return $data;
    // }

    // function get_sales_by_year_retail() {
    //     $data_this_year_retail = $this->db->select('MONTH(orderdate) AS month, COUNT(*) AS count')->where("YEAR(orderdate)=YEAR(CURDATE()) AND LEFT(clientid, 1)='R'")->group_by('MONTH(orderdate)')->get('tbl_ServiceRequest')->result_array();
    //     $data_last_year_retail = $this->db->select('MONTH(orderdate) AS month, COUNT(*) AS count')->where("YEAR(orderdate)=YEAR(CURDATE())-1 AND LEFT(clientid, 1)='R'")->group_by('MONTH(orderdate)')->get('tbl_ServiceRequest')->result_array();

    //     $formatted_this_year_retail = array();
    //     for ($i=0; $i < 12; $i++) {
    //         if (isset($data_this_year_retail[$i])) {
    //             $formatted_this_year_retail[$data_this_year_retail[$i]['month']] = $data_this_year_retail[$i]['count'];
    //         }
    //     }

    //     $formatted_last_year_retail = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);
    //     for ($i=0; $i < sizeof($formatted_last_year_retail); $i++) {
    //         if (isset($data_last_year_retail[$i])) {
    //             $formatted_last_year_retail[$data_last_year_retail[$i]['month']] = $data_last_year_retail[$i]['count'];
    //         }
    //     }

    //     $data['this'] = array_values($formatted_this_year_retail);
    //     $data['last'] = array_values($formatted_last_year_retail);
    //     return $data;
    // }


    // function get_sales_by_year_corp() {
    //     $data_this_year_corp = $this->db->select('MONTH(orderdate) AS month, COUNT(*) AS count')->where("YEAR(orderdate)=YEAR(CURDATE()) AND LEFT(clientid, 1)='C'")->group_by('MONTH(orderdate)')->get('tbl_ServiceRequest')->result_array();
    //     $data_last_year_corp = $this->db->select('MONTH(orderdate) AS month, COUNT(*) AS count')->where("YEAR(orderdate)=YEAR(CURDATE())-1 AND LEFT(clientid, 1)='C'")->group_by('MONTH(orderdate)')->get('tbl_ServiceRequest')->result_array();

    //     $formatted_this_year_corp = array();
    //     for ($i=0; $i < 12; $i++) {
    //         if (isset($data_this_year_corp[$i])) {
    //             $formatted_this_year_corp[$data_this_year_corp[$i]['month']] = $data_this_year_corp[$i]['count'];
    //         }
    //     }

    //     $formatted_last_year_corp = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);
    //     for ($i=0; $i < sizeof($formatted_last_year_corp); $i++) {
    //         if (isset($data_last_year_corp[$i])) {
    //             $formatted_last_year_corp[$data_last_year_corp[$i]['month']] = $data_last_year_corp[$i]['count'];
    //         }
    //     }

    //     $data['this'] = array_values($formatted_this_year_corp);
    //     $data['last'] = array_values($formatted_last_year_corp);
    //     return $data;
    // }

    public function getUserCount(){
        $result = $this->db
                    ->select('*')
                    ->get('tbl_users')
                    ->result_array();
        return sizeof($result);
    }

    function getCostOfUsers(){
        $approved_status = "approved_status != 0";
        $this->db->select_sum('total_budget_claim');
        $this->db->where($approved_status);
        $query= $this->db->get('tbl_budget_claim_cost_details');
        return $query->result(); 
    }

    function getTotalCompletedTour(){
        $where = "travel_end_status != 0";
        // $condition = "timeofentry BETWEEN " . "'" . $post['start_date'] . "'" . " AND " . "'" . $post['end_date'] . "'";
        $result = $this->db
                    ->select('*')
                    ->where($where)
                    ->get('tbl_travel_plan')
                    ->result_array();
        return sizeof($result);
    }
}
?>
