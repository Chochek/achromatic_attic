<?php
/**
 * Theme wrapper
 *
 * @link http://achromaticattic.com/an-introduction-to-the-achromatic_attic-theme-wrapper/
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */
function achromatic_attic_template_path() {
  return Achromatic_Attic_Wrapping::$main_template;
}

function achromatic_attic_sidebar_path() {
  return new Achromatic_Attic_Wrapping('templates/sidebar.php');
}

class Achromatic_Attic_Wrapping {
  // Stores the full path to the main template file
  static $main_template;

  // Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
  static $base;

  public function __construct($template = 'base.php') {
    $this->slug = basename($template, '.php');
    $this->templates = array($template);

    if (self::$base) {
      $str = substr($template, 0, -4);
      array_unshift($this->templates, sprintf($str . '-%s.php', self::$base));
    }
  }

  public function __toString() {
    $this->templates = apply_filters('achromatic_attic_wrap_' . $this->slug, $this->templates);
    return locate_template($this->templates);
  }

  static function wrap($main) {
    self::$main_template = $main;
    self::$base = basename(self::$main_template, '.php');

    if (self::$base === 'index') {
      self::$base = false;
    }

    return new Achromatic_Attic_Wrapping();
  }
}
add_filter('template_include', array('Achromatic_Attic_Wrapping', 'wrap'), 99);
