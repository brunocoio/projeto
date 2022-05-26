<?php

class DefaultController
{
  /**
   * create
   */
  public function create()
  {
    # code...
  }

  /**
   * read
   */
  public function read($table, $where = null, $order = null, $limit = null)
  {
    $query = (new Connect($table))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);

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
    foreach ($query as $val) {
      print "<tr>";
      print "<td>{$val->id}</td><td>{$val->name}</td><td>{$val->email}</td><td>{$val->password}</td>";
      print "<td><a href='' target='self' class='btn btn-outline-warning mx-2'><i class='fas fa-pencil-alt'></i></a>";
      print "<a href='' target='self' class='btn btn-outline-danger mx-2'><i class='fas fa-trash'></i></a></td>";
      print "</tr>";
    }
    print "</table>";
  }

  /**
   * update
   */
  public function update()
  {
    # code...
  }

  /**
   * delete
   */
  public function delete()
  {
    # code...
  }
}
