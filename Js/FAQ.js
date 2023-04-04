function Question1() {
    var question1 = document.getElementById("question1");
    if (question1.classList.contains("quest-close")) {
        question1.classList.remove("quest-close");
        question1.classList.add("quest-open");
        addEventListener("resize", function () {
            if (window.innerWidth < 542) {
                question1.style.height = "210px";
            } else if (window.innerWidth < 768) {
                question1.style.height = "180px";
            } else if (window.innerWidth < 992) {
                question1.style.height = "160px";
            } else {
                question1.style.height = "115px";
            }
        });
        if (window.innerWidth < 542) {
            question1.style.height = "210px";
        } else if (window.innerWidth < 768) {
            question1.style.height = "180px";
        } else if (window.innerWidth < 992) {
            question1.style.height = "160px";
        } else {
            question1.style.height = "115px";
        }
        document.getElementById("question2").classList.remove("quest-open");
        document.getElementById("question2").classList.add("quest-close");
        document.getElementById("question3").classList.remove("quest-open");
        document.getElementById("question3").classList.add("quest-close");
        document.getElementById("question4").classList.remove("quest-open");
        document.getElementById("question4").classList.add("quest-close");
        document.getElementById("question5").classList.remove("quest-open");
        document.getElementById("question5").classList.add("quest-close");
        document.getElementById("question6").classList.remove("quest-open");
        document.getElementById("question6").classList.add("quest-close");
        document.getElementById("question7").classList.remove("quest-open");
        document.getElementById("question7").classList.add("quest-close");

    } else {
        question1.classList.remove("quest-open");
        question1.classList.add("quest-close");
        question1.style.height = "0";
    }
}

function Question2() {
    var question2 = document.getElementById("question2");
    if (question2.classList.contains("quest-close")) {
        question2.classList.remove("quest-close");
        question2.classList.add("quest-open");
        addEventListener("resize", function () {
            if (window.innerWidth < 467) {
                question2.style.height = "940px";
            } else if (window.innerWidth < 474) {
                question2.style.height = "920px";
            } else if (window.innerWidth < 511) {
                question2.style.height = "865px";
            } else if (window.innerWidth < 768) {
                question2.style.height = "765px";
            } else if (window.innerWidth < 992) {
                question2.style.height = "635px";
            } else if (window.innerWidth < 1400) {
                question2.style.height = "550px";
            } else {
                question2.style.height = "500px";
            }
        });
        if (window.innerWidth < 467) {
            question2.style.height = "940px";
        } else if (window.innerWidth < 474) {
            question2.style.height = "920px";
        } else if (window.innerWidth < 511) {
            question2.style.height = "865px";
        } else if (window.innerWidth < 768) {
            question2.style.height = "765px";
        } else if (window.innerWidth < 992) {
            question2.style.height = "635px";
        } else if (window.innerWidth < 1400) {
            question2.style.height = "550px";
        } else {
            question2.style.height = "500px";
        }
        document.getElementById("question1").classList.remove("quest-open");
        document.getElementById("question1").classList.add("quest-close");
        document.getElementById("question3").classList.remove("quest-open");
        document.getElementById("question3").classList.add("quest-close");
        document.getElementById("question4").classList.remove("quest-open");
        document.getElementById("question4").classList.add("quest-close");
        document.getElementById("question5").classList.remove("quest-open");
        document.getElementById("question5").classList.add("quest-close");
        document.getElementById("question6").classList.remove("quest-open");
        document.getElementById("question6").classList.add("quest-close");
        document.getElementById("question7").classList.remove("quest-open");
        document.getElementById("question7").classList.add("quest-close");
    } else {
        question2.classList.remove("quest-open");
        question2.classList.add("quest-close");
        question2.style.height = "0";
    }
}

