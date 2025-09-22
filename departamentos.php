<?php
  include_once("templates/header.php");
  include_once("config/connection.php");

  $departamentos = $conn->query("SELECT * FROM departamentos")->fetch_all(MYSQLI_ASSOC);
?>
  <div class="container">
    <h1 id="main-title">Departamentos</h1>
    <a href="<?= $BASE_URL ?>create_departamentos.php" class="btn btn-success mb-3">Novo Departamento</a>
    <?php if(count($departamentos) > 0): ?>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Descrição</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($departamentos as $dep): ?>
            <tr>
              <td><?= $dep["id"] ?></td>
              <td><?= $dep["descricao"] ?></td>
              <td>
                <a href="<?= $BASE_URL ?>edit_departamentos.php?id=<?= $dep["id"] ?>" class="btn btn-warning btn-sm">Editar</a>
                <form style="display:inline;" action="<?= $BASE_URL ?>config/process_departamento.php" method="POST">
                  <input type="hidden" name="type" value="delete">
                  <input type="hidden" name="id" value="<?= $dep["id"] ?>">
                  <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Nenhum departamento cadastrado.</p>
    <?php endif; ?>
  </div>
<?php
  include_once("templates/footer.php");
?>