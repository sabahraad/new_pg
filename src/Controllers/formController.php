<?php
namespace Aamarpay\PaymentGateway\Controllers;

use Illuminate\Http\Request;
use Fhsinchy\Inspire\Inspire;

class formController
{
    public function form(){
        return view('aamarpay::checkoutPage');
    }

    public function pay(Request $request){


        $url = 'https://sandbox.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php
            $fields = array(
                'store_id' => 'aamarpaytest', //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
                 'amount' =>$request->amount, //transaction amount
                'payment_type' => 'VISA', //no need to change
                'currency' => $request->currency,  //currenct will be USD/BDT
                'tran_id' => rand(1111111,9999999), //transaction id must be unique from your end
                'cus_name' => $request->cus_name,  //customer name
                'cus_email' => $request->cus_email, //customer email address
                'cus_add1' => 'Dhaka',  //customer address
                'cus_add2' => 'Mohakhali DOHS', //customer address
                'cus_city' => 'Dhaka',  //customer city
                'cus_state' => 'Dhaka',  //state
                'cus_postcode' => '1206', //postcode or zipcode
                'cus_country' => 'Bangladesh',  //country
                'cus_phone' => $request->cus_phone, //customer phone number
                'cus_fax' => 'Not¬Applicable',  //fax
                'ship_name' => 'ship name', //ship name
                'ship_add1' => 'House B-121, Road 21',  //ship address
                'ship_add2' => 'Mohakhali',
                'ship_city' => 'Dhaka', 
                'ship_state' => 'Dhaka',
                'ship_postcode' => '1212', 
                'ship_country' => 'Bangladesh',
                'desc' => 'payment description', 
                'success_url' => route('success'), //your success route
                'fail_url' => route('fail'), //your fail route
                'cancel_url' => route('cancel'), //your cancel url
                'opt_a' => 'Reshad',  //optional paramter
                'opt_b' => 'Akil',
                'opt_c' => 'Liza', 
                'opt_d' => 'Sohel',
                'signature_key' => 'dbb74894e82415a2f7ff0ec3a97e4183'); //signature key will provided aamarpay, contact integration@aamarpay.com for test/live signature key

                $fields_string = http_build_query($fields);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_URL, $url);  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));	
            curl_close($ch); 
            $this->redirect_to_merchant($url_forward);
            // dd($this->redirect_to_merchant($url_forward));

    }

    function redirect_to_merchant($url) {

        ?>
        <html xmlns="http://www.w3.org/1999/xhtml">
          <head><script type="text/javascript">
            function closethisasap() { document.forms["redirectpost"].submit(); } 
          </script></head>
          <body onLoad="closethisasap();">
          
            <form name="redirectpost" method="post" action="<?php echo 'https://sandbox.aamarpay.com/'.$url; ?>"></form>
            <!-- for live url https://secure.aamarpay.com -->
          </body>
        </html>
        <?php	
        exit;
    } 

  
}