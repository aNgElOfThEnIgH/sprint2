<?php
include_once("connection.php");

$type = $_POST['type'];

if($type === "create") {
  $descricao = $_POST['descricao'];
  $sql = "INSERT INTO departamentos (descricao) VALUES ('$descricao')";
  $conn->query($sql);
  header("Location: ../departamentos.php");
} elseif($type === "edit") {
  $id = $_POST['id'];
  $descricao = $_POST['descricao'];
  $sql = "UPDATE departamentos SET descricao='$descricao' WHERE id=$id";
  $conn->query($sql);
  header("Location: ../departamentos.php");
} elseif($type === "delete") {
  $id = $_POST['id'];
  $sql = "DELETE FROM departamentos WHERE id=$id";
  $conn->query($sql);
  header("Location: ../departamentos.php");
}
?>