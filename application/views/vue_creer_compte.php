<html>
<style>

</style>
<body>
	
<form class="form-horizontal" action='creer_utilisateur' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Cr&eacute;er un utilisateur</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Nom</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
      </div>
    </div> 
    <br>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="typeuser">Type</label>
      <div class="controls">
        <select name="typeuser" >
			<option value="2">Electeur</option>
			<option value="3">Pr. Parti</option>
        </select>
      </div>
    </div>
    <br>
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Mot de passe</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
      </div>
    </div>
	<br>
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Mot de passe (Confirmer)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
      </div>
    </div>
	<br>
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Register</button>
      </div>
    </div>
  </fieldset>
</form>
<body>
</html>
