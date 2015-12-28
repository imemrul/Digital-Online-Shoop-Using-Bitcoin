<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper(array('form', 'url'));
   $this->load->library('form_validation');
   $this->load->model('datamodel','',TRUE);
 }

 function index()
 {
    $where = array('cat_status' => 'Active');
    $data['catShow']       = $this->datamodel->get_data('categories', '', $where);
    $where = array('p_status' => 'Active');
    $data['product']  	 = $this->datamodel->get_data('products', '', $where);
    $where = array('adpicpro_status' => 'Active');
    $data['addata']      = $this->datamodel->get_data('adpictureproduct', '', $where);
    $data['header']   	 = $this->load->view('theme/header', $data, true);
    $data['sitenav']     = $this->load->view('theme/sitenav', $data, true);
    $data['slider']   	 = $this->load->view('theme/slider', '', true);
    $data['footer']   	 = $this->load->view('theme/sitefooter', '', true);
    $this->load->view('home', $data);
   
 }
 function catshow()
 {
    $catid = $this->uri->segment(3);
    $where = array('cat_status' => 'Active',
                   'categories.cat_id'   => $catid
                  );
   $data['product'] = $this->datamodel->get_data('products','', $where, 'categories', 'cat_id', 'cat_id');
   $where = array('cat_status' => 'Active');
    $data['catShow']       = $this->datamodel->get_data('categories', '', $where);
    $data['header']     = $this->load->view('theme/header', $data, true);
    $data['sitenav']     = $this->load->view('theme/sitenav', $data, true);
    $data['slider']     = $this->load->view('theme/slider', '', true);
    $data['footer']     = $this->load->view('theme/sitefooter', '', true);
    $this->load->view('catshowsite', $data);
   
 }

 
}

?>
