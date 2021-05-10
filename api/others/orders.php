<?php

    include("../dbconnect.php");
    
    if(isset($_GET['id'])){
        $orderDetails = array();
        $orderIDs = array();
        $sql = "select * from order_details where customer_id=".$_GET['id'];
        $res = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($res)){
            extract($row);
            array_push($orderIDs,$order_id);
        }
        
        $ocount = count($orderIDs);
        for($i=1;$i<=$ocount;$i++){
            $order = array();
            $sql = "select * from order_details where order_id=".$i;
            $res = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($res);
            
            $order['oid'] = $i;
            $order['datetime'] = $row[2];
            $order['gtotal'] = $row[1];
            $order['cid'] = $row[3];
            $order['admin'] = $row[4];
            $order['status'] = $row[5];
            
            $items = array();
            $sql1 = "select * from item_details where order_id=".$i;
            $res1 = mysqli_query($conn,$sql1);
            while($row1=mysqli_fetch_array($res1)){
                extract($row1);
                $item = array();
                $item['dno'] = $design_no;
                $item['sl'] = $size_l;
                $item['sxl'] = $size_xl;
                $item['sxxl'] = $size_xxl;
                $item['dtotal'] = $design_amt;
                array_push($items,$item);
            }
            $order['products'] = $items;
            array_push($orderDetails, $order);
        }
        
        echo json_encode($orderDetails);
        
    }

?>