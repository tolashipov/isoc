var testForm = document.forms.test_form;
domainNameMessage = document.getElementById('domainMsg');
registrationMessage = document.getElementById('registrationMsg');

testForm.elements.domainSub.onclick = function() {
    if(validate('domain')) {
        testForm.action = '/isoc/get_domain_contacts';
        testForm.submit();
    }
}
  
testForm.elements.regSub.onclick = function() {
    if(validate('registration')) {
        testForm.action = '/isoc/update_registration_period';
        testForm.submit();
    }
}


// front-end validation of input

function validate(type) {
    var e = document.querySelector(".text-danger");
    e.innerHTML = '';
    var domain_input = testForm.elements.domain.value.trim();
    var registration_input = testForm.elements.registration.value.trim();
    var err = [];
    if (domain_input == '') {
        err.push('Missing Domain Name');
    } else if (domain_input.length > 255 || domain_input.includes('--')) {
        err.push('Invalid Domain Name');
    } else if (/[^a-z0-9.-]/g.test(domain_input)){
        err.push('Invalid Domain Name');
    }
    if (type == 'registration') {
        if (registration_input == '') {
            err.push('Missing registration period');
        } else if (isNaN(registration_input)) {
            err.push('Invalid registration period');
        } else if (registration_input > 3 || registration_input < 1){
            err.push('Invalid registration period');
        }
    }
    
    if (err.length > 0) {
        e.innerHTML = err.join(', ');
        // removing previous successful message (if exists), to prevent confusion
        var elem = document.querySelector('#expirationRenewalMessage');
        if(elem){
            elem.style.display = 'none';
        }
        return false;
    } else {
        e.innerHTML = '';
        return true;
    }
}