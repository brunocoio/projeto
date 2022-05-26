<?php

class DefaultModel
{
  /**
   * variable declaration
   * declaração de variáveis
   */
  private $name;
  private $email;
  private $password;

  /**
   * set
   */
  public function set($string)
  {
    # code...
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
}
