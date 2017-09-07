<!DOCTYPE html>
<html>
<head>
<link type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'; ?>" rel="stylesheet" />
<title>Connexion</title>
</head>
<style>
body {
  background-color:#fff;
  -webkit-font-smoothing: antialiased;
  font: normal 14px Roboto,arial,sans-serif;
}

.container {
    padding: 25px;
    position: fixed;
}

.form-login {
    background-color: #EDEDED;
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 15px;
    border-color:#d2d2d2;
    border-width: 5px;
    box-shadow:0 1px 0 #cfcfcf;
}

h4 { 
 border:0 solid #fff; 
 border-bottom-width:1px;
 padding-bottom:10px;
 text-align: center;
}

.form-control {
    border-radius: 10px;
}

.wrapper {
    text-align: center;
}
</style>
	<body>
        <div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
			<form action="connexion" method="POST">
				<div class="form-login">
				<h4>Welcome back.</h4>
				<input type="text" name="username" id="userName" class="form-control input-sm chat-input" placeholder="username" />
				</br>
				<input type="password" name="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
				</br>
				<div class="wrapper">
				<span class="group-btn">     
					<input type="submit" name="submit" value="connexion" >
				</span>
				<br>
				<br>
				<br>
				<a href="<?php echo base_url()."index.php/welcome/creer_utilisateur" ; ?>" >Cr&eacute;er compte</a>
				</div>
				</div>
			</form>
        </div>
    </div>
</div>
	</body>
</html>
