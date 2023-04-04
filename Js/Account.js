function changeMonth(value) {
    var mois = document.getElementById("mois");
    var annee = document.getElementById("annee");
    var moisValue = parseInt(mois.value);
    if (moisValue + value > 12) {
        mois.value = 1;
        if (annee.value == 2030) {
            annee.value = 2021;
        } else {
            annee.value = parseInt(annee.value) + 1;
        }
    } else if (moisValue + value < 1) {
        mois.value = 12;
        if (annee.value == 2021) {
            annee.value = 2030;
        } else {
            annee.value = parseInt(annee.value) - 1;
        }
    } else {
        mois.value = moisValue + value;
    }
}

//event listener pour le changement de mois
document.getElementById("mois").addEventListener("change", function () {
    this.form.submit();
});

//event listener pour le changement d'année
document.getElementById("annee").addEventListener("change", function () {
    this.form.submit();
});

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}