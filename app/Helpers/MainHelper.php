<?php




if (! function_exists('Gender')) {

    function Gender() {

        $type = [
            '0' => 'ولد',
            '1' => 'بنت'

        ];

        return $type;
    }
}


if (! function_exists('Status')) {

    function Status() {

        $status = [
            '0' => 'غير مفعل',
            '1' => 'مفعل'

        ];

        return $status;
    }
}

if (! function_exists('YesOrNo')) {

    function YesOrNo() {

        $status = [
            '1' => 'نعم',
            '2' => 'لا'

        ];

        return $status;
    }
}


if (! function_exists('getCartCount')) {

    function getCartCount()
    {
        $count = 0;

        $cart = session()->get('cart');

        if($cart) {
            $count = count((array) $cart);
        }

        return $count;
    }

}



if (! function_exists('add3dots')) {

    function add3dots($string, $repl, $limit)
    {
      if(strlen($string) > $limit)
      {
        return substr($string, 0, $limit) . $repl;
      }
      else
      {
        return $string;
      }
    }

}



