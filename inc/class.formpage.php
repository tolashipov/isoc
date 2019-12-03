<?php

// this class controls the communication between back and front ends
// for actions concerning the form page.

class FormPage{

    function main(){
        $pv = new PageView();
        $pv->setComponent("formpage.php");
        $pv->addJs('form_validation.js');
        $pv->dump();
    }

    function showContactList($domainName) {
        $fpm = new FormPageModel();
        $pv = new PageView($domainName." Contacts");
        $data = $fpm->getDomainContactsByName($domainName);
        $pv->setComponent('formpage.php', $data);
        $pv->addJs('form_validation.js');
        $pv->dump();
    }

    function updateRegistrationPeriod($domainName, $years) {
        $fpm = new FormPageModel();
        $pv = new PageView("Registration update");
        $setDateResult = $fpm->setNewExpirationDate($domainName, $years);
        $data = isset($setDateResult["success"]) ? $fpm->getCurrentExpirationDateByName($domainName) : $setDateResult;
        //var_dump($setDateResult);
        //var_dump($data);
        $pv->setComponent('formpage.php', $data);
        $pv->addJs('form_validation.js');
        $pv->dump();
    }

}

?>