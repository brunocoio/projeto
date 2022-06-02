<?php

class DefaultController extends Controller
{
  /**
   * list regs
   */
  public function readCon()
  {
    $regs = DefaultModel::allMod();
    return $this->view('home', ['regs' => $regs]);
  }
  /**
   * show regs to create
   */
  public function createCon()
  {
    return $this->view('form');
  }
  /**
   * show regs to edit
   */
  public function editCon($value)
  {
    $id = (int) $value['id'];
    $reg = DefaultModel::find($id);

    return $this->view('form', ['reg' => $reg]);
  }
  /**
   * save
   */
  public function updateCon()
  {
    $reg = new DefaultModel;
    $reg->name = $this->request->name;
    $reg->email = $this->request->email;
    $reg->password = $this->request->password;
    if ($reg->saveMod()) {
      return $this->readCon();
    }
  }
  /**
   * update regs to edit
   */
  public function refreshCon($value)
  {
    $id = (int) $value['id'];
    $reg = DefaultModel::find($id);
    $reg->name = $this->request->name;
    $reg->email = $this->request->email;
    $reg->password = $this->request->password;
    $reg->saveMod();

    return $this->readCon();
  }
  /**
   * delete regs by id
   */
  public function deleteCon($value)
  {
    $id = (int) $value['id'];
    $reg = DefaultModel::destroy($id);
    return $this->readCon();
  }
}
