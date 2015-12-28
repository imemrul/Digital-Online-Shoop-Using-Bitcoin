<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Admin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('pagination');
   $this->load->helper(array('form', 'url'));
   $this->load->library('form_validation');
   $this->load->model('datamodel','',TRUE);
 }
 function index(){
     $this->ck_login();
     $session_data          = $this->session->userdata('logged_in');
     $data['username']      = $session_data['username'];
     $data['role']          = 'System Admin';
     $data['name']          = $session_data['name'];
     $data['title']         = "Admin::Digital Online Shop";
     $data['pageheader']    = "Dashboard";
     $data['pagedescrip']   = "Admin Dashboard";
     $data['header']        = $this->load->view('admin/theme/header', $data, true);
     $data['header_nav']    = $this->load->view('admin/theme/header_nav', $data, true);
     $data['footer']        = $this->load->view('admin/theme/footer', '', true); 
     $data['product']       = $this->datamodel->get_data('products');
     $data['user_info']     = $this->datamodel->get_data('user');
     $this->load->view('dashboard', $data);
 }
 function ck_login(){
  if(empty($this->session->userdata('logged_in'))){
     redirect('login', 'refresh');
  }
 }
 function theme(){
    $data = array('title'           => "Admin Theme",
                  'name'            => 'Theme Default',
                  'role'            => 'System Admin'
                  );
    $this->load->view('admin/theme/header',$data);
    $this->load->view('admin/theme/header_nav',$data);
    $this->load->view('admin/theme/index',$data);
    $this->load->view('admin/theme/footer',$data);
 }
 function addCategories(){
  $this->ck_login();
     $session_data          = $this->session->userdata('logged_in');
     $data['username']      = $session_data['username'];
     $data['name']          = $session_data['name'];
     $data['role']          = 'System Admin';
     $data['title']         = "Admin::Digital Online Shop";
     $data['pageheader']    = "Categories";
     $data['pagedescrip']   = "Product Categories";
     $data['header']        = $this->load->view('admin/theme/header', $data, true);
     $data['header_nav']    = $this->load->view('admin/theme/header_nav', $data, true);
     $data['footer']        = $this->load->view('admin/theme/footer', '', true); 
     $data['user_info']     = $this->datamodel->get_data('user');
     $this->load->view('addcat', $data);
     if(isset($_POST['cat_name'])){
      $config['upload_path'] = 'images/products';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $error = array();
        $data = array();
        $sdata = array(); //save data array nilam
        $this->load->library('upload', $config); // upload akti library jate configure add kora jai
        $img = "";
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        if (!$this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors(); // jodi upload a vul hoy
            echo '<script>alert("';
            print_r($error);
            echo '")</script>';
            redirect('admin/addCategories', 'refresh');
        } 
        else {
              $data=$this->upload->data();
              $img = 'images/products/'.$data['file_name'];
              $data= array(
                  'cat_name'  => $_POST['cat_name'],
                  'cat_img'   => $img,
                  'cat_status'=> 'Active'
                );
              $this->datamodel->insert_data('categories', $data);
              echo '<script>alert("';
              echo "Data Saved!";
              echo '")</script>';
            }
          }
     }
 }
 function viewCategories(){
  $this->ck_login();
  $session_data             = $this->session->userdata('logged_in');
     $data['username']      = $session_data['username'];
     $data['name']          = $session_data['name'];
     $data['role']          = 'System Admin';
     $data['title']         = "Admin::Categories Show";
     $data['pageheader']    = "Categories View";
     $data['pagedescrip']   = "Product Categories Vew";
     $data['header']        = $this->load->view('admin/theme/header', $data, true);
     $data['header_nav']    = $this->load->view('admin/theme/header_nav', $data, true);
     $data['footer']        = $this->load->view('admin/theme/footer', '', true);  
     $data['user_info']     = $this->datamodel->get_data('user');
     $where = array('cat_status' => 'Active');
     $data['catShow']       = $this->datamodel->get_data('categories', '', $where);
     $this->load->view('catshow', $data);
 }
 function CategoriesManage(){
  $this->ck_login();
     $session_data          = $this->session->userdata('logged_in');
     $data['username']      = $session_data['username'];
     $data['name']          = $session_data['name'];
     $data['role']          = 'System Admin';
     $data['title']         = "Admin::Product Categories Manage";
     $data['pageheader']    = "Categories Manage";
     $data['pagedescrip']   = "Product Categories Manage";
     $data['header']        = $this->load->view('admin/theme/header', $data, true);
     $data['header_nav']    = $this->load->view('admin/theme/header_nav', $data, true);
     $data['footer']        = $this->load->view('admin/theme/footer', '', true); 
     $data['user_info']     = $this->datamodel->get_data('user');
     $where = array('cat_status' => 'Active');
     $data['catShow']       = $this->datamodel->get_data('categories', '', $where);
     $this->load->view('admin/productcatmanage', $data);
     if(isset($_POST['delete'])){
        $data= array(
                     'cat_status'=> 'Inactive'
                );
              $where = array( "cat_id" => $_POST['cat_id']);
              $this->datamodel->update_data('categories', $where, $data);

     }
     if(isset($_FILES['photo'])){
      $config['upload_path'] = 'images/products';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $error = array();
        $data = array();
        $sdata = array(); //save data array nilam
        $this->load->library('upload', $config); // upload akti library jate configure add kora jai
        $img = "";
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        if (!$this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors(); // jodi upload a vul hoy
            echo '<script>alert("';
            print_r($error);
            echo '")</script>';
            redirect('admin/addCategories', 'refresh');
        } 
        else {
              $data=$this->upload->data();
              $img = 'images/products/'.$data['file_name'];
              $data= array(
                  'cat_name'  => $_POST['cat_name'],
                  'cat_img'   => $img,
                  'cat_status'=> 'Active'
                );
              $where = array( "cat_id" => $_POST['cat_id']);
              $this->datamodel->update_data('categories', $where, $data);
              $data = array('message' => "Success");
             echo json_encode($data);
            }
          }
     }
 }
 function addNewProduct(){
  $this->ck_login();
  $session_data          = $this->session->userdata('logged_in');
     $data['username']      = $session_data['username'];
     $data['name']          = $session_data['name'];
     $data['role']          = 'System Admin';
     $data['title']         = "Admin::Product Entry";
     $data['pageheader']    = "Product";
     $data['pagedescrip']   = "Product Entry Page";
     $data['header']        = $this->load->view('admin/theme/header', $data, true);
     $data['header_nav']    = $this->load->view('admin/theme/header_nav', $data, true);
     $data['footer']        = $this->load->view('admin/theme/footer', '', true); 
     $data['user_info']     = $this->datamodel->get_data('user');
     $where = array('cat_status' => 'Active');
     $data['catShow']       = $this->datamodel->get_data('categories', '', $where);
     $this->load->view('addproduct', $data);
     if(isset($_POST['p_name'])){
      $config['upload_path'] = 'images/products';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $error = array();
        $data = array();
        $sdata = array(); //save data array nilam
        $this->load->library('upload', $config); // upload akti library jate configure add kora jai
        $img = "";
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        if (!$this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors(); // jodi upload a vul hoy
            echo '<script>alert("';
            print_r($error);
            echo '")</script>';
            redirect('admin/addNewProduct', 'refresh');
        } 
        else {
              $data=$this->upload->data();
              $img = 'images/products/'.$data['file_name'];
              $data= array(
                  'p_name'  => $_POST['p_name'],
                  'p_img'   => $img,
                  'p_key'  => $_POST['p_key'],
                  'price'  => $_POST['price'],
                  'create_date' => strtotime(date('dmy')),
                  'cat_id'    => $_POST['cat_id'],
                  'p_status'=> 'Active'
                );
              $this->datamodel->insert_data('products', $data);
              echo '<script>alert("';
              echo "Data Saved!";
              echo '")</script>';
            }
          }
     }
 }