function Question3() {
    var question3 = document.getElementById("question3");
    if (question3.classList.contains("quest-close")) {
        question3.classList.remove("quest-close");
        question3.classList.add("quest-open");
        question3.style.height = "75px";
        document.getElementById("question1").classList.remove("quest-open");
        document.getElementById("question1").classList.add("quest-close");
        document.getElementById("question2").classList.remove("quest-open");
        document.getElementById("question2").classList.add("quest-close");
        document.getElementById("question4").classList.remove("quest-open");
        document.getElementById("question4").classList.add("quest-close");
        document.getElementById("question5").classList.remove("quest-open");
        document.getElementById("question5").classList.add("quest-close");
        document.getElementById("question6").classList.remove("quest-open");
        document.getElementById("question6").classList.add("quest-close");
        document.getElementById("question7").classList.remove("quest-open");
        document.getElementById("question7").classList.add("quest-close");

    } else {
        question3.classList.remove("quest-open");
        question3.classList.add("quest-close");
        question3.style.height = "0";
    }
}

function Question4() {
    var question4 = document.getElementById("question4");
    if (question4.classList.contains("quest-close")) {
        question4.classList.remove("quest-close");
        question4.classList.add("quest-open");
        addEventListener("resize", function () {
            if (window.innerWidth < 433) {
                question4.style.height = "450px";
            } else if (window.innerWidth < 470) {
                question4.style.height = "400px";
            } else if (window.innerWidth < 538) {
                question4.style.height = "355px";
            } else if (window.innerWidth < 768) {
                question4.style.height = "315px";
            } else if (window.innerWidth < 992) {
                question4.style.height = "250px";
            } else {
                question4.style.height = "165px";
            }
        });
        if (window.innerWidth < 433) {
            question4.style.height = "450px";
        } else if (window.innerWidth < 470) {
            question4.style.height = "400px";
        } else if (window.innerWidth < 538) {
            question4.style.height = "355px";
        } else if (window.innerWidth < 768) {
            question4.style.height = "315px";
        } else if (window.innerWidth < 992) {
            question4.style.height = "250px";
        } else {
            question4.style.height = "165px";
        }
        document.getElementById("question1").classList.remove("quest-open");
        document.getElementById("question1").classList.add("quest-close");
        document.getElementById("question2").classList.remove("quest-open");
        document.getElementById("question2").classList.add("quest-close");
        document.getElementById("question3").classList.remove("quest-open");
        document.getElementById("question3").classList.add("quest-close");
        document.getElementById("question5").classList.remove("quest-open");
        document.getElementById("question5").classList.add("quest-close");
        document.getElementById("question6").classList.remove("quest-open");
        document.getElementById("question6").classList.add("quest-close");
        document.getElementById("question7").classList.remove("quest-open");
        document.getElementById("question7").classList.add("quest-close");
    } else {
        question4.classList.remove("quest-open");
        question4.classList.add("quest-close");
        question4.style.height = "0";
    }
}

function Question5() {
    var question5 = document.getElementById("question5");
    if (question5.classList.contains("quest-close")) {
        question5.classList.remove("quest-close");
        question5.classList.add("quest-open");
        addEventListener("resize", function () {
            if (window.innerWidth < 433) {
                question5.style.height = "450px";
            } else if (window.innerWidth < 470) {
                question5.style.height = "400px";
            } else if (window.innerWidth < 768) {
                question5.style.height = "355px";
            } else if (window.innerWidth < 992) {
                question5.style.height = "280px";
            } else if (window.innerWidth < 1400) {
                question5.style.height = "230px";
            } else {
                question5.style.height = "210px";
            }
        });
        if (window.innerWidth < 433) {
            question5.style.height = "450px";
        } else if (window.innerWidth < 470) {
            question5.style.height = "400px";
        } else if (window.innerWidth < 768) {
            question5.style.height = "355px";
        } else if (window.innerWidth < 992) {
            question5.style.height = "280px";
        } else if (window.innerWidth < 1400) {
            question5.style.height = "230px";
        } else {
            question5.style.height = "210px";
        }
        document.getElementById("question1").classList.remove("quest-open");
        document.getElementById("question1").classList.add("quest-close");
        document.getElementById("question2").classList.remove("quest-open");
        document.getElementById("question2").classList.add("quest-close");
        document.getElementById("question3").classList.remove("quest-open");
        document.getElementById("question3").classList.add("quest-close");
        document.getElementById("question4").classList.remove("quest-open");
        document.getElementById("question4").classList.add("quest-close");
        document.getElementById("question6").classList.remove("quest-open");
        document.getElementById("question6").classList.add("quest-close");
        document.getElementById("question7").classList.remove("quest-open");
        document.getElementById("question7").classList.add("quest-close");
    } else {
        question5.classList.remove("quest-open");
        question5.classList.add("quest-close");
        question5.style.height = "0";
    }
}

