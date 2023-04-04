
function myFun() {
    const container = document.getElementById('container');
    container.classList.remove("agauche");
    container.classList.add("active");
}

function lafun() {
    const container2 = document.getElementById('container');
    container2.classList.remove("active");
    container.classList.add("agauche");
}

const btnStep = document.getElementById('btnNextStep');
const btnSubmit = document.getElementById('btnResetPassword');
const step1 = document.getElementById('step1');
const step2 = document.getElementById('step2');
const step3 = document.getElementById('step3');
const currentStep = document.getElementById('currentStep');



const step1Email = document.getElementById('email_reset');
const step2SecurityQuestion = document.getElementById('Reset_security_question');
const step2question = document.getElementById('Reset_security_answer');
const step3newPassword = document.getElementById('new_password');
const step3confirmPassword = document.getElementById('confirm_password');

btnStep.addEventListener('click', formPasswordReset);

function formPasswordReset() {
    console.log(currentStep.value);
    if (currentStep.value == 1) {
        if (step1Email.value != "") {
            step1.style.display = "none";
            step2.style.display = "block";
            step3.style.display = "none";
            currentStep.value = 2;
        }
    } else if (currentStep.value == 2) {
        if (step2question.value != "" && step2SecurityQuestion.value != "") {
            step1.style.display = "none";
            step2.style.display = "none";
            step3.style.display = "block";
            document.getElementById("btnResetPassword").style.display = "block";
            currentStep.value = 3;
            btnStep.style.display = "none";
        }
    } else if (currentStep.value == 3) {
        if (step3newPassword.value != "" && step3confirmPassword.value != "") {
            document.getElementById("btnResetPassword").click();
        }
    }
}