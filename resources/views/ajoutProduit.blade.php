@extends('layouts.app')
@section('content')
 <Main>
   <h2 class="center">Ajout de nouveaux produits</h2>
   
  <form action="{{route('enregistrerProduit')}}" name="form" method="POST" enctype="multipart/form-data" id="formCreationProduit">
    @csrf
    <div class="ligne between marge">
      <div>
        <label for="inputNom"class="@error('nom')erreur @enderror">Nom<span class="red">*</span></label>
        <input type="text" name="nom" id="inputNom" required>
        @error('nom')
          <div class="erreur">
            <p class="erreur">{{$message}}</p>
          </div>
        @enderror
      </div>
      <div>
        <label for="inputPrix" class="@error('prix')erreur @enderror">Prix<span class="red">*</span></label>
        <input type="number" id="inputPrix" name="prix" required>
        @error('prix')
          <div class="erreur">
            <p class="erreur">{{$message}}</p>
          </div>
        @enderror
      </div> 
    </div>
    <div class="colone marge">
      <label for="inputDescription"class="@error('nom')erreur @enderror">Déscription<span class="red" >*</span></label>
      <textarea name="description" id="inputDescription" rows="6" required></textarea>
      @error('description')
        <div class="erreur">
          <p class="erreur">{{$message}}</p>
        </div>
      @enderror
    </div>
    <div class="ligne between marge half">
      <label for="inputImage">Image</label>
      <input type="file" accept=".jpg" name="image" class="">      
    </div> 

    @if (isset($sucess))    
      <img class="sucess" src="https://external.fhou1-2.fna.fbcdn.net/safe_image.php?d=AQApgG8D493b7cw7&url=https://media1.tenor.co/images/0bb91d0c68ed11f7caa67b56b7d5ef6a/tenor.gif%3Fitemid%3D6219285&ext=gif&_nc_hash=AQCcyszd9eJ83q0E" alt="">    
    @endif

    <button value="formCreationProduit" class="button" type="submit">Enregistrer</button>

    
  </form>
 </Main>
@endsection