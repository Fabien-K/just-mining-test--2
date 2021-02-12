 @extends('layouts.app')
 @section('content')
  <Main>
    <h2>Liste des produits</h2>
    <div class="listeProduit">
      @php
          $i=1;
      @endphp
      @forelse ($produits as $produit)
        <div class="carte">
          <div> <!--btn Modifier-->
            <button form="majForm{{$i}}" formmethod="POST" type="submit" >+</button>
            <form id="majForm{{$i}}" action="{{ route('modifierProduit') }}" method="POST" style="display: none;">
              <input type="text" value="{{$produit->id}}" name="id">
              @csrf
            </form>
          </div>
          <div><!--btn supprimer-->
            <button form="supprForm{{$i}}" formmethod="POST" type="submit" class="suppr">X</button>
            <form id="supprForm{{$i}}" action="{{ route('supprimerProduit') }}" method="POST" style="display: none;">
              <input type="text" value="{{$produit->id}}" name="id">
              @csrf
            </form>
          </div>
          {{--             <a href="{{route('modifierProduit', $produit->id)}}"><i class="fas fa-edit">+</i></a>
                        --}}
          <section>
            <aside>
              @if ($produit->image === 'https://picsum.photos/150/100' )
                <img src="{{$produit->image}}" alt="image de {{$produit->nom}}">       
              @else 
                <img src="/storage/images/{{$produit->image}}" alt="image de {{$produit->nom}}">                 
              @endif
            </aside>
            <article>          
              <h3>{{$produit->nom}}</h3>
              <p class="box">{{$produit->description}}</p>
              <p class="prix red">{{$produit->prix}} €</p>           
            </article>
          </section>
        </div>
        @php
            $i++;
        @endphp
      @empty
        <p>Pensez a seed la database </p>
      @endforelse
    </div>
  </Main>
 @endsection