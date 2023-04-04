function closeAlertDanger() {
    let alerte = document.querySelectorAll(".alert");
    alerte.forEach(element => {
        element.style.cssText = "display : none !important";
    });
}