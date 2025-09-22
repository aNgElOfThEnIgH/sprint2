<?php
include_once("connection.php");

$type = $_POST['type'];

if($type === "create") {
  $nome = $_POST['nome'];
  $afastado = $_POST['afastado'];
  $departamento_id = $_POST['departamento_id'];
  $sql = "INSERT INTO funcionarios (nome, afastado, departamento_id) VALUES ('$nome', '$afastado', $departamento_id)";
  $conn->query($sql);
  header("Location: ../index.php");
} elseif($type === "edit") {
  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $afastado = $_POST['afastado'];
  $departamento_id = $_POST['departamento_id'];
  $sql = "UPDATE funcionarios SET nome='$nome', afastado='$afastado', departamento_id=$departamento_id WHERE id=$id";
  $conn->query($sql);
  header("Location: ../index.php");
} elseif($type === "delete") {
  $id = $_POST['id'];
  $sql = "DELETE FROM funcionarios WHERE id=$id";
  $conn->query($sql);
  header("Location: ../index.php");
}
?>