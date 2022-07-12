<?php

class DefaultController extends Controller
{
  /**
   * list regs
   */
  public function read()
  {
    $regs = DefaultModel::all();
    return $this->view('home', ['regs' => $regs]);
  }
  /**
   * show regs to create
   */
  public function showall()
  {
    return $this->view('form');
  }
  /**
   * show regs to edit
   */
  public function show($value)
  {
    $id = (int) $value['id'];
    $reg = DefaultModel::find($id);

    return $this->view('form', ['reg' => $reg]);
  }
  /**
   * insert
   */
  public function create()
  {
    $reg = new DefaultModel;
    $reg->name = $this->request->name;
    $reg->email = $this->request->email;
    $reg->password = $this->request->password;

    if ($reg->showall()) {
      print json_encode("Registro salvo com sucesso!");
      return $this->read();
    }
    print json_encode("Erro ao salvar o registro!");
  }
  /**
   * update regs to edit
   */
  public function update($value)
  {
    $id = (int) $value['id'];
    $reg = DefaultModel::find($id);
    $reg->name = $this->request->name;
    $reg->email = $this->request->email;
    $reg->password = $this->request->password;

    if ($reg->save()) {
      print json_encode("Registro salvo com sucesso!");
      return $this->read();
    }
    print json_encode("Erro ao salvar o registro!");
  }
  /**
   * delete regs by id
   */
  public function delete($value)
  {
    $id = (int) $value['id'];

    if ($reg = DefaultModel::destroy($id)) {
      print json_encode("Registro removido com sucesso!");
      return $this->read();
    }
    print json_encode("Erro ao removido o registro!");
  }
}
