<div class='container'>
  <div class='row'>
    <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th scope='col'>ID</th>
          <th scope='col'>Nome</th>
          <th scope='col'>Email</th>
          <th scope='col'>Password</th>
          <th scope='col'><a href="?controller=DefaultController&method=showall" class='btn btn-outline-info mx-2'><i class='fas fa-plus-circle'></i></a></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($regs) {
          foreach ($regs as $reg) {
        ?>
            <tr>
              <td><?= $reg->id; ?></td>
              <td><?= $reg->name; ?></td>
              <td><?= $reg->email; ?></td>
              <td><?= $reg->password; ?></td>
              <td>
                <a href='?controller=DefaultController&method=show&id=<?= $reg->id; ?>' class='btn btn-outline-warning mx-2'><i class='fas fa-pencil-alt'></i></a>
                <a href='?controller=DefaultController&method=delete&id=<?= $reg->id; ?>' class='btn btn-outline-danger mx-2'><i class='fas fa-trash'></i></a>
              </td>
            </tr>
          <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="4">Nenhum registro encontrado</td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>