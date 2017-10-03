<pre><?php
/* Thanks to http://steindom.com/articles/shortest-php-code-convert-csv-associative-array */
ini_set('auto_detect_line_endings', TRUE);
$rows = array_map('str_getcsv', file('profil.csv'));
$header = array_shift($rows);

# cut head until die hard 4
$cut_head = explode(';', $header[0]);
$no = count($cut_head);
//print_r($cut_head); echo '<hr>';

$csv = array();
foreach ($rows as $key => $row) 
{
  $cut_body[$key] = explode(';', $row[0]);
}//print_r($cut_body);

$combine = array();
foreach ($cut_body as $key => $body) 
{	
	echo "'$key' => array (\n";
	for ($x = 0; $x < $no; $x++) 
	{
		echo "\t'" . $cut_head[$x] . "' => '"
		. $body[$x] . "',<br>";
	}
	echo "),\n";
}