<?php
	session_start();
	include_once("connection.php");

	$connection = new Database();

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />  
    <script type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> <script type="text/javascript">
        $(document).ready(function(){

            $('#countryForm').submit(function(){

                $.post(
                	$(this).attr('action'),
                    $(this).serialize(),
                    function(data){
                        console.log(data);
                    	console.log(data['Name']);

						$('#country').html(data['Name']);
						// $(#continent).html(data['Continent'];
						// $region = data['Region'];
						// $population = data['Population'];
						// $lifeExpectancy = data['LifeExpectancy'];
						// $governmentForm = data['GovernmentForm'];
						// console.log($name);

                    },
                    "json"
                );

                // prevent redirect to process.php
                return false;
             });    //   end ('countryForm').submit
		});
	</script>

</head>
<body>
	<div id="wrapper">
		<form id="countryForm" action="process.php" method="post">
			Select Country: 
			<select id="country" name="country">
				<?php
					$query = "SELECT Name FROM country;";
					$countryNames = $connection->fetch_all($query);


					foreach($countryNames as $countryName) {
						echo "<option value='" . strtolower($countryName['Name']) . "'>" . $countryName['Name'] . "</option>";
					}
				?>
			</select>
			<input  id="check_info" type="submit" value="Check Info"/>
		</form>
		<div id="countryInfo">
			<h2>Country Info</h2>
			<div class="line"></div>
			<div id="info">
<?php
echo "<br>Country = <br>";
?>
			Country: <div id="country"></div><br>
			Continent: <div id="continent"></div><br>
			Region: <div id="region"></div><br>
			Population: <div id="population"></div><br>
			Life Expectancy: <div id="lifeExpectancy"></div><br>
			Government Form: <div id="governmentForm"></div><br>
<?php				
?>
				Government Form: <br>
			</div>
		</div>
	</div>   <!-- end of wrapper-->
</body>
</html>
