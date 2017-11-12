<?php namespace App\Services\Frontend\Payment;
/**
 * Created by PhpStorm.
 * User: junnyor
 * Date: 11/12/17
 * Time: 9:21 AM
 */

trait PaymentService{

    public function getCheckout($items, $request){
        $pagseguro_data = array();

        $pagseguro_data['email'] = 'miranda.fitness.avaliacao@gmail.com';
        $pagseguro_data['token'] = config('619A9082A5374BD1917745ABC9D471FF');

        $pagseguro_data['paymentMode'] = "default";
        $pagseguro_data['paymentMethod'] = $request["method"];
        $pagseguro_data['currency'] = 'BRL';

        $index = 0;
        foreach ($items as $item) {
            $index++;
            $pagseguro_data['itemId' . $index] = $item->id;
            $pagseguro_data['itemDescription' . $index] = str_limit($item->name, 80);
            $pagseguro_data['itemQuantity' . $index] = 1;
            $pagseguro_data['itemAmount' . $index] = number_format($item->value, 2, '.', '');
            $pagseguro_data['itemWeight' . $index] = null;

        }






        $pagseguro_data['senderHash'] = $request['senderHash'];
    }
}