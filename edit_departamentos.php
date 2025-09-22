<?php
  include_once("templates/header.php");
  include_once("config/connection.php");

  $id = $_GET['id'];
  $dep = $conn->query("SELECT * FROM departamentos WHERE id = $id")->fetch_assoc();
?>
  <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Editar Departamento</h1>
    <form id="edit-form" action="<?= $BASE_URL ?>config/process_departamento.php" method="POST">
      <input type="hidden" name="type" value="edit">
      <input type="hidden" name="id" value="<?= $dep['id'] ?>">
      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $dep['descricao'] ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
  </div>
<?php
  include_once("templates/footer.php");
?>