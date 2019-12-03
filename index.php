<?php
require "inc/common.php";

$route = empty($_GET['route']) ? [] : explode('/',$_GET['route']);
$fp = new FormPage;

if(empty($route[0])) {
  $fp->main();
}
else {
  switch($route[0]) {
    case 'main':
      $fp->main();
    break;
    case 'get_domain_contacts':
      $fp->showContactList($_POST['domain']);
    break;
    case 'update_registration_period':
      $fp->updateRegistrationPeriod($_POST['domain'], $_POST['registration']);
    break;
    default:
      $u->main($route[0]);
  }
}
?>