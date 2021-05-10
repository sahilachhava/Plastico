<?php
include("dbconnect.php");

if(isset($_GET['subid'])){
	$sid = $_GET['subid'];
	$sql = "select subadmin_active from subadmin_details where subadmin_id=".$sid;
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	if($row[0] == 1){
		$sql = "update subadmin_details set subadmin_active=0 where subadmin_id=".$sid;
		$res = mysqli_query($conn,$sql);	
	}else{
		$sql = "update subadmin_details set subadmin_active=1 where subadmin_id=".$sid;
		$res = mysqli_query($conn,$sql);
	}
	echo "<script>window.history.back();</script>";
}

if(isset($_GET['cusid'])){
	$sid = $_GET['cusid'];
	$sql = "select customer_active from customer_details where customer_id=".$sid;
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	if($row[0] == 1){
		$sql = "update customer_details set customer_active=0 where customer_id=".$sid;
		$res = mysqli_query($conn,$sql);	
	}else{
		$sql = "update customer_details set customer_active=1 where customer_id=".$sid;
		$res = mysqli_query($conn,$sql);
	}
	echo "<script>window.history.back();</script>";
}

if(isset($_GET['supid'])){
	$sid = $_GET['supid'];
	$sql = "select supplier_active from supplier_details where supplier_id=".$sid;
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	if($row[0] == 1){
		$sql = "update supplier_details set supplier_active=0 where supplier_id=".$sid;
		$res = mysqli_query($conn,$sql);	
	}else{
		$sql = "update supplier_details set supplier_active=1 where supplier_id=".$sid;
		$res = mysqli_query($conn,$sql);
	}
	echo "<script>window.history.back();</script>";
}

?>