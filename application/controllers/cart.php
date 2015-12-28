<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cart extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper(array('form', 'url'));
   $this->load->library('form_validation');
   $this->load->model('datamodel','',TRUE);
 }

 function index()
 {
     // $data = $this->cart->contents();
     // // print_r($data);
     // $i = 1;
     // foreach ($this->cart->contents() as $items):
     // echo $items['qty'];
     // endforeach;
  // $this->load->view('topcart');
 }
 function checkout(){
    //implementing the callback file
   $secret = "dossecret";
   if($_GET['secret'] != $secret)
   {
     die('Stop doing that');
   }
   else
   {
      $invoice_id = $_GET['orderid'];
      $transaction_hash = $_GET['transaction_hash'];
      $value_in_btc = $_GET['value'] / 100000000;
      //Commented out to test, uncomment when live
      if ($_GET['test'] == true) {
      echo 'Ignoring Test Callback';
      return;
    }
    if ($_GET['confirmations'] >= 4) {
      echo "*ok*";
    }
    else {echo "Waiting for confirmations";}
}

}
 function shopingCart(){
    $where = array('cat_status' => 'Active');
    $data['catShow']       = $this->datamodel->get_data('categories', '', $where);
    $where = array('p_status' => 'Active');
    $data['product']    = $this->datamodel->get_data('products', '', $where);
    $data['header']     = $this->load->view('theme/header', $data, true);
    $data['sitenav']     = $this->load->view('theme/sitenav', $data, true);
    $data['footer']     = $this->load->view('theme/sitefotter', '', true);
    $this->load->view('shoping_cart', $data);
 }
function add(){

 $where   = array( 
                   'pid'      => $_POST['pid'],
                   'p_status' => 'Active'
                  );
 $product = $this->datamodel->get_data('categories','', $where, 'products', 'cat_id', 'cat_id');
 $data    = array(
               'id'      => $product[0]['pid'],
               'qty'     => 1,
               'price'   => 39.95,
               'name'    => $product[0]['p_name'],
               'img'  => $product[0]['p_img'],
               'options' => array('categories' => $product[0]['cat_name'])
            );
if($this->cart->insert($data)){ 
  $data = $this->cart->contents();
  echo json_encode($data);
}
}
function delete(){
  $rowid = $_POST['rowid'];
  $data = array(
               'rowid'      => $rowid,
               'qty'        => 0,
              );

if($this->cart->update($data)){
  echo json_encode($rowid);
} 
}
function paymentsreceiving(){
  if(isset($_POST['email'])){
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $where = array(
                    'pid' => $pid 
      );
  $product = $this->datamodel->get_data('products','', $where);
  $amountCalc = $product[0]['price'] / 100000000;
  $this->load->library( "CurlAPI", null, 'curlapi');
  $secret = 'dospayout';
  $uniq = uniqid();
  $paid = 0;
  $time = time();
  $complete = 0;
  $orderID = md5($uniq);
  $callback = "/dos/cart/callback?invoice=".$orderID."&secret=".$secret;;
  $paymentsreceiving = $this->curlapi->paymentsReceiving($callback);
  $payto = $paymentsreceiving['address'];
  // echo $paymentsreceiving['address']."<br>";
  // echo $paymentsreceiving['callback'];
  $barcode = '<img src="http://chart.googleapis.com/chart?chs=125x125&cht=qr&chl='.$payto.'" width="50%">';
  $orderdata = array(
                      'orderid' => $orderID,
                      'time'    => $time,
                      'name'    => $name,
                      'email'   => $email,
                      'cost'    => $amountCalc,
                      'payto'   => $payto,
                      'items'   => $product[0]['p_key']

                );
  //insert into DB
  $queryOrder = $this->datamodel->insert_data('orders', $orderdata);
  if(isset($queryOrder) != 0){
  $data = array('amountCalc' => $amountCalc, 'payto' => $payto, 'barcode' => $barcode);
  echo json_encode($data);

  $host = base_url();
      $emailTitle = "New Purchase";
      $emailTitle_Customer = "Order Confirmation";
      $bodyEmail = <<<EOD
        <h1>New Purchase</h1>
        Order: $orderID <br>
        Email: $email <br>
        Name: $name <br>
        Payment Address: $payto <br>
    Payment Amount: $amountCalc <br>
EOD;
 
        $headers = "From: noreply@".$host."\r\n";
        $headers .= "Content-type: text/html\r\n";
        $success = mail("emrul@lemexit.com", "$emailTitle", "$bodyEmail", "$headers");
         
        $custEmail = <<<EOD
        <h3>Please send payment to finalize your purchase</h3>
        Payment Address: $payto <br>
        Payment Amount: $amountCalc <br>
        Order: $orderID <br>
        Email: $email <br>
        Name: $name <br>
                
EOD;
        $customerCopy = mail($email, $emailTitle_Customer, $custEmail, $headers);
  }
  else{echo json_encode($queryOrder);}
}
  
}
function callback(){
$order_num = $_GET['invoice'];
$amount = $_GET['value'];
$amountCalc = $amount / 100000000;
}
function debugpayment(){
  $this->load->library( "CurlAPI", null, 'curlapi');
  $paymentsDebug = $this->curlapi->paymentsDebug();
  echo "<pre>";
  print_r($paymentsDebug);
  
}
function CartDestroy(){
  $this->cart->destroy();
}
 
}

?>
