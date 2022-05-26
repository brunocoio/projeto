<?php

require('header.php');
print "
<div class='container'>
  <div class='row'>";
print "<h5 class='text-muted my-2'>Usuários</h5>";
$read = DefaultController::read('tb_user', '', '', '');
print "
  </div>
</div>
";

require('footer.php');
