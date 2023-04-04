<!-- Modal -->
<div class="modal fade text-black" id="modalToutesLesHeures" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Toutes les heures</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Heure de début</th>
                            <th scope="col">Heure de fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($toutesLesHeures as $heure) {
                            $dateSup = date("d/m/Y", strtotime($heure['datehd']));
                            $heureDebSup = date("H:i", strtotime($heure['datehd']));
                            $heureFinSup = date("H:i", strtotime($heure['datehf']));
                            echo "<tr>";
                            echo "<td>" . $dateSup . "</td>";
                            echo "<td>" . $heureDebSup . "</td>";
                            echo "<td>" . $heureFinSup . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>