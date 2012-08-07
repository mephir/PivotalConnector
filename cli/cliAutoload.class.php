<?php
class cliAutoload {
  private static $instance = null;
  protected $paths = array();

  public function getInstance()
  {
    if (is_null(self::$instance))
    {
      self::$instance = new cliAutoload();
    }
    return self::$instance;
  }

  public function __construct()
  {
    $dirs = glob('lib/*', GLOB_ONLYDIR);
    $dirs[] = 'lib';
    $dirs[] = 'cli/tasks';

    foreach($dirs as $dir) {
      foreach (glob($dir . '/*.class.php') as $file) {
        $this->paths[$this->className($file)] = $file;
      }
    }
  }

  private function className($path)
  {
    $parts = explode(DIRECTORY_SEPARATOR, $path);
    $filename = $parts[count($parts) -1];
    return substr($filename, 0, strpos($filename, '.'));
  }

  public function autoload($className)
  {
    require($this->paths[$className]);
  }

  /**
   * Register sfAutoload in spl autoloader.
   *
   * @return void
   */
  static public function register()
  {
    ini_set('unserialize_callback_func', 'spl_autoload_call');

    if (false === spl_autoload_register(array(self::getInstance(), 'autoload')))
    {
      throw new sfException(sprintf('Unable to register %s::autoload as an autoloading method.', get_class(self::getInstance())));
    }
  }

  /**
   * Unregister sfAutoload from spl autoloader.
   *
   * @return void
   */
  static public function unregister()
  {
    spl_autoload_unregister(array(self::getInstance(), 'autoload'));
  }
}