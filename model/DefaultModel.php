<?php
class DefaultModel
{
  private $attributes;
  /**
   * construct
   */
  public function __construct()
  {
  }
  /**
   * set regs
   */
  public function __set(string $attribute, $val)
  {
    $this->attributes[$attribute] = $val;
    return $this;
  }
  /**
   * get regs
   */
  public function __get(string $attribute)
  {
    return $this->attributes[$attribute];
  }
  /**
   * isset regs
   */
  public function __isset($attribute)
  {
    return isset($this->attributes[$attribute]);
  }
  /**
   * insert reg
   */
  public function showall()
  {
    $columns = $this->validate($this->attributes);
    if (!isset($this->id)) {
      $query = "INSERT INTO tb_user (" .
        implode(', ', array_keys($columns)) .
        ") VALUES (" .
        implode(', ', array_values($columns)) . ");";
    }
    if ($connect = Connect::getInstance()) {
      $stmt = $connect->prepare($query);
      if ($stmt->execute()) {
        return $stmt->rowCount();
      }
    }
    return false;
  }
  /**
   * save reg
   */
  public function save()
  {
    $columns = $this->validate($this->attributes);
    if (isset($this->id)) {
      foreach ($columns as $key => $value) {
        if ($key !== 'id') {
          $definir[] = "{$key}={$value}";
        }
      }
      $query = "UPDATE tb_user SET " . implode(', ', $definir) . " WHERE id='{$this->id}';";
    }
    if ($connect = Connect::getInstance()) {
      $stmt = $connect->prepare($query);
      if ($stmt->execute()) {
        return $stmt->rowCount();
      }
    }
    return false;
  }
  /**
   * val regs sintax
   */
  private function escape($value)
  {
    if (is_string($value) & !empty($value)) {
      return "'" . addslashes($value) . "'";
    } elseif (is_bool($value)) {
      return $value ? 'TRUE' : 'FALSE';
    } elseif ($value !== '') {
      return $value;
    } else {
      return 'NULL';
    }
  }
  /**
   * validate regs
   */
  private function validate($value)
  {
    $result = array();
    foreach ($value as $k => $v) {
      if (is_scalar($v)) {
        $result[$k] = $this->escape($v);
      }
    }
    return $result;
  }
  /**
   * list
   */
  public static function all()
  {
    $connect = Connect::getInstance();
    $stmt = $connect->prepare("SELECT * FROM tb_user;");
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
    $connect = Connect::getInstance();
    $count = $connect->exec("SELECT count(*) FROM tb_user;");
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
    $connect = Connect::getInstance();
    $stmt = $connect->prepare("SELECT * FROM tb_user WHERE id='{$id}';");
    if ($stmt->execute()) {
      if ($stmt->rowCount() > 0) {
        $result = $stmt->fetchObject('DefaultModel');
        if ($result) {
          return $result;
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
    $connect = Connect::getInstance();
    if ($connect->exec("DELETE FROM tb_user WHERE id='{$id}';")) {
      return true;
    }
    return false;
  }
}
