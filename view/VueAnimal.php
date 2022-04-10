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
    <a class="navbar-brand" href=""></a>
    <a class="navbar-brand" href="/">Animaux</a>
    <a class="navbar-brand" href="/enclos">Enclos</a>
    <a class="navbar-brand" href="/addanimal">Ajouter un animal</a>
    <a class="navbar-brand" href="#"></a>

  </nav>


  <div class="container mt-4  ">

    <div class="row d-flex ">

      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="./img/1.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Nom: <?= $resultAnimal->name ?> </h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Sex: <?= $resultAnimal->sexe ?> </li>
            <li class="list-group-item">Age: <?= $DateNe = date('Y-m-d') - $resultAnimal->dateN; ?> ans</li>
            <li class="list-group-item">Espece: <?= $resultAnimal->nameEspece ?></li>
          </ul>
          <div class="card-body">
            <a href="/animal?id=<?= $resultAnimal->getId() ?>">Voir détails</a>

          </div>
        </div>

      </div>

      <div class="card" style="width: 18rem;">

        <div class="card-body">
          <h5 class="card-title">
            Indéntifiant de l'animal: <?= $resultAnimal->getId() ?> </h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Date de naissance: <?= $resultAnimal->dateN ?> </li>
            <li class="list-group-item">Date d'entrée <?= $resultAnimal->dateE; ?></li>
            <li class="list-group-item">Parent mâle: <?= $resultAnimal->parentM ?></li>
            <li class="list-group-item">Parent femelle: <?= $resultAnimal->parentF ?></li>
            <li class="list-group-item">Régime alimentaire : <?= $resultAnimal->nameRA ?></li>
            <li class="list-group-item"> Traitment : <?= $resultAnimal->traitement ?></li>
            <li class="list-group-item"> Enclos: <?= $resultAnimal->nameEnclos ?></li>
          </ul>
          <div class="card-body">
            <a href="/animal?id=<?= $resultAnimal->getId() ?>">Voir détails</a>

          </div>
        </div>

      </div>
      <ul class="list-group" style="width: 18rem;">
        <li class="list-group-item active">Animaux dans le même enclos </li>
        <?php
        foreach ($resultOthersAnimal as $resultAnimalss) {
        ?>
          <li class="list-group-item"> <?= $resultAnimalss->name ?> </li>
        <?php } ?>

      </ul>
      <ul class="list-group" style="width: 18rem;">
        <li class="list-group-item active">list des soingeurs </li>
        <?php
        foreach ($resultAssinger as $Assinger) {
        ?>
          <li class="list-group-item"> <?= $Assinger->name ?> </li>
        <?php } ?>

      </ul>

    </div>

  </div>






  </div>



  <script>

  </script>
</body>

</html>