<!-- Modal -->
<div class="modal fade text-black" id="modalDeleteHeure" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Retrait d'heure</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="RetraitHeure" method="POST">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Heure de début</th>
                                <th scope="col">Heure de fin</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $noheures = false;
                            foreach ($toutesLesHeures as $heure) {
                                if ($heure['datehd'] > date("Y-m-d H:i:s")) {
                                    $dateSup = date("d/m/Y", strtotime($heure['datehd']));
                                    $heureDebSup = date("H:i", strtotime($heure['datehd']));
                                    $heureFinSup = date("H:i", strtotime($heure['datehf']));
                                    echo "<tr>";
                                    echo "<td>" . $dateSup . "</td>";
                                    echo "<td>" . $heureDebSup . "</td>";
                                    echo "<td>" . $heureFinSup . "</td>";
                                    echo "<td><input class='form-check-input pointer' type='checkbox' name='heureSupp[]' value='" . $heure['id_cc'] . "'></td>";
                                    echo "</tr>";
                                    $noheures = true;
                                }
                            }
                            if ($noheures == false) {
                                echo "<tr>";
                                echo "<td colspan='4'>Vous n'avez pas d'heures à supprimer</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" name="RetirerHeure" id="RetirerHeure" class="btn btn-primary">Valider</button>
            </div>
            </form>
        </div>
    </div>
</div>