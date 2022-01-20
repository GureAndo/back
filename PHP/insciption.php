<?php require_once('inc/header.inc.php')?>

<h1 class ="my-5" >formulaire d'insrypsion</h1>

<form class= "py-5">
  <div class="my-5">
    <label for="exampleInputEmail1" class="form-label">Addresse Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="my-5">
    <label for="exampleInputPassword1" class="form-label">Mots de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="my-5 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php require_once('inc/footer.inc.php');