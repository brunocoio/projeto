<div class="container">
  <form action="?controller=DefaultController&<?= isset($reg->id) ? "method=update&id={$reg->id}" : "method=create"; ?>" method="post">
    <div class="form-group">
      <div class="form-group">
        <label class="col-sm-2 col-form-label text-right" for="name">Nome:</label>
        <input type="text" class="form-control col-sm-8" name="name" id="name" value="<?= isset($reg->name) ? $reg->name : null; ?>" required />
      </div>
      <div class="form-group">
        <label class="col-sm-2 col-form-label text-right" for="email">Email:</label>
        <input type="email" class="form-control col-sm-8" name="email" id="email" value="<?= isset($reg->email) ? $reg->email : null; ?>" required />
      </div>
      <div class="form-group">
        <label class="col-sm-2 col-form-label text-right" for="password">Password:</label>
        <input type="text" class="form-control col-sm-8" name="password" id="password" value="<?= isset($reg->password) ? $reg->password : null; ?>" required />
      </div>
      <div class="form-group my-2">
        <input type="hidden" name="id" id="id" value="<?= isset($reg->id) ? $reg->id : null; ?>" />
        <button class="btn btn-outline-success mx-2" type="submit"><i class='fas fa-check'></i></button>
        <a class="btn btn-outline-danger mx-2" href="?controller=DefaultController&method=read"><i class='fas fa-times'></i></a>
      </div>
    </div>
  </form>
</div>