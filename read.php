<?php

require('header.php');

print "
<div class='container'>
  <div class='row'>";
print "<h5 class='text-muted my-2'>Usuários</h5>";
print "<table class='table table-striped table-hover'>";
print "
            <thead>
              <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Email</th>
                <th scope='col'>Password</th>
                <th scope='col'>Ação</th>
              </tr>
            </thead>
            ";
print "<tr>";

print "<td>id</td><td>name</td><td>email</td><td>password</td>";
print "<td><a href='form.php?id=id' target='self' class='btn btn-outline-warning mx-2'><i class='fas fa-pencil-alt'></i></a>";
print "<a href='' target='self' class='btn btn-outline-danger mx-2'><i class='fas fa-trash'></i></a></td>";

print "</tr>";
print "</table>";
print "
  </div>
</div>
";

$read = DefaultModel::readAll('tb_user', '', '', '', '');
foreach ($read as $val) {
  print $val->id;
  print $val->name;
  print $val->email;
}

require('footer.php');
