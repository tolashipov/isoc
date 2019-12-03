<form name="test_form" action="#" method="post">
    Domain Name: <input type="text" name="domain">
    <button type="button" name="domainSub">Submit</button>
    Registration period: <input type="number" name="registration">
    <button type="button" name="regSub">Submit</button>
    <span class="text-danger"></span>
</form>

<?php

// controlling back-end responses, and converting to front-end visualization

    if(isset($this->pageData)) {
        if(isset($this->pageData["err"])) {
            echo "<p class='text-danger'>".$this->pageData["err"]."</p>";
        } else if (isset($this->pageData["contacts"])) {
            echo "<table><thead><tr><th>Name</th><th>Phone</th><th>E-mail</th></tr></thead><tbody>";
            foreach ($this->pageData as $contact) {
                echo "<tr><td>".$contact['customername']."</td><td>".$contact['phonenumber']."</td><td>".$contact['email']."</td></tr>";
            }
            echo "</tbody></table>";
        } else if (isset($this->pageData["originalvaliduntil"])) {
            echo "<p id='expirationRenewalMessage'>Domain renewed, new expiration date is ".$this->pageData['originalvaliduntil']."</p>";
        }
    }
?>