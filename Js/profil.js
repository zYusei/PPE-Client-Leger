    function myFunction() {
        var pwd = document.getElementById("old_password");
        if (pwd.getAttribute('type') == "password") {
        document.getElementById("old_eye").style.display="none";
        document.getElementById("old_eye_slash").style.display="block";
        pwd.setAttribute('type',"text");
        } else {
        document.getElementById("old_eye").style.display="block";
        document.getElementById("old_eye_slash").style.display="none";
        pwd.setAttribute('type',"password");
        }
    }

    function myFunction2() {
        var pwd = document.getElementById("new_password");
        if (pwd.getAttribute('type') == "password") { 
        document.getElementById("old_eye2").style.display="none";
        document.getElementById("old_eye_slash2").style.display="block"; 
        pwd.setAttribute('type',"text");
        } else {
        document.getElementById("old_eye2").style.display="block";
        document.getElementById("old_eye_slash2").style.display="none";
        pwd.setAttribute('type',"password");
        }
    }

    


