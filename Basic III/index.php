<?php

	class HTML_Helper {

		function printTable($rows) {
			$rowNum = count($rows);
			$keys = array();
			$keys = array_keys($rows[0]);
			$keyNum = count($keys);
			$htmlStr = "";
			$htmlStr .= "
				<table border=1'>
					<thead>
						<tr>";
						for ($i=0; $i<count($keys); $i++) {
							$htmlStr .= "<th>" . $keys[$i] . "</th>";
						};
						"</tr>
					</thead>
					<tbody>";
						for ($i=0; $i<$rowNum; $i++) {
							$htmlStr .= "<tr>";
							for ($j=0; $j<$keyNum; $j++) {
								$key = ($keys[$j]);
								$htmlStr .= "<td>" . $rows[$i] [$key] . "</td>";
							};
							$htmlStr .= "</tr>";
						};
			$htmlStr .= "
						</tr>
					</tbody>
				</table>
			";
			print_r($htmlStr);
		}

		function printSelect($selection, $selectArray)
		{
			$selectNum = count($selectArray);

			$htmlStr = "<select>";


			for($i=0; $i<$selectNum; $i++) {
				if ($selection AND ($selection == $selectArray[$i])) {
					$htmlStr .= "<option value='" . strtolower($selectArray[$i]) . "' selected>" . $selectArray[$i] . "</option>";
				} else {
					$htmlStr .= "<option value='" . strtolower($selectArray[$i]) . "'>" . $selectArray[$i] . "</option>";
				}
			}

			$htmlStr .= "</select>";

			print_r($htmlStr);
		}


	}

	$users = array( ["first_name" => "Lynn", "last_name" => "Conway", "nick_name" => "Lynnie"],
				   ["first_name" => "Brooklynn", "last_name" => "Conner", "nick_name" => "Brooki"],
				   ["first_name" => "Laura", "last_name" => "Robers", "nick_name" => "Laurie"],
				   ["first_name" => "Sam", "last_name" => "Conway", "nick_name" => "Sammy"]
	);
	$helper = new HTML_Helper();
	$helper->printTable($users);

	echo "<br><br>";
	
	$states = array("CA", "WA", "UT", "OR", "NY", "UT", "AZ");
	$helper->printSelect("UT", $states);

?>