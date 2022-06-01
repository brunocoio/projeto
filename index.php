  <?php
  require_once __DIR__ . '/view/header.php';

  if ($_GET) {
    $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL) : NULL;
    $method     = isset($_GET['method']) ? $_GET['method'] : NULL;
    if ($controller && $method) {
      if (method_exists($controller, $method)) {
        $parameters = $_GET;
        unset($parameters['controller']);
        unset($parameters['method']);
        call_user_func(array($controller, $method), $parameters);
      } else {
        echo "Método não encontrado!";
      }
    } else {
      echo "Controller não encontrado!";
    }
  }

  require_once __DIR__ . '/view/footer.php';
