<!-- <?php 
$customer_list=array(
	"1" => array("name" => "Mai Văn Hoàn", "day_of_birth" => "1983/08/20", "address" => "Hà Nội", "profile" => "images/img1.jpg"),
    "2" =>array("name" => "Nguyễn Văn Nam", "day_of_birth" => "1983/08/21", "address" => "Bắc Giang", "profile" => "images/img2.jpg"),
    "3" =>array("name" => "Nguyễn Thái Hòa", "day_of_birth" => "1983/08/22", "address" => "Nam Định", "profile" => "images/img3.jpg"),
    "4" =>array("name" => "Trần Đăng Khoa", "day_of_birth" => "1983/08/17", "address" => "Hà Tây", "profile" => "images/img4.jpg"),
    "5" =>array("name" => "Nguyễn Đình Thi", "day_of_birth" => "1983/08/19", "address" => "Hà Nội", "profile" => "images/img5.jpg"),
    "6"=> array('name' =>"Thanh Minh" , "day_of_birth"=>"1991/9/21" , "address"=> "Hue" , "profile" => "img6.jpg" ),
    "7"=>array("name"=>"Minh Anh" , "day_of_birth"=>"2000/08/27" , "address"=>"Da Nang" , "profile"=> "7img7.jpg")
 );
function searchByDate($customer,$from_date,$to_date){
	if(empty($from_date)|| empty($to_date)){
		return $customer;
	}
	$filter_list=[];
	foreach ($customer as $cus) {
		if(!empty($from_date)&& (strtotime($cus["day_of_birth"])<strtotime($from_date)))
			continue;
		if(!empty($to_date)&&(strtotime($cus["day_of_birth"])>strtotime($to_date)))
			continue;
		$filter_list[]=$cus;
	}
	return $filter_list;
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>custoner-filter</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	 <?php 
	$from_date=null;
	$to_date=null;
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$from_date=$_POST["from"];
		$to_date=$_POST["to"];
	}
	$filter_customer=searchByDate($customer_list,$from_date,$to_date);
	 ?> 
<form method="POST" >
  Từ: <input id = "from" type="text" name="from" placeholder="yyyyy/mm/dd" value="<?php echo isset($from_date)?$from_date:''; ?>"/>
  Đến: <input id = "to" type="text" name="to" placeholder="yyyy/mm/dd" value="<?php echo isset($to_date)?$to_date:''; ?>" />
  <input type = "submit" id = "submit" value = "Lọc"/>
</form>
<table >
	<caption><h2 style="color:blue;margin-left:30px;">list customer</h2></caption>
	<thead>
		<tr>
			<th>STT</th>
			<th>Name</th>
			<th>birth</th>
			<th>address</th>
			<th>Image</th>
		</tr>
	</thead>
	<tbody>
		<?php if(count($filter_customer) == 0):?>
    <tr>
        <td colspan="5" class="message">Không tìm thấy khách hàng nào</td>
    </tr>
  <?php endif; ?>
  	<!-- <?php
  	echo "<pre>";
  	print_r($filter_customer);

  	?> -->
		<!-- <?php foreach($filter_customer as $index=> $customer): ?>
            <tr>
                <td><?php echo $index + 1;?></td>
                <td><?php echo $customer["name"];?></td>
                <td><?php echo $customer["day_of_birth"];?></td>
                <td><?php echo $customer["address"];?></td>
                <td><div class="profile"><img src="<?php echo $customer['profile'];?>"/></div> </td>
            </tr>
            <?php endforeach; ?>
	</tbody>
</table>
</body>
</html>  -->

<?php 
$customer_list =array("1"=> array('name' =>"thanh thien" ,"birth"=>"1997/8/2" ,"address"=>"hue"),
				"2"=>array("name"=>"Bao Anh" , "birth"=>"1983/5/4" , "address"=>"Ha Noi"), 
				"3"=>array("name"=>"aaaaaa" ,"birth"=>"1991/3/8","address"=>"Da Nang"),
				"4"=>array("name"=>"b" ,"birth"=>"1994/3/9","address"=>"Da Nang"),
				"5"=>array("name"=>"Anh Khang" ,"birth"=>"1971/3/23","address"=>"Da nang"));