function viewProduct(){
  $this->ck_login();
  $session_data             = $this->session->userdata('logged_in');
     $data['username']      = $session_data['username'];
     $data['name']          = $session_data['name'];
     $data['role']          = 'System Admin';
     $data['title']         = "Admin::Product View";
     $data['pageheader']    = "Product View";
     $data['pagedescrip']   = "Product View Page";
     $data['header']        = $this->load->view('admin/theme/header', $data, true);
     $data['header_nav']    = $this->load->view('admin/theme/header_nav', $data, true);
     $data['footer']        = $this->load->view('admin/theme/footer', '', true); 
     $data['user_info']     = $this->datamodel->get_data('user');
     $where = array('p_status' => 'Active');
     $data['product']       = $this->datamodel->get_data('products', '', $where);
     $this->load->view('productshow', $data);
}
function productmanage(){
      $this->ck_login();
      $session_data          = $this->session->userdata('logged_in');
     $data['username']      = $session_data['username'];
     $data['name']          = $session_data['name'];
     $data['role']          = 'System Admin';
     $data['title']         = "Admin::Product Entry";
     $data['pageheader']    = "Product";
     $data['pagedescrip']   = "Product Entry Page";
     $data['header']        = $this->load->view('admin/theme/header', $data, true);
     $data['header_nav']    = $this->load->view('admin/theme/header_nav', $data, true);
     $data['footer']        = $this->load->view('admin/theme/footer', '', true); 
     $data['user_info']     = $this->datamodel->get_data('user');
     $where = array('cat_status' => 'Active',
                    'p_status' => 'Active'
                    );
     $data['allcatShow']       = $this->datamodel->get_data('categories');
     $data['catShow']       = $this->datamodel->get_data('categories', '', $where, 'products', 'cat_id', 'cat_id');
     $this->load->view('admin/productmanage', $data);
 }
 function prodocutupdate(){
  if(isset($_POST['p_name'])){
      $config['upload_path'] = 'images/products';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $error = array();
        $data = array();
        $sdata = array(); //save data array nilam
        $this->load->library('upload', $config); // upload akti library jate configure add kora jai
        $img = "";
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        if (!$this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors(); // jodi upload a vul hoy
            echo '<script>alert("';
            print_r($error);
            echo '")</script>';
            redirect('admin/addNewProduct', 'refresh');
        } 
        else {
              $data=$this->upload->data();
              $img = 'images/products/'.$data['file_name'];
              $data= array(
                  'p_name'  => $_POST['p_name'],
                  'p_img'   => $img,
                  'p_key'  => $_POST['p_key'],
                  'price'  => $_POST['price'],
                  'create_date' => strtotime(date('dmy')),
                  'cat_id'    => $_POST['cat_id'],
                  'p_status'=> 'Active'
                );
              $where = array('pid' => $_POST['pid']);
              $dataSave = $this->datamodel->update_data('products',$where, $data);
                echo "Success";
            }
          }
     }
     if(isset($_POST['recodeDelete'])){
      $data = array('p_status' => 'Inactive');
      $where = array('pid' => $_POST['pid']);
      $dataSave = $this->datamodel->update_data('products',$where, $data);
      echo "Hello World";
     }
 }
