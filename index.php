<?php
include "ads.php";
?>


<!DOCTYPE html>

<html>
    <head>
        <title>Odkup domenę</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="Stylesheet" type="text/css" href="css/style.css">
		
    </head>
    <body>
        
		<form action="submit_form.php" method="post" id="contact">
			<fieldset class="container">
			<h1>Formularz kontaktowy</h1> 
		
			<input type="hidden" name="name" class='input_form'>
		
			<label>
				<p class='text'>Imię : </p> 
				<input type="text" name="fname" class='input_form' autocomplete="off" required>
			</label>
			<label>                
				<p class='text'>Nazwisko :<br> (opcjonalnie)</p>
				<input type="text" name="lname"  class='input_form' autocomplete="off">
			</label>
			<label>                
				<p class='text'>Numer <br>telefonu :</p>
				<input type="tel" name="tnum"  class='input_form' minlength='7' maxlength='11' pattern='[0-9]*'autocomplete="off" required>
			</label>
			<label>                
				<p class='text'>E-mail :</p>
				<input type="email" name="email"  class='input_form' autocomplete="off" required>
			</label>
			<label>                
				<p class='text'>Wiadomość :</p>
				<textarea class="message" name="message" autocomplete="off" required></textarea>
			</label>
			
			<label>                
				<p class='text'>Podaj wynik :</p>
				<span class="num1"></span> x <span class="num2"></span> = <input type="text" name="check" maxlength="2" class='input_math' autocomplete="off" required>
			</label>
				<input type="hidden" name="sum" value=""> 
			<label>
				<input type="submit" class="button" value="Wyślij" >
			</label>
			</fieldset>
		</form>	

	<?php
		foreach($ads_rand as $key => $value) { 
	?>
		<center><a href='<?php echo $value?>'> <img class="wp-image" src="<?php echo $key?>"></a></center>
	<?php
		}
	?>
		
    </body>
</html>

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script type="text/javascript" src="js/validation.js"></script> 