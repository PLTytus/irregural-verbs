<?php

	require("verbs.php");

	for($i = count($verbs) - 1; $i > 0; $i--){
		$j = rand(0, $i);
		list($verbs[$i], $verbs[$j]) = [$verbs[$j], $verbs[$i]];
	}

	$limit = isset($_GET["limit"]) ? (int)($_GET["limit"]) : 10;
	if($limit < 10) $limit = 10;
	if($limit > count($verbs)) $limit = count($verbs);

	$verbs = array_slice($verbs, 0, $limit);

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
					<td colspan="4">
						Verbs: <input id="limit" type="number" min="10" max="<?php echo count($verbs); ?>" value="<?php echo $limit; ?>">
						<input type="button" value="Random" onclick="window.location.replace(location.origin+location.pathname+'?limit='+document.querySelector('#limit').value)">
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
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