function Question6() {
    var question6 = document.getElementById("question6");
    if (question6.classList.contains("quest-close")) {
        question6.classList.remove("quest-close");
        question6.classList.add("quest-open");
        addEventListener("resize", function () {
            if (window.innerWidth < 444) {
                question6.style.height = "165px";
            } else if (window.innerWidth < 491) {
                question6.style.height = "145px";
            } else if (window.innerWidth < 768) {
                question6.style.height = "120px";
            } else if (window.innerWidth < 992) {
                question6.style.height = "115px";
            } else {
                question6.style.height = "90px";
            }
        });
        if (window.innerWidth < 444) {
            question6.style.height = "165px";
        } else if (window.innerWidth < 491) {
            question6.style.height = "145px";
        } else if (window.innerWidth < 768) {
            question6.style.height = "120px";
        } else if (window.innerWidth < 992) {
            question6.style.height = "115px";
        } else {
            question6.style.height = "90px";
        }
        document.getElementById("question1").classList.remove("quest-open");
        document.getElementById("question1").classList.add("quest-close");
        document.getElementById("question2").classList.remove("quest-open");
        document.getElementById("question2").classList.add("quest-close");
        document.getElementById("question3").classList.remove("quest-open");
        document.getElementById("question3").classList.add("quest-close");
        document.getElementById("question4").classList.remove("quest-open");
        document.getElementById("question4").classList.add("quest-close");
        document.getElementById("question5").classList.remove("quest-open");
        document.getElementById("question5").classList.add("quest-close");
        document.getElementById("question7").classList.remove("quest-open");
        document.getElementById("question7").classList.add("quest-close");
    } else {
        question6.classList.remove("quest-open");
        question6.classList.add("quest-close");
        question6.style.height = "0";
    }
}

function Question7() {
    var question7 = document.getElementById("question7");
    if (question7.classList.contains("quest-close")) {
        question7.classList.remove("quest-close");
        question7.classList.add("quest-open");
        addEventListener("resize", function () {
            if (window.innerWidth < 533) {
                question7.style.height = "185px";
            } else if (window.innerWidth < 768) {
                question7.style.height = "150px";
            } else if (window.innerWidth < 992) {
                question7.style.height = "125px";
            } else {
                question7.style.height = "100px";
            }
        });
        if (window.innerWidth < 533) {
            question7.style.height = "185px";
        } else if (window.innerWidth < 768) {
            question7.style.height = "150px";
        } else if (window.innerWidth < 992) {
            question7.style.height = "125px";
        } else {
            question7.style.height = "100px";
        }
        document.getElementById("question1").classList.remove("quest-open");
        document.getElementById("question1").classList.add("quest-close");
        document.getElementById("question2").classList.remove("quest-open");
        document.getElementById("question2").classList.add("quest-close");
        document.getElementById("question3").classList.remove("quest-open");
        document.getElementById("question3").classList.add("quest-close");
        document.getElementById("question4").classList.remove("quest-open");
        document.getElementById("question4").classList.add("quest-close");
        document.getElementById("question5").classList.remove("quest-open");
        document.getElementById("question5").classList.add("quest-close");
        document.getElementById("question6").classList.remove("quest-open");
        document.getElementById("question6").classList.add("quest-close");
    } else {
        question7.classList.remove("quest-open");
        question7.classList.add("quest-close");
        question7.style.height = "0";
    }
}