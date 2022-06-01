<?php
class DefaultModel
{
  private $atributos;
  /**
   * construct
   */
  public function __construct()
  {
  }
  /**
   * set regs
   */
  public function __set(string $atributo, $valor)
  {
    $this->atributos[$atributo] = $valor;
    return $this;
  }
  /**
   * get regs
   */
  public function __get(string $atributo)
  {
    return $this->atributos[$atributo];
  }
  /**
   * isset regs
   */
  public function __isset($atributo)
  {
    return isset($this->atributos[$atributo]);
  }
  /**
   * save reg
   */
  public function save()
  {
    $colunas = $this->preparar($this->atributos);
    if (!isset($this->id)) {
      $query = "INSERT INTO tb_user (" .
        implode(', ', array_keys($colunas)) .
        ") VALUES (" .
        implode(', ', array_values($colunas)) . ");";
    } else {
      foreach ($colunas as $key => $value) {
        if ($key !== 'id') {
          $definir[] = "{$key}={$value}";
        }
      }
      $query = "UPDATE tb_user SET " . implode(', ', $definir) . " WHERE id='{$this->id}';";
    }
    if ($conexao = Conexao::getInstance()) {
      $stmt = $conexao->prepare($query);
      if ($stmt->execute()) {
        return $stmt->rowCount();
      }
    }
    return false;
  }
  /**
   * val regs sintax
   */
  private function escapar($dados)
  {
    if (is_string($dados) & !empty($dados)) {
      return "'" . addslashes($dados) . "'";
    } elseif (is_bool($dados)) {
      return $dados ? 'TRUE' : 'FALSE';
    } elseif ($dados !== '') {
      return $dados;
    } else {
      return 'NULL';
    }
  }
  /**
   * validate regs
   */
  private function preparar($dados)
  {
    $resultado = array();
    foreach ($dados as $k => $v) {
      if (is_scalar($v)) {
        $resultado[$k] = $this->escapar($v);
      }
    }
    return $resultado;
  }
  /**
   * list
   */
  public static function all()
  {
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("SELECT * FROM tb_user;");
    $result = array();
    if ($stmt->execute()) {
      while ($rs = $stmt->fetchObject(DefaultModel::class)) {
        $result[] = $rs;
      }
    }
    if (count($result) > 0) {
      return $result;
    }
    return false;
  }
  /**
   * count regs
   */
  public static function count()
  {
    $conexao = Conexao::getInstance();
    $count = $conexao->exec("SELECT count(*) FROM tb_user;");
    if ($count) {
      return (int) $count;
    }
    return false;
  }
  /**
   * search by id
   */
  public static function find($id)
  {
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("SELECT * FROM tb_user WHERE id='{$id}';");
    if ($stmt->execute()) {
      if ($stmt->rowCount() > 0) {
        $resultado = $stmt->fetchObject('DefaultModel');
        if ($resultado) {
          return $resultado;
        }
      }
    }
    return false;
  }
  /**
   * detroy by id
   */
  public static function destroy($id)
  {
    $conexao = Conexao::getInstance();
    if ($conexao->exec("DELETE FROM tb_user WHERE id='{$id}';")) {
      return true;
    }
    return false;
  }
}
