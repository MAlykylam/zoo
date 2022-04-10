<head>
  <meta charset="utf-8" />
  <title>
    Tasks Manager
  </title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#"></a>
    <a class="navbar-brand" href="/">Animaux</a>
    <a class="navbar-brand" href="/enclos">Enclos</a>
    <a class="navbar-brand" href="/addanimal">Ajouter un animal</a>
    <a class="navbar-brand" href="#"></a>

  </nav>

  <div class="container">

    <div class="row">

      <div class="col-10 card shadow mx-auto mt-3">

        <div class="card-header text-center bg-dark text-light mt-2">
          <h3>AJOUT D'UN ANIMAL</h3>
        </div>

        <div class="card-content mt-3">

          <form method="post" action="">

            <div class="mb-3">
              <label for="name" class="form-label">nom</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="">
            </div>

            <div class="mb-3">
              <label for="dateE" class="form-label">Date d'entrée</label>
              <input type="date" class="form-control" name="dateE" id="dateE" placeholder="">
            </div>

            <div class="mb-3">
              <label for="dateN" class="form-label">Date de naissance </label>
              <input type="date" class="form-control" name="dateN" id="dateN" placeholder=" Date de naissance">
            </div>

            <div class="mb-3">
              <label for="sexe" class="form-label">Sexe </label>
              <select name="sexe" id="sexe">
                <option value="">--Choix du sexe--</option>
                <option value="male">male</option>
                <option value="femelle">femelle</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="parentM" class="form-label">Parent mâle</label>
              <input type="text" class="form-control" name="parentM" id="parentM" placeholder="">
            </div>
            <div class="mb-3">
              <label for="parentF" class="form-label">Parent femelle </label>
              <input type="text" class="form-control" name="parentF" id="parentF" placeholder="">
            </div>
            <div class="mb-3">
              <label for="photo" class="form-label">Photo </label>
              <input type="url" class="form-control" name="photo" id="photo" placeholder="">
            </div>
            <div class="mb-3">

              <label for="idRegimeAlimentaire" class="form-label">Régime alimentaire</label>

              <select class="custom-select" name="idRegimeAlimentaire" id="idRegimeAlimentaire">
                <option value="">--Choix du Regime alimentaire--</option>
                <?php
                foreach ($regimes as $regime) {
                ?>
                  <option value="<?= $regime['idRegimeAlimentaire'] ?>"><?= $regime['nameRA'] ?></option>

                <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="traitement" class="form-label">Traitement</label>
              <input type="text" class="form-control" name="traitement" id="traitement" placeholder="">
            </div>


            <div class="mb-3">
              <label for="dateD" class="form-label">Date de déces </label>
              <input type="date" class="form-control" name="dateD" id="dateD" placeholder=" Date de naissance">
            </div>

            <div class="mb-3">


              <label for="idEspece" class="form-label">Espèce</label>

              <select class="custom-select" name="idEspece" id="
            idEspece">

                <option value="">--Choix d'Espèce-</option>
                <?php
                foreach ($Especes  as $Espece) {
                ?>
                  <option value="<?= $Espece['idEspece'] ?>"><?= $Espece['nameEspece'] ?></option>

                <?php } ?>
              </select>
            </div>

            <div class="mb-3">

              <label for="idEnclos" class="form-label">Enclos</label>

              <select class="custom-select" name="idEnclos" id="
              idEnclos">
                <option value="">--Choix du l'enclo--</option>
                <?php
                foreach ($resultEnclos  as $Enclo) {
                ?>
                  <option value="<?= $Enclo->idEnclos ?>"><?= $Enclo->nameEnclos ?></option>

                <?php } ?>
              </select>
            </div>

            <div class="mb-3">

              <label for="idSoigneur" class="form-label">Soigneur</label>

              <select class="custom-select" name="idSoigneur" id="idSoigneur">
                <option value="">--Choix du soigneur--</option>

                <?php
                foreach ($soigneurs as $soigneur) {
                ?>
                  <option value="<?= $soigneur['idSoigneur'] ?>"><?= $soigneur['name'] ?></option>
                <?php } ?>
              </select>
            </div>

        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" name="description" id="description" placeholder="">
        </div>




        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" class="btn btn-dark">AJOUTER</button>
        </div>

        </form>

      </div>

    </div>

  </div>

  </div>

  <script>

  </script>
</body>

</html>