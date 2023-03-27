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
 1. cus_name,
 2. cus_email,
 3. cus_phone,
 4. currency ,
 5. amount
  
 Go to vendor/aamarpay/src/controllers/formController 
 
 set the following field
 
1. 'store_id' => 'your store id',
2. signature_key' => 'your key'

Make 3 routes for successful payment,failed paymnet and canceled case in your project & named them 'success','fail','cancel' 

declare this routes in App\http\Middleware\VerifyCsrfToken file.














