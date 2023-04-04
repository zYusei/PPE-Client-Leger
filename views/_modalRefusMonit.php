<!-- Modal -->
<div class="modal fade text-black" id="modalRefusMonit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Proposition d'une nouvelle heure</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- get data-id parameter from button -->
                <form id="ProposerHeure" method="post">
                    <input type="hidden" id="idhd" name="idhd" value="">
                    <div class="row">
                        <div class="col-12 my-2">
                            <label for="datehd">Date</label>
                            <input type="date" name="datehd" id="datehd" class="form-control" required min="<?php echo date('Y-m-d', strtotime("+1 day")); ?>" value="">
                        </div>
                    </div>
                    <div class=" row my-2">
                        <div class="col-6">
                            <label for="heurehd">Heure de début</label>
                            <select name="heurehd" id="heurehd" class="form-select pointer">
                                <option value="09:00:00">09:00</option>
                                <option value="09:30:00">09:30</option>
                                <option value="10:00:00">10:00</option>
                                <option value="10:30:00">10:30</option>
                                <option value="11:00:00">11:00</option>
                                <option value="14:00:00">14:00</option>
                                <option value="14:30:00">14:30</option>
                                <option value="15:00:00">15:00</option>
                                <option value="15:30:00">15:30</option>
                                <option value="16:00:00">16:00</option>
                                <option value="16:30:00">16:30</option>
                                <option value="17:00:00">17:00</option>
                                <option value="17:30:00">17:30</option>
                                <option value="18:00:00">18:00</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="heurehf">Durée</label>
                            <select name="heurehf" id="heurehf" class="form-select pointer">
                                <option value="60">1h</option>
                                <option value="90">1h30</option>
                                <option value="120">2h</option>
                                <option value="150">2h30</option>
                                <option value="180">3h</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" name="ProposerHeure" id="ValiderHeure" class="btn btn-primary">Valider</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>