<?php 
session_start();
include "config.php";
$username=$_POST['username'];
$password=$_POST['password'];

$login=mysqli_query($conn, "SELECT * from user where username ='$username' and password='$password'");
$cek=mysqli_num_rows($login);
if ($cek>0) {
  $data =mysqli_fetch_assoc($login);
  if ($data['role']=="mahasiswa") {
    $_SESSION['username'];
    $_SESSION['role']= "mahasiswa";
    header("location: mahasiswa/halaman_mahasiswa.php");
  }elseif ($data['role']=="dosen") {
    $_SESSION['username']=$username;
    $_SESSION['role']="dosen";
    header("location:dosen/halaman_dosen.php");
  } elseif($data['role']=="staff"){
    $_SESSION['username']=$username;
    $_SESSION['role']="staff";
    header("location:dosen/halaman_staff.php");
  }
  else {
    header("location:faq.php?pesan=gagal");
  }
}else {
  echo "<script>alert('username dan password tidak benar');location.href='percob.php';</script>";
    
}
?>
