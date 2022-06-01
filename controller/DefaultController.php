<?php

class DefaultController extends Controller
{
  /**
   * list regs
   */
  public function listar()
  {
    $regs = DefaultModel::all();
    return $this->view('home', ['regs' => $regs]);
  }
  /**
   * show regs to create
   */
  public function criar()
  {
    return $this->view('form');
  }
  /**
   * show regs to edit
   */
  public function editar($dados)
  {
    $id = (int) $dados['id'];
    $reg = DefaultModel::find($id);

    return $this->view('form', ['reg' => $reg]);
  }
  /**
   * save
   */
  public function salvar()
  {
    $reg = new DefaultModel;
    $reg->name = $this->request->name;
    $reg->email = $this->request->email;
    $reg->password = $this->request->password;
    if ($reg->save()) {
      return $this->listar();
    }
  }
  /**
   * update regs to edit
   */
  public function atualizar($dados)
  {
    $id = (int) $dados['id'];
    $reg = DefaultModel::find($id);
    $reg->name = $this->request->name;
    $reg->email = $this->request->email;
    $reg->password = $this->request->password;
    $reg->save();

    return $this->listar();
  }
  /**
   * delete regs by id
   */
  public function excluir($dados)
  {
    $id = (int) $dados['id'];
    $reg = DefaultModel::destroy($id);
    return $this->listar();
  }
}
