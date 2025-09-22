<?php
  include_once("templates/header.php");
  include_once("config/connection.php");

  $sql = "SELECT f.id, f.nome, f.afastado, d.descricao AS departamento
          FROM funcionarios f
          JOIN departamentos d ON f.departamento_id = d.id";
  $result = $conn->query($sql);
  $funcionarios = $result->fetch_all(MYSQLI_ASSOC);
?>
  <div class="container">
    <h1 id="main-title">Funcionários</h1>
    <a href="<?= $BASE_URL ?>create.php" class="btn btn-success mb-3">Novo Funcionário</a>
    <a href="<?= $BASE_URL ?>departamentos.php" class="btn btn-info mb-3">Gerenciar Departamentos</a>
    <?php if(count($funcionarios) > 0): ?>
      <table class="table" id="contacts-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Afastado</th>
            <th>Departamento</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($funcionarios as $func): ?>
            <tr>
              <td><?= $func["id"] ?></td>
              <td><?= $func["nome"] ?></td>
              <td><?= $func["afastado"] == "sim" ? "Sim" : "Não" ?></td>
              <td><?= $func["departamento"] ?></td>
              <td class="actions">
                <a href="<?= $BASE_URL ?>show.php?id=<?= $func["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                <a href="<?= $BASE_URL ?>edit.php?id=<?= $func["id"] ?>"><i class="far fa-edit edit-icon"></i></a>
                <form class="delete-form" action="<?= $BASE_URL ?>config/process.php" method="POST" style="display:inline;">
                  <input type="hidden" name="type" value="delete">
                  <input type="hidden" name="id" value="<?= $func["id"] ?>">
                  <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>  
      <p id="empty-list-text">Ainda não há funcionários cadastrados, <a href="<?= $BASE_URL ?>create.php">clique aqui para adicionar</a>.</p>
    <?php endif; ?>
  </div>
<?php
  include_once("templates/footer.php");
?>