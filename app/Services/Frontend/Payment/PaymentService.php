<?php namespace App\Services\Frontend\Payment;
use App\Model\Frontend\Package;
use App\User;
/**
 * Created by PhpStorm.
 * User: junnyor
 * Date: 11/12/17
 * Time: 9:21 AM
 */

trait PaymentService{

    public function getCheckout($request){
        $pagseguro_data = array();

        $pagseguro_data['email'] = 'miranda.fitness.avaliacao@gmail.com';
        $pagseguro_data['token'] = 'C900DDAA8A04452AA119B81709A67FA9';


        $item = Package::find($request['item_id']);

        $pagseguro_data['paymentMode'] = "default";
        $pagseguro_data['paymentMethod'] = $request["method"];
        $pagseguro_data['currency'] = 'BRL';
        $pagseguro_data['reference'] = $request['order_id'];

        $pagseguro_data['itemId' . 1] = $item->id;
        $pagseguro_data['itemDescription' . 1] = str_limit($item->name, 80);
        $pagseguro_data['itemQuantity' . 1] = 1;
        $pagseguro_data['itemAmount' . 1] = $item->value;//number_format($item->value, 2, '.', '');
        

        $user = User::find($request['user_id']);
        
        //Em produção, mudar para os dados oficiais
        $pagseguro_data['senderName'] = 'Gilson de Melo';
        $pagseguro_data['senderEmail'] = 'gilson@sandbox.pagseguro.com.br';
        $pagseguro_data['senderCPF'] = str_replace('-', '', str_replace('.', '', $user->cpf));


        $pagseguro_data['creditCardHolderName'] = $request['card_name'];
        $pagseguro_data['creditCardHolderCPF'] = str_replace('-', '', str_replace('.', '', $request['card_personal_id']));
        $pagseguro_data['creditCardHolderBirthDate'] = $request['card_birth_date'];



        $pagseguro_data['installmentQuantity'] = $request['card_parcels'];
        $pagseguro_data['installmentValue'] = $item->value;
        $pagseguro_data['noInterestInstallmentQuantity'] = 2;


        $ddd = substr($request['cel'], 1, 2);
        
        $cel = substr($request['cel'], 5);
        
        $cel = str_replace('-', '', $cel);

        $pagseguro_data['senderCPF'] = str_replace('-', '', str_replace('.', '', $request['card_personal_id']));

        $pagseguro_data['senderAreaCode'] = $ddd;
        $pagseguro_data['senderPhone'] = $cel;
        $pagseguro_data['senderHash'] = $request['sender_hash'];



        $pagseguro_data['shippingAddressStreet'] = $request['address'];
        $pagseguro_data['shippingAddressNumber'] = $request['number'];
        $pagseguro_data['shippingAddressDistrict'] = $request['district'];
        $pagseguro_data['shippingAddressPostalCode'] = str_replace('-', '', $request['zip']);


        $pagseguro_data['shippingAddressCity'] = 'Candeias';
        $pagseguro_data['shippingAddressState'] = $request['state'];

        $pagseguro_data['shippingAddressCountry'] = 'BRA';


        $pagseguro_data['creditCardToken'] = $request['card_token'];


 /*
        $pagseguro_data['creditCardHolderAreaCode'] = $ddd;
        $pagseguro_data['creditCardHolderPhone'] = $cel;*/
       
        $pagseguro_data['billingAddressStreet'] = $request['address'];
        $pagseguro_data['billingAddressNumber'] = $request['number'];
        $pagseguro_data['billingAddressComplement'] = $request['address_complement'];
        $pagseguro_data['billingAddressDistrict'] = $request['district'];
        $pagseguro_data['billingAddressPostalCode'] = str_replace('-', '', $request['zip']);
        $pagseguro_data['billingAddressCity'] = $request['city'];
        $pagseguro_data['billingAddressState'] = $request['state'];
        $pagseguro_data['billingAddressCountry'] = 'BRA';


        return $pagseguro_data;
    }
}