<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Style css-->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!--Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
  <title>Test Just Ming</title>
</head>
<body>
  <header id='entete'>
    <H1>Test just Mining: Vitrine</H1>
    <nav>
      <ul class="ligne">
        <li><a href="{{route('shop')}}">La vitrine</a></li>    
        <ul class="colone droper">
          <li>Pages produits</li>
          <ul class="colone dropdown">
            <li><a href="{{route('accueil')}}"> Liste</a></li>
            <li><a href="{{route('ajoutProduit')}}"> Ajouter</a></li>
          </ul>
        </ul>
        <li id="propos">
            A propos
            <div id="pagePropos">
              <div class="realisation">
                <h2 class="center bold">Réalisation: <br>Fabien KIRCHER</h2>
                <p class="couleurBordure bold">06 65 10 34 77</p>
                <p class="couleurBordure bold">kircher.fabien@gmail.com</p>
              </div>
            </div>
          </li>
      </ul>
    </nav>
  </header>
  <div class="container marge">
    @yield('content')
  </div>
</body>
</html>