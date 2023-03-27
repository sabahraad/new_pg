# new_pg
aamarPay payment gateway package 

Install it using this command -

composer require aamarpay/payment-gateway

add providers and aliases in your project config\app.php - 

'providers' => [

 Aamarpay\PaymentGateway\Providers\formProvider::class,
 
],

'aliases' => Facade::defaultAliases()->merge([

        'aamarpay'=> Aamarpay\PaymentGateway\Providers\formProvider::class,
        
    ])->toArray(),
    
    
 Create a form and hit the pay route it will redirect you to the Payment Gateway
 
Mandatory input field name ->
  cus_name
  cus_email
  cus_phone
  currency 
  amount
  
 Go to vendor/aamarpay/src/controllers/formController 
 
 set the following field
 
'store_id' => 'your store id',
signature_key' => 'your key'

Make 3 routes in your project & named them 'success','fail','cancel' and declare them in VerifyCsrfToken file .














