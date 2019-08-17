
<?php
// Connecting, selecting database
$dbconn = pg_connect("host=nlss7.a2hosting.com dbname=ecentest_registerads user=ecentest_registeraccess password=nbhC^}iY)g2~nbhC^}iY)g2~")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$name = $_POST['name'];
// echo json_encode($name) ;
$query = "SELECT country FROM countries_countries WHERE namecode = '$name'";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
// foreach ($result as $result){
// 	echo json_encode($result);
// }

// Printing results in HTML
// echo "<table>\n";
// echo json_encode($_POST['name']);
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    // echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo json_encode($col_value) ;
    }
    // echo "\t</tr>\n";
}
// echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>
