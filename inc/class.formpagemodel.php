<?php

// this class performs the sql queries required for the form page
// it is contacted by the FormPage class, and sends responses or error responses to it

class FormPageModel {

  function __construct() {
    $instance = ConnectDb::getInstance();
    $this->conn = $instance->getConnection();
  }

  private function getDomainDetailsByName($domainName) {
    $sql = "SELECT domainid, originalvaliduntil FROM `test_domains` WHERE `domainname` = :domainName";
    try {
      $stmnt = $this->conn->prepare($sql);
      $params = [
          'domainName' => $domainName
      ];
      $stmnt->execute($params);
      return $stmnt->fetch();
    }
    Catch (PDOException $e) {
      echo 'ERROR:'.$e->getMessage();
    }
  }

  private function getDomainContactsById($id) {
    $sql  = "SELECT * FROM test_contacts INNER JOIN test_domainreplicas ON test_domainreplicas.holder_customerid = test_contacts.customerid where test_domainreplicas.domainid = :id";
    try {
      $stmnt = $this->conn->prepare($sql);
      $params = [
          'id' => $id
      ];
      $stmnt->execute($params);
      return $stmnt->fetch();
    }
    Catch (PDOException $e) {
      echo 'ERROR:'.$e->getMessage();
    }
  }

  function getDomainContactsByName($domainName){
    $answer = [];
    // back-end validation of input
    $validationAnswer = $this->domainNameValidation($domainName);
    if (isset($validationAnswer['err'])) {
      $answer = $validationAnswer;
    } else {
      $answer["contacts"] = $this->getDomainContactsById($validationAnswer['domainid']);
    }
    return $answer;
  }

  function getCurrentExpirationDateByName ($name) {
    $sql = "SELECT originalvaliduntil FROM test_domains WHERE domainname = :domainname";
    try {
      $stmnt = $this->conn->prepare($sql);
      $params = [
          'domainname' => $name
      ];
      $stmnt->execute($params);
      return $stmnt->fetch();
    }
    Catch (PDOException $e) {
      echo 'ERROR:'.$e->getMessage();
    }
  }

  // this function updates the expiration date of the given domain name
  // gets 2 variables as input - domain-name & number of years
  // returns error on invalid inputs or success if all works fine
  function setNewExpirationDate ($domainName, $years) {
    $answer = [];
    // back-end validation of input
    $validationAnswer = $this->domainNameValidation($domainName);
    if (isset($validationAnswer['err'])) {
      $answer = $validationAnswer;
    } else if (!is_numeric($years) || $years < 1 || $years > 3){
      $answer["err"] = "Invalid period entered";
    } else {
      $sql = "UPDATE test_domains SET originalvaliduntil = ADDDATE(originalvaliduntil, interval :years year) WHERE domainname=:domain_name";
      try {
        $stmnt = $this->conn->prepare($sql);
        $params = [
          'years' => $years,
          'domain_name' => $domainName
        ];
        $stmnt->execute($params);
      }
      Catch (PDOException $e) {
        echo 'ERROR:'.$e->getMessage();
      }
      $sql ="UPDATE test_domains SET originalvaliduntil = ADDDATE(originalvaliduntil, interval 10 day) WHERE domainname=:domain_name";
      try {
        $stmnt = $this->conn->prepare($sql);
        $params = [
          'domain_name' => $domainName
        ];
        $stmnt->execute($params);
        $answer["success"] = true;
      }
      Catch (PDOException $e) {
        echo 'ERROR:'.$e->getMessage();
      }
    }
    return $answer;
  }

  // since more than one function have a need to validate this information
  // I am using a seperate function to avoid code duplication
  // returns array with "err" if not valid
  // returns domain details if valid
  private function domainNameValidation($name) {
    $answer = [];
    $sanitizedDomainName = filter_var($name, FILTER_SANITIZE_STRING);
    if (preg_match_all("/[a-z0-9.-]/", $sanitizedDomainName) != strlen($name)){
      $answer["err"] = "Invalid domain name";
    } else {
      $domainDetails = $this->getDomainDetailsByName($name);
      // checking if the domain name exists and valid
      if (!isset($domainDetails['domainid'])) {
        $answer["err"] = "Domain does not exist";
      } else if ($domainDetails['originalvaliduntil'] < date("Y-m-d H:i:s")) {
        $answer["err"] = "Domain expired";
      }
    }
    return empty($answer) ? $domainDetails : $answer;
  }

}
