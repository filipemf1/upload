<?php
include_once('config.php');
$msg = false;
if(isset($_FILES['certidao'])){
    $extensao = strtolower(substr($_FILES['certidao']['name'], -5));
    $certidao = md5(time()) . $extensao;
    $diretorio = "upload/certidao/";
    move_uploaded_file($_FILES['certidao']['tmp_name'], $diretorio . $certidao);
}
if(isset($_FILES['residencia'])){
    $extensao = strtolower(substr($_FILES['residencia']['name'], -5));
    $residencia = md5(time()) . $extensao;
    $diretorio = "upload/residencia/";
    move_uploaded_file($_FILES['residencia']['tmp_name'], $diretorio . $residencia);
}
$sqli_code = "INSERT INTO arquivo(codigo, certidao, residencia, data) VALUES(null, '$certidao', '$residencia, NOW())";
$result_salva = mysqli_query($con, $sqli_code);
header("location:enviado.php");
?>