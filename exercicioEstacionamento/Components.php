<?php

class Components {

  public static function load ( string $path, array $vars = [] ): MountedComponent {

    // declare variables
    foreach ( $vars as $name => $var ) {
      $$name = $var;
    }

    // starts ouput buffer
    ob_start();
    // requires file
    require $path;
    // get content and clean buffer
    $content = ob_get_clean();
    
    return MountedComponent::new( $content );
  }

  public static function get ( string $path, array $vars = [] ): string { 
  
    $content = Components::load( $path, $vars );
    return $content->render();
  }

  /**
   * @desc um dia eu acordei e tive uma ideia terrível, aí eu escrevi ela aqui em baixo. Favor não utilizar em produção.
   */
  public static function inline_script( string $path, array $script_args = [] ): string {

    $content = Components::load( $path );

    // type => module, defer
    $args_string = "";

    foreach ( $script_args as $k => $a ) {

      $args_string .= " ";

      // "defer"
      if ( $k && !$a ) {
        $args_string .= $k;
      } 

      else {
        $args_string .= "{$k}='$a'";
      }
    }

    return "<script $args_string> \n {$content->render()} \n </script>";
  }
}

class MountedComponent {
  
  private string $buffer = "";

  function __construct(string $buffer = "") {
    $this->buffer = $buffer;
  }

  static function new ( string $buffer = "" ) {
    return new MountedComponent($buffer);
  }
  
  function render (): string {
    return $this->buffer;
  }

}


// used for reusable components
interface Component {
  // static function New(): tatic;
  public function render(  ): string;
}

interface StaticComponent {
  // use Component::Drawable; 

  // public static function _render (): string;

  public static function render(  ): string; 
}



function RenderComponent( Component $c ) {



} 