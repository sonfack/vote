<html>
<style>

</style>
<body>
	<h3>cr&eacute;er parti </h3>
	<form method="POST" action="creer_parti">
		<input type="text" name="party_name" value="">
		<input type="text" name="party_logo" value="">
		<select name="party_head">
		<?php if(isset($users)){  
			foreach($users as $user){
				if($user['user_type'] != 1 && $user['user_type'] == 3 && is_null($user['user_party_id'])){
		?>
				<option value="<?php echo $user['user_id'] ; ?>"><?php echo $user['user_name'] ; ?></option>
		<?php
				}
			}
		} ?>
		</select>
		<input type="submit" name="parti" value="Nouveau parti">
	</form>
	<br>
	<br>
	<h3>Liste des comptes cr&eacute;es</h3>
	<table>
		<thead> </thead>
		<tbody>
			<?php 
				if(isset($users)){
					foreach($users as $user){
						if($user['user_type'] != 1){
			?>
				<tr>
					<td><?php echo $user['user_name']; ?></td>
					<td>
						<?php
							if($user['user_type'] == 2){
								echo 'Electeur';
							}
						?>
					</td>
					
					<td>
						<?php
							if($user['user_type'] == 3){
								echo 'Pr. de parti';
							}
						?>
					</td>
				</tr>
							
							
			<?php 
						}
					}
				}
				
			?>
		</tbody>
	</table>
	
	<h3>resultats de vote</h3>
	<?php 
		if(isset($parties)){
			foreach($parties as $party){
				echo $party['party_name']." : ". $party['voters']."<br>";
			}
		}
	?>
<body>
</html>
