<?php 
function eventsx3(){
					include("assets/inc/db_config.php");
					$result = $db->query('SELECT * FROM events WHERE date >= now() ORDER BY date ASC LIMIT 3');
					if ($result->num_rows) {
						while($row = $result->fetch_object()){
							$date = date_create($row->date);
					        $desc = $row->description;
					        echo "<tr>" . "<td>". date_format($date, 'm/d/y h:ia') . "</td>". "<td>". $desc . "</td>" . "</tr>";
						}
						$result->free();
					}
				}
?>