<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="row" style="padding: 15px;">
                <div class="col-4  ">
                    <p class="mt-2 mb-2" id="#barBouton">
                        <input type="text" placeholder="Recherche globale 🔎" id="rechercherFull" style="font-size: 24px; border-radius:5px; border: 3px solid pink" />
                    </p>
                    <form id="barrePeriode">
                        <input type="date" id="debutDate">
                        <input type="date" id="finDate">
                        <button class="btn btn-xs btn-info">🔎</button>
                    </form>
                </div>
                <div class="col-8" style="text-align: right;">
                    <p class="mt-2 mb-2">
                        <span id="addBtn"></span>
                        <button class="btn btn-space btn-secondary" onclick=" imprimerTable()">Imprimer <span class="fa fa-print"></span></button>
                        <button class="btn btn-space btn-secondary" onclick='tabulator.download("csv", "<?= $moi_meme["titre"] ?>.csv", {delimiter:";"});'>CSV <i class="fa fa-file"></i></button>
                        <button class="btn btn-space btn-secondary" onclick="xlsFile('<?= $moi_meme['titre'] ?>')">EXCEL <i class="fa fa-file-excel"></i></button>
                        <button class="btn btn-space btn-secondary" onclick="pdfFile('<?= $moi_meme['titre'] ?>')">PDF <span class="fa fa-file-pdf"></span></button>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>