<?
require '../global/script.php';
require '../model/admin_function.php';

$adminid=$_POST['adminid'];
$adminname=$_POST['adminname'];
$admindob=$_POST['admindob'];
$adminsex=$_POST['adminsex'];
$adminemail=$_POST['adminemail'];
$adminphoneno=$_POST['adminphone'];
$adminpostcode=$_POST['adminpostcode'];
$admincity=$_POST['admincity'];
$adminaddress=$_POST['adminaddress'];
$profileurl="";

//If user upload image, store the data
if(!empty($_FILES['profileurl']) && $_FILES['profileurl']['name'] != null){
$errors= array();
$file_name = $_FILES['profileurl']['name'];
$file_size =$_FILES['profileurl']['size'];
$file_tmp =$_FILES['profileurl']['tmp_name'];
$ext_name = explode('.', $file_name);
$file_ext=strtolower(end($ext_name));
$profileurl = "profile_".str_replace(' ', '_', $file_name);
$target_dir = "../img/";
$target_file = $target_dir . $profileurl;

$extensions= array("jpeg","jpg","png","gif");

if(in_array($file_ext,$extensions)=== false){
$errors[]="Extension not allowed, please choose a JPEG or PNG file.";
}
if($file_size > 4194304){
$errors[]='File size must be below 4 MB';
}

if(empty($errors) == true){
$filepath = "../img/".$profileurl;
move_uploaded_file($file_tmp,$target_file);
}else{
$err_text = '';
foreach($errors as $error){
$err_text .= "- " . $error . "<br>";
}
}
}

$result=updateadmin($adminid,$adminname,$admindob,$adminsex,$adminemail,$adminphone,$adminpostcode,$admincity,$adminaddress,$profileurl);
?>

<script>
$(document).ready(function(){
<?if($result!="" && $result>0){?>
Swal.fire('Berjaya','Berjaya Kemaskini Profil!','success')
<? }else{ ?>
Swal.fire('Gagal','Kemaskini Profil Gagal!','error')
<? } ?>

.then((value)=>{
if(value.isConfirmed){
window.location.href='../view/admin_profile.php';
}
});
});
</script>