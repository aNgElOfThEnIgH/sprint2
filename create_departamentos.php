<?php
  include_once("templates/header.php");
  include_once("config/connection.php");
?>
  <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Cadastrar Departamento</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process_departamento.php" method="POST">
      <input type="hidden" name="type" value="create">
      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text" class="form-control" id="descricao" name="descricao" required>
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
  </div>
<?php
  include_once("templates/footer.php");
?>