function PictureCategories(){
  $this->ck_login();
  $session_data          = $this->session->userdata('logged_in');
     $data['username']      = $session_data['username'];
     $data['name']          = $session_data['name'];
     $data['role']          = 'System Admin';
     $data['title']         = "Admin::Ad Categories";
     $data['pageheader']    = "Ad Categories Entry";
     $data['pagedescrip']   = "Ad Categories Entry Page";
     $data['header']        = $this->load->view('admin/theme/header', $data, true);
     $data['header_nav']    = $this->load->view('admin/theme/header_nav', $data, true);
     $data['footer']        = $this->load->view('admin/theme/footer', '', true); 
     $data['user_info']     = $this->datamodel->get_data('user');
     $this->load->view('adpicturecat', $data);
     if(isset($_POST['adpic_name'])){
      $config['upload_path'] = 'images/products';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $error = array();
        $data = array();
        $sdata = array(); //save data array nilam
        $this->load->library('upload', $config); // upload akti library jate configure add kora jai
        $img = "";
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        if (!$this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors(); // jodi upload a vul hoy
            echo '<script>alert("';
            print_r($error);
            echo '")</script>';
            redirect('admin/PictureCategories', 'refresh');
        } 
        else {
              $data=$this->upload->data();
              $img = 'images/products/'.$data['file_name'];
              $data= array(
                  'adpic_name'  => $_POST['adpic_name'],
                  'adpic_img'   => $img,
                  'adpic_status'=> 'Active'
                );
              $this->datamodel->insert_data('adpicturecat', $data);
              echo '<script>alert("';
              echo "Data Saved!";
              echo '")</script>';
            }
          }
     }
}
function viewPictureCategories(){
  $this->ck_login();
  $session_data             = $this->session->userdata('logged_in');
     $data['username']      = $session_data['username'];
     $data['name']          = $session_data['name'];
     $data['role']          = 'System Admin';
     $data['title']         = "Admin::Ad Categories View";
     $data['pageheader']    = "Ad Categories View";
     $data['pagedescrip']   = "Ad Categories View Page";
     $data['header']        = $this->load->view('admin/theme/header', $data, true);
     $data['header_nav']    = $this->load->view('admin/theme/header_nav', $data, true);
     $data['footer']        = $this->load->view('admin/theme/footer', '', true); 
     $data['user_info']     = $this->datamodel->get_data('user');
     $where = array('adpic_status' => 'Active');
     $data['adcat']       = $this->datamodel->get_data('adpicturecat', '', $where);
     $this->load->view('viewadcat', $data);
}

