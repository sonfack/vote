<html>
<style>

</style>
<body>
<br>
<br>
<h3>Voter votre parti</h3>
	<html>
		<table>
			<thead>
				 Partis
			</thead>
			<tbody>
				<?php 
					if(isset($partis)){
						foreach($partis as $parti){
				?>
					<tr>
						<td>
							<form method="POST" action="voter">
								<b><?php echo $parti['party_name'] ; ?></b>
								<input type="hidden" name="party" value="<?php echo $parti['party_id'] ; ?>" >
								<input type="hidden" name="voter" value="<?php echo $user_id; ?>" >
								<input type="submit" name="ok" value="Voter">
							</form>
						</td>
							</tr>
				<?php
						}
					}
					
				?>
			</tbody>
		</table>
		
	</html>

<body>
</html>
