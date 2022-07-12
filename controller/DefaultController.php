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
      return $this->read();
    }
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
    $reg->save();

    return $this->read();
  }
  /**
   * delete regs by id
   */
  public function delete($value)
  {
    $id = (int) $value['id'];
    $reg = DefaultModel::destroy($id);
    return $this->read();
  }
}
