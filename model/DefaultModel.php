<?php

class DefaultModel
{
  /**
   * variable declaration
   * declaração de variáveis
   */
  public $id;
  public $name;
  public $email;
  public $password;

  /**
   * set
   */
  public function set($string)
  {
    # code...
  }
  public function setId($string)
  {
    $this->name = $string;
  }
  public function setName($string)
  {
    $this->name = $string;
  }
  public function setMail($string)
  {
    $this->email = $string;
  }
  public function setPassword($string)
  {
    $this->password = $string;
  }

  /**
   * get
   */
  public function get()
  {
    # code...
  }
  public function getId()
  {
    return $this->id;
  }
  public function getName()
  {
    return $this->name;
  }
  public function getMail()
  {
    return $this->email;
  }
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * CRUD functions
   */

  /**
   * create
   */
  public function create()
  {
    # code...
  }

  /**
   * read all
   */
  public function readAll($table, $where = null, $order = null, $limit = null, $type = null)
  {
    $query = (new Connect($table))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
    return $query;
  }

  /**
   * read id
   */
  public function readId()
  {
    # code...
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
