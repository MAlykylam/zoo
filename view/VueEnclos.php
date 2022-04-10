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

    <div class="row d-flex justify-content-around">


      <?php
      foreach ($resultEnclos as $resultEnclo) {
      ?>



        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="./img/1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Identiant: <?= $resultEnclo->nameEnclos ?> </h5>

          </div>
          <ul class="list-group list-group-flush">

            <li class="list-group-item">Occupé: <?= $resultEnclo->vide == 1 ? 'oui' : 'non';  ?></li>
            <li class="list-group-item">Nombre d'animaux: <?= $resultEnclo->Nombre  ?></li>
            <li class="list-group-item">Environnement: <?= $resultEnclo->name ?></li>

          </ul>
          <div class="card-body">
            <a href="/enclo?id=<?= $resultEnclo->idEnclos ?>">Voir détails</a>
          </div>
          <div class="card-body">

          </div>
        </div>






      <?php    }
      ?>


      </tbody>
      </table>

    </div>

  </div>

  </div>

  </div>
  <script>

  </script>
</body>

</html>