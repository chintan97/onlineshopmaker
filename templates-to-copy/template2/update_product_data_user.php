<?php
session_start();

if (isset($_POST['firstname'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $file_open = fopen('user_folder/user_data.json', 'a+');
    $file_read_data = fread($file_open, filesize('user_folder/user_data.json'));
    $file_data = json_decode($file_read_data, true);
    $file_data['root'][$_SESSION['reg_email']]['firstname'] = $firstname;
    $file_data['root'][$_SESSION['reg_email']]['lastname'] = $lastname;
    $file_data['root'][$_SESSION['reg_email']]['contact_email'] = $email;
    $file_data['root'][$_SESSION['reg_email']]['company'] = $company;
    $file_data['root'][$_SESSION['reg_email']]['street'] = $street;
    $file_data['root'][$_SESSION['reg_email']]['city'] = $city;
    $file_data['root'][$_SESSION['reg_email']]['zip'] = $zip;
    $file_data['root'][$_SESSION['reg_email']]['state'] = $state;
    $file_data['root'][$_SESSION['reg_email']]['country'] = $country;
    $file_data['root'][$_SESSION['reg_email']]['contact_phone'] = $phone;
    file_put_contents('user_folder/user_data.json', json_encode($file_data));
    fclose($file_open);
}

$data = $_SESSION['cart'];
$file_name = 'product_data.json';
$str = file_get_contents($file_name);
$json = json_decode($str, true);
$root = array_keys($json)[0];
$flag = true;
$unavailable_products='';
foreach($data as $key => $value){
	$product = $data[$key];
	$old = (int)$json[$root][$product[0]][$product[1]][$product[2]]['product_stock'];
	if($old < $product[4]){
		$flag = false;
		unset($data[$key]);
		$unavailable_products .= $product[2];
		$unavailable_products .= ', ';
	}
}
if($flag){
	foreach($data as $key => $value){
		$product = $data[$key];
		$old = (int)$json[$root][$product[0]][$product[1]][$product[2]]['product_stock'];
		$new = $old - $product[4];
		$json[$root][$product[0]][$product[1]][$product[2]]['product_stock'] = (string)$new;
		file_put_contents($file_name, json_encode($json));
		echo '<script>window.location.href="checkout3.php";</script>';

	}
}
else{
	$new_data = array_merge(array(),$data);
	$_SESSION['cart'] = $new_data;
	$msg = 'Sorry! It looks like we are running low on following product[s] --> '.rtrim($unavailable_products,", ");
	echo '<script>alert("'.$msg.'");window.location.href="basket.php";</script>';
}

?>