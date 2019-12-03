<?php

// this class is based on the View class
// with the added options of setting data and the mid-page component

class PageView extends View {
  private $component = NULL;
  private $pagedata = NULL;

  function __construct($title=NULL) {
    parent::__construct($title);
  }

  function setComponent($component, $pageData=NULL) {
    $this->component = $component;
  if($pageData) {
    $this->pageData = $pageData;
  }
}

  function dump() {
    require "components/htmltop.php";
    require 'components/'.$this->component;
    require "components/htmlbot.php";
  }
}

