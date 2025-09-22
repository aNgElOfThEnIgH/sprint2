<?php
  include_once("templates/header.php");
  include_once("config/connection.php");

  $departamentos = $conn->query("SELECT id, descricao FROM departamentos")->fetch_all(MYSQLI_ASSOC);
?>
  <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Cadastrar Funcionário</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
      <input type="hidden" name="type" value="create">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
      </div>
      <div class="form-group">
        <label for="afastado">Afastado:</label>
        <select class="form-control" id="afastado" name="afastado">
          <option value="nao">Não</option>
          <option value="sim">Sim</option>
        </select>
      </div>
      <div class="form-group">
        <label for="departamento_id">Departamento:</label>
        <select class="form-control" id="departamento_id" name="departamento_id" required>
          <?php foreach($departamentos as $dep): ?>
            <option value="<?= $dep['id'] ?>"><?= $dep['descricao'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
  </div>
<?php
  include_once("templates/footer.php");
?>