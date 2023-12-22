<?php 
    require_once('ripcord-master/ripcord.php');
 
    $url = 'https://kingvara.odoo.com/';
    $db = 'kingvara';
    $email = 'azkiacin@gmail.com';
    $password = 'hwaiting7817wannable_';
 
    $common = ripcord::client("$url/xmlrpc/2/common");
    $uid = $common->authenticate($db, $email, $password, []);
     
    if(!empty($uid)){
        // echo "Berhasil login dengan User ID : " . $uid . '</br>';
 
        $models = ripcord::client("$url/xmlrpc/2/object");
 
        // contoh memanggil method public search
        $partners = $models->execute_kw($db, $uid, $password, 'res.partner', 'search', [[]]);
 
        echo "<pre>" . print_r($partners, true) . "</pre>";
 
    }else{
        echo "Gagal login";
    }
?>
   
?>