function validateForm() {
    console.log('hi')
    var Name = document.forms["admission-form"]["Name"].value;
    var Email = document.forms["admission-form"]["Email"].value;
    var Phone = document.forms["admission-form"]["Phone"].value;

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


var alls = document.querySelectorAll('.forum-item');

var suggestions = document.querySelectorAll('.suggestions');
var academic = document.querySelectorAll('.academic');

function hide_init(){
for (var i = 0; i < alls.length; ++i) { 
    alls[i].style.display = 'none'; 
 }
}
 
function show_suggestions(){  
 //call the inital hide function
 hide_init();
 //loop through red-tagged items and show them  
for (var i = 0; i < suggestions.length; ++i) { 
    suggestions[i].style.display = 'inline-block'; 
 } 
}

function show_academic(){  
    //call the inital hide function
    hide_init();
    //loop through red-tagged items and show them  
    for (var i = 0; i < academic.length; ++i) { 
        academic[i].style.display = 'inline-block'; 
    } 
}
   
 
 function show_all(){  
    //loop through all items and show them
     for (var i = 0; i < alls.length; ++i) { 
   alls[i].style.display = 'inline-block'; 
  } 
}

 
