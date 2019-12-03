<?php

// basic page constructing class as template for more specific pages
// adds css and js and the dump option

abstract class View {

  protected $title = "Domain Name Form";
  protected $css = ["main.css"];
  protected $js = [];

  function __construct($title=NULL) {
    if($title) {
      $this->title = $title;
    }
  }

  function addJs($fileName) {
    $this->js[] = $fileName;
  }

  function addCss($fileName) {
    $this->css[] = $fileName;
  }

  abstract function dump();

}


