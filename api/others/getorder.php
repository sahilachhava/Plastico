<?php

include("../dbconnect.php");

    //$json_example = '{"cid":"1234","time":"12/3/2019  4:9:17 PM","ctotal":"3950","products":[{"dno":1,"sl":0,"sxl":0,"sxxl":2,"dtotal":1050},{"dno":2,"sl":2,"sxl":2,"sxxl":0,"dtotal":2900}]}';
    //$ar = json_decode($json_example);   
    
    $orderData = str_replace('\\', '',trim(file_get_contents('php://input'),'"'));
    $ar = json_decode($orderData);
    
    $cid = $ar->{'cid'};
    $time = $ar->{'time'};
    $ctotal = $ar->{'ctotal'};
    $products = $ar->{'products'};
    $pcount = count($products);
    
    $sql = "insert into order_details(order_price,order_datetime,customer_id) values('$ctotal','$time','$cid')";
    if(mysqli_query($conn,$sql)){
        $sql1 = "select max(order_id) from order_details";
        $res = mysqli_query($conn,$sql1);
        $row = mysqli_fetch_array($res);
        $arr = array('response' => 'valid', 'oid' => $row[0]);
        $jso = json_encode($arr);
        echo $jso;   
        
        $sq = "select customer_name from customer_details where customer_id=".$cid;
        $re = mysqli_query($conn,$sq);
        $ro = mysqli_fetch_array($re);
        
        $sql2 = "insert into notification(customer_name,order_id,order_total) values('$ro[0]','$row[0]','$ctotal')";
        mysqli_query($conn,$sql2);
    }else{
        $arr = array('response' => 'invalid');
        $jso = json_encode($arr);
        echo $jso;  
    }
    
    for($i=0;$i<$pcount;$i++){
        $sql = "insert into item_details(design_no,size_l,size_xl,size_xxl,design_amt,order_id) values('".$products[$i]->{'dno'}."','".$products[$i]->{'sl'}."','".$products[$i]->{'sxl'}."','".$products[$i]->{'sxxl'}."','".$products[$i]->{'dtotal'}."',$row[0])";
        $rs = mysqli_query($conn,$sql);
    }
   
    // $myfile = fopen("orderdata.txt", "a");
    //  fwrite($myfile, $products[0]);
    // foreach($singleProduct as $products){
    //     fwrite($myfile, $row[0]);
    // }
    // fclose($myfile);
?>