<?php

	require("verbs.php");

	for($i = count($verbs) - 1; $i > 0; $i--){
		$j = rand(0, $i);
		list($verbs[$i], $verbs[$j]) = [$verbs[$j], $verbs[$i]];
	}

	$verbs = array_slice($verbs, 0, 10);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Irregular verbs</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<table>
			<thead>
				<tr>
					<td></td>
					<td>Infinitive</td>
					<td>Simple Past</td>
					<td>Past Participle</td>
				</tr>
			</thead><tbody>
				<?php

					$i = 0;
					foreach($verbs as $verb){
						$j = rand(0, 2);

						echo "<tr>
							<td>".++$i."</td>";
							foreach(range(0,2) as $k){
								if($j == $k){
									echo "<td>{$verb[$j]}</td>";
								} else {
									echo "<td class='fill'><input type='text' onchange=\"this.style.backgroundColor = this.value == '{$verb[$k]}' ? '#5bcd5b75' : '#ff000026';\" ondblclick=\"alert('{$verb[$k]}');\"></td>";
								}
							}
						echo "</tr>";
					}

				?>
			</tbody>
		</table>
	</body>
</html>