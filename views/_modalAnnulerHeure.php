<!-- Modal Annuler Heure -->
<div class="modal fade" id="modalAnnulerHeure" tabindex="-1" aria-labelledby="modalAnnulerHeure" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Annuler une heure de conduite</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-body-refus">
        <form id="AnnulerHeure" action="" method="POST">
          <input type="hidden" id="id-cc" name="id-cc" value="">
          <select name="motif" id="selectMotif" class="form-select">
            <option value="L'élève ne s'est pas présenter">L'élève ne s'est pas présenter</option>
            <option value="Le moniteur ne s'est pas présenter">Le moniteur ne s'est pas présenter</option>
            <option value="Accident / véhicule déféctueux">Accident / véhicule déféctueux</option>
            <option value="Météo défavorable">Météo défavorable</option>
            <option value="Autre">Autre</option>
          </select>
          <textarea type="text" class="form-control mt-3" name="motifAutre" placeholder="Autre motif" id="inputAutre" maxlength="255"></textarea>
          <div id="charCount" class="text-end mt-2">
            <span id="charLeft">255</span> / 255
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button id="BtnAnnulerHeure" name="AnnulerHeure" type="submit" class="btn btn-primary">Valider</button>
      </div>
      </form>
    </div>
  </div>
</div>

<style>
  #inputAutre {
    display: none;
    resize: none !important;
  }

  #charCount {
    display: none;
  }
</style>


<script>
  document.getElementById("selectMotif").addEventListener("change", function() {
    if (this.value == "Autre") {
      document.getElementById("inputAutre").style.display = "block";
      document.getElementById("charCount").style.display = "block";
    } else {
      document.getElementById("inputAutre").style.display = "none";
      document.getElementById("charCount").style.display = "none";
      document.getElementById("inputAutre").value = "";
    }
  });

  document.getElementById("inputAutre").addEventListener("keyup", function() {
    // resize the input vertically to fit the text
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
    // show how many characters are left
    document.getElementById("charLeft").innerHTML = 255 - this.value.length;
  });
</script>