function searchByDate1 ($customers,$from_date,$to_date){
	if(empty($from_date)&&empty($to_date)){
		return $customers;
	}
	$filter =[];
	foreach ($customers as $customer) {
		if(!empty($from_date)&& (strtotime($customer["birth"])<strtotime($from_date)))
			continue;
		if(!empty($to_date)&& (strtotime($customer["birth"])>strtotime($to_date)))
			continue;
		$filter[]=$customer;
	}
	return $filter;
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style_l.css">
</head>
<body>
	<?php
	// echo "<pre>";
	// print_r($_POST);
	//$from_date=null;
	// $to_date=null;
	if(isset($_POST["submit1"])){
		$from_date=isset($_POST["from"]) ? $_POST["from"] :"";
		$to_date=isset($_POST["to"]) ? $_POST["to"] :"";
		}
//can xet cai name cho he thong khoi  nham lan
	if(isset($_POST["aa"])){
		// var_dump("aa");
		$from_date="1983/2/2";
		$to_date="1991/3/9";
	}
		$customer_fiter=searchByDate1($customer_list,$from_date,$to_date);

	 ?>
	
<form method="POST" >
  Từ: <input id = "from" type="text" name="from" placeholder="yyyyy/mm/dd" value="<?php echo isset($from_date)?$from_date:''; ?>"/>
  Đến: <input id = "to" type="text" name="to" placeholder="yyyy/mm/dd" value="<?php echo isset($to_date)?$to_date:''; ?>" />
  <input type = "submit" name = "submit" value = "Lọc"/>
  <input type = "submit" name="aa" id = "a" value = "aa"/>
</form>
<table >
	<caption><h2 style="color:blue;margin-left:30px;">list customer</h2></caption>
	<thead>
		<tr>
			<th>STT</th>
			<th>Name</th>
			<th>birth</th>
			<th>address</th>
			<th>Image</th>
		</tr>
	</thead>
		<tbody>
		<?php if(count($customer_fiter) == 0):?>
    <tr>
        <td colspan="5" class="message">Không tìm thấy khách hàng nào</td>
    </tr>
  <?php endif; ?>
  	  <?php
  	echo "<pre>";
  	print_r($customer_fiter);

  	?>  
		<?php foreach($customer_fiter as $index=> $customer): ?>
            <tr>
                <td><?php echo $index + 1;?></td>
                <td><?php echo $customer["name"];?></td>
                <td><?php echo $customer["birth"];?></td>
                <td><?php echo $customer["address"];?></td>
                <td><div class="profile"><img src="<?php echo $customer['profile'];?>"/></div> </td>
            </tr>
            <?php endforeach; ?>
	</tbody>
	</table>
	<?php 
	// for($i=0;$i<=count($customer_fiter);$i++){
	// 	$ten=$customer_fiter["$i"];
	// 	}
	$namearr=[];
	foreach ($customer_list as $key => $value) {
		array_push($namearr,$value["name"]);
	}
	$arrlength = count($namearr);
  sort($namearr);
 for($x = 0; $x < $arrlength; $x++) {
     echo $namearr[$x];
     echo "<br>";}
    
	 ?>
	
	<!-- <?php 
	$favcolor="2";
	switch ($favcolor) {
	 	case '2':
	 		echo " thu 2";
	 		break;
	 		case'3':
	 	   echo " thu 2 vaf thu 3";
	 	   break;
	 	case '2':case'3':
	 	   echo " thu 2 vaf thu 3";
	 	   break;
	 	default:
	 		echo "ko co chi heets";
	 		break;
	 } ?> -->
</body>
</html>