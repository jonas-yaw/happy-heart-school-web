function validateForm() {
    var Name = document.forms["admission-form"]["Name"].value;
    var Email = document.forms["admission-form"]["Email"].value;
    var Phone = document.forms["admission-form"]["Phone"].value;
    var enq_email = document.forms["enquiry-form"]["enq-Email"].value;
    var enquiry = document.forms["enquiry-form"]["enquiry"].value;

    if (Name == "") {
        alert("Name must be filled out");
        return false;
    }

    if (Email == "") {
        alert("Email must be filled out");
        return false;
    }

    if (Phone == "") {
        alert("Phone Number must be filled out");
        return false;
    }

    if (enq_email == "") {
        alert("Email must be filled out");
        return false;
    }

    if (enquiry == "") {
        alert("Enquiry must be filled out");
        return false;
    }

}

function validateEnquiryForm() {
    var enq_email = document.forms["enquiry-form"]["enq-Email"].value;
    var enquiry = document.forms["enquiry-form"]["enquiry"].value;

    if (enq_email == "") {
        alert("Email must be filled out");
        return false;
    }

    if (enquiry == "") {
        alert("Enquiry must be filled out");
        return false;
    }

}
