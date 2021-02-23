<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Phone extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->config->item('base_url');
        $this->config->item('api_url');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
    }

    function add_new_phone_model($post){
        $post['createdby'] = $this->session->userdata('username');
        $post['phone_id'] = "GPHN-".rand(1000, 9999);
        $data = $this->db
                    ->select('phone_id')
                    ->where('phone_id', $post['phone_id'])
                    ->get('tbl_phone_model')
                    ->row_array();
        if($data>0){
            $post['phone_id'] = "GPHN-".mt_rand(1000,9999);
        }
        $data['phone_id'] = $post['phone_id'];
        $result = $this->db->insert('tbl_phone_model', $post);
        $result1 = $this->db->insert('tbl_total_stock', $data);
        if($result1){
            return $result;
        }else{
            return false;
        }
        
    }

    function get_phone_model_array(){
        $result = $this->db
                    ->select('phone_id, phone_model, base_price')
                    ->get('tbl_phone_model')
                    ->result_array();
        return $result;
    }

    function add_stock_model_wise($post){
        $post['createdby'] = $this->session->userdata('username');
        $phone_stock_data = $this->db
                                ->select('stock')
                                ->where('phone_id', $post['phone_id'])
                                ->get('tbl_total_stock')
                                ->row_array();
        if($phone_stock_data['stock']>0 || $phone_stock_data['stock'] == 0){
            $new_stock = $phone_stock_data['stock'] + $post['stock'];
            $post['stock'] = $new_stock;
        }
        // $data[]
        $result = $this->db
                    ->where('phone_id', $post['phone_id'])
                    ->update('tbl_total_stock', $post);
        return $result;
    }

    function get_phone_stock_list_serverside($post){
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];

        $this->db->select('*');
        $this->db->select('(SELECT phone_model FROM tbl_phone_model WHERE phone_id = tbl_total_stock.phone_id LIMIT 1) AS phone_model');
        $this->db->group_start()->or_like('phone_id', $post['search']['value'])->or_like('stock_date', $post['search']['value'])->group_end();       
        $data['data'] = $this->db->order_by($order_col, $order_dir)->limit($post['length'], $post['start'])->get('tbl_total_stock')->result_array();
        $data['recordsTotal'] = $this->db->count_all_results('tbl_total_stock');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function get_phone_list_serverside($post){
        $data['draw'] = $post['draw'];
        $data['start'] = $post['start'];
        $order_col = $post['columns'][$post['order'][0]['column']]['data'];
        $order_dir = $post['order'][0]['dir'];
        $this->db->group_start()->or_like('phone_id ', $post['search']['value'])->or_like('phone_model', $post['search']['value'])->or_like('base_price', $post['search']['value'])->group_end();
        $data['data'] = $this->db->order_by($order_col, $order_dir)->limit($post['length'], $post['start'])->get('tbl_phone_model')->result_array();
      
        $data['recordsTotal'] = $this->db->count_all_results('tbl_phone_model');
        $data['recordsFiltered'] = $data['recordsTotal'];
        return $data;
    }

    function add_stock_to_distributor($post){
        $final_data['createdby'] = $this->session->userdata('username');
        $final_data['phone_id'] = $post['phone_id'];
        $final_data['stock'] = $post['stock']; 
        $final_data['distributor_id'] = $post['distributor_id'];
        $final_data['stock_date'] = $post['stock_date'];

        $stock_data = $this->db
                        ->select('stock, stock_cost')
                        ->where('phone_id', $post['phone_id'])
                        ->get('tbl_total_stock')
                        ->row_array();
        return $stock_data;
    //     $base_price = $this->db
    //                     ->select('base_price')
    //                     ->where('phone_id', $post['phone_id'])
    //                     ->get('tbl_phone_model')
    //                     ->row_array();

    //     $final_data['stock_cost'] = $base_price['base_price'] * $post['stock'];

    //     //Previous stock data of distributor                
    //     $distributor_previous_stock_data = $this->db
    //                                 ->select('dist_stock')
    //                                 ->where('distributor_id', $post['distributor_id'])
    //                                 ->get('tbl_distributor')
    //                                 ->row_array();

    //     $new_stock_data = $stock_data['stock'] - $post['stock'];
    //     if($new_stock_data<0){
    //         return false;
    //     }else if($new_stock_data>=0){
    //         //This stock and cost will be updated in the tbl_total_stock
    //         $new_stock_cost = $new_stock_data*$base_price['base_price'];

    //         //This stock and cost will be updated in the tbl_stock_management
    //         $post['stock_cost'] = $post['stock']*$base_price['base_price'];

    //         $result_stock = $this->db
    //                             ->set('stock', $new_stock_data)
    //                             ->set('stock_cost', $new_stock_cost)
    //                             ->where('phone_id', $post['phone_id'])
    //                             ->update('tbl_total_stock');
    //         if($result_stock){
    //             $result_stock_management = $this->db
    //                                         ->insert('tbl_stock_management', $final_data);
    //             if($result_stock_management){
    //                 $new_distributor_stock = $distributor_previous_stock_data['dist_stock'] + $post['stock'];
    //                 $result = $this->db
    //                             ->set('dist_stock', $new_distributor_stock)
    //                             ->update('tbl_distributor');
    //                 return $result; 
    //             }else{
    //                 return false;
    //             }
    //         }else{
    //             return false;
    //         }
    //     }else{
    //         return false;
    //     }
    // }
    }
}