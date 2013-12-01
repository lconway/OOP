<?php

	class HTML_Helper {

		// HTML 
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


	}

	$users = array( ["first_name" => "Lynn", "last_name" => "Conway", "nick_name" => "Lynnie"],
				   ["first_name" => "Brooklynn", "last_name" => "Conner", "nick_name" => "Brooki"],
				   ["first_name" => "Laura", "last_name" => "Robers", "nick_name" => "Laurie"],
				   ["first_name" => "Sam", "last_name" => "Conway", "nick_name" => "Sammy"]
	);
	$helper = new HTML_Helper();
	$helper->printTable($users);

?>