function addNewad(){
  $this->ck_login();
  $session_data          = $this->session->userdata('logged_in');
     $data['username']      = $session_data['username'];
     $data['name']          = $session_data['name'];
     $data['role']          = 'System Admin';
     $data['title']         = "Admin::Ad Entry Page";
     $data['pageheader']    = "Ad Entry";
     $data['pagedescrip']   = "Ad Entry Page";
     $data['header']        = $this->load->view('admin/theme/header', $data, true);
     $data['header_nav']    = $this->load->view('admin/theme/header_nav', $data, true);
     $data['footer']        = $this->load->view('admin/theme/footer', '', true);
     $data['user_info']     = $this->datamodel->get_data('user');
     $where = array('adpic_status' => 'Active');
     $data['catShow']       = $this->datamodel->get_data('adpicturecat', '', $where);
     $this->load->view('addnewad', $data);
     if(isset($_POST['adpicpro_name'])){
      $config['upload_path'] = 'images/products';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $error = array();
        $data = array();
        $sdata = array(); //save data array nilam
        $this->load->library('upload', $config); // upload akti library jate configure add kora jai
        $img = "";
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        if (!$this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors(); // jodi upload a vul hoy
            echo '<script>alert("';
            print_r($error);
            echo '")</script>';
            redirect('admin/addNewad', 'refresh');
        } 
        else {
              $data=$this->upload->data();
              $img = 'images/products/'.$data['file_name'];
              $data= array(
                  'adpicpro_name'  => $_POST['adpicpro_name'],
                  'adpicpro_img'   => $img,
                  'adpicpro_url'  => $_POST['adpicpro_url'],
                  'adpiccat_id'    => $_POST['cat_id'],
                  'adpicpro_status'=> 'Active'
                );
              $this->datamodel->insert_data('adpictureproduct', $data);
              echo '<script>alert("';
              echo "Data Saved!";
              echo '")</script>';
            }
          }
     }
}
function adview(){
  $this->ck_login();
  $session_data             = $this->session->userdata('logged_in');
     $data['username']      = $session_data['username'];
     $data['name']          = $session_data['name'];
     $data['role']          = 'System Admin';
     $data['title']         = "Admin::Ad View";
     $data['pageheader']    = "Ad View";
     $data['pagedescrip']   = "Ad View Page";
     $data['header']        = $this->load->view('admin/theme/header', $data, true);
     $data['header_nav']    = $this->load->view('admin/theme/header_nav', $data, true);
     $data['footer']        = $this->load->view('admin/theme/footer', '', true); 
     $data['user_info']     = $this->datamodel->get_data('user');
     $where = array('adpicpro_status' => 'Active');
     $data['allad']         = $this->datamodel->get_data('adpictureproduct', '', $where);
     $this->load->view('viewad', $data);
}
function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }
}

?>
