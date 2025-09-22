<?php
  include_once("templates/header.php");
  include_once("config/connection.php");

  $id = $_GET['id'];
  $sql = "SELECT f.*, d.descricao AS departamento
          FROM funcionarios f
          JOIN departamentos d ON f.departamento_id = d.id
          WHERE f.id = $id";
  $funcionario = $conn->query($sql)->fetch_assoc();
?>
  <div class="container" id="view-contact-container"> 
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title"><?= $funcionario["nome"] ?></h1>
    <p class="bold">Afastado:</p>
    <p class="form-control"><?= $funcionario["afastado"] ?></p>
    <p class="bold">Departamento:</p>
    <p class="form-control"><?= $funcionario["departamento"] ?></p>
  </div>
<?php
  include_once("templates/footer.php");
?>