@extends('layouts.app')
@section('content')
 <Main>
    <h2 class="center">Modifier le produit: <span class="couleurBordure" >{{$produitAModifier[0]->nom}}</span></h2>
    <div class="ligne"></div>
    <form action="{{route('Maj-Produit')}}" name="form" method="POST" enctype="multipart/form-data" id="formCreationProduit">
      @method("PUT")
      <div class="ligne between marge"><!--Nom && prix-->
        <div> <!--Nom-->
          <label for="inputNom"class="@error('nom')erreur @enderror">Nom</label>
          <input type="text" name="nom" id="inputNom" value="{{$produitAModifier[0]->nom}}">
          <div>
            <p>Valeur actuelle <span class="ancienneValeur">{{$produitAModifier[0]->nom}}</span></p>
          </div>
          @error('nom')
            <div class="erreur">
              <p class="erreur">{{$message}}</p>
            </div>
          @enderror
        </div>
        <div> <!--Prix-->
          <label for="inputPrix" class="@error('prix')erreur @enderror">Prix</label>
          <input type="number" id="inputPrix" name="prix" value="{{$produitAModifier[0]->prix}}">
          <div>
            <p>Valeur actuelle <span class="ancienneValeur">{{$produitAModifier[0]->prix}}</span></p>
          </div>
          @error('prix')
            <div class="erreur">
              <p class="erreur">{{$message}}</p>
            </div>
          @enderror
        </div> 
      </div>
      <div class="colone marge"> <!--Description-->
        <label for="inputDescription"class="@error('nom')erreur @enderror">Déscription</label>
        <textarea name="description" id="inputDescription" cols="10" rows="7" >{{$produitAModifier[0]->description}}</textarea>
        
        @error('description')
          <div class="erreur">
            <p class="erreur">{{$message}}</p>
          </div>
        @enderror
      </div>
      <div class="ligne between marge"><!--Image-->   
        <div>
          @if ($produitAModifier[0]->image === 'https://picsum.photos/150/100')
            <div class="colone">
              <label class="marge">Votre image actuelle</label>
              <img src="{{$produitAModifier[0]->image}}" alt="phoro du produit: {{$produitAModifier[0]->nom }}"> 
            </div>
          @else
            <div class="colone">
              <label class="marge">Votre image actuelle</label>
              <img src="/storage/images/{{$produitAModifier[0]->image}}" alt="phoro du produit: {{$produitAModifier[0]->nom }}">
            </div>
          @endif
        </div>
        <div class="colone marge">
          <label for="inputImage">Nouvelle Image</label>
          <input type="file" accept=".jpg" name="image">
        </div>
      </div>
      <input type="hidden" value="{{$produitAModifier[0]->id}}" name="id">
      <button value="formMAJProduit" class="button" type="submit">Mettre à Jour</button>
      @csrf
    </form>
  </Main>
  
@endsection