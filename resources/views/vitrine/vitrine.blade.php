@extends('layouts.app')
@section('content')
  <main>
    <div> <!-- Produit tendance-->
      <h2>Nos produits tendance</h2>
      <div class="listeProduit">
        @php
            $i=1;
        @endphp
         @for ($i = 1 ; $i <5 ; $i++)     
          <div class="carte">
            <section>
              <aside>
                @if ($produits[$i]->image === 'https://picsum.photos/150/100' )<!--image par defaut -->
                  <img src="{{$produits[$i]->image}}" alt="image de {{$produits[$i]->nom}}">       
                @else 
                  <img src="/storage/images/{{$produits[$i]->image}}" alt="image de {{$produits[$i]->nom}}">                 
                @endif
              </aside>
              <article>          
                <h3>{{$produits[$i]->nom}}</h3>
                <p class="box">{{$produits[$i]->description}}</p>
                <p class="prix red">{{$produits[$i]->prix}} €</p>           
              </article>
            </section>
          </div>
        @endfor
      </div>
    </div>
    <div> <!--Produits du mois-->
      <h2>Produits du mois</h2>
      <div class="listeProduit">
         @for ($i = 1 ; $i <7 ; $i++)     
          <div class="carte">
            <section>
              <aside>
                @if ($produits[$i]->image === 'https://picsum.photos/150/100' )<!--image par defaut -->
                  <img src="{{$produits[$i]->image}}" alt="image de {{$produits[$i]->nom}}">       
                @else 
                  <img src="/storage/images/{{$produits[$i]->image}}" alt="image de {{$produits[$i]->nom}}">                 
                @endif
              </aside>
              <article>          
                <h3>{{$produits[$i]->nom}}</h3>
                <p class="box">{{$produits[$i]->description}}</p>
                <p class="prix red">{{$produits[$i]->prix}} €</p>           
              </article>
            </section>
          </div>
        @endfor
      </div>
    </div>
  </main>
@endsection