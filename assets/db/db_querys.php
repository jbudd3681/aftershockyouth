<?php

function viewallparents(){
	$session = $_SESSION['currentUser'];
	include('db_config.php');
	$results = $db->query('SELECT * FROM parents');
	if ($results->num_rows) {
		while($row = $results->fetch_object()){
	        $id = $row->id;
	        $name = $row->name;
	        $phone = $row->phone;
	        $email = $row->email;
	        $youth = $row->Youth;
	        $updated = $row->timestamp;	        
	        echo "<tr><td>".$name."</td><td>".$phone."</td><td>".$email."</td><td>".$youth."</td><td>".$updated."</<td></tr>";
		}
	}else{ 
		echo "<tr><td colspan='4'>No pending Users</td></tr>";
	}
}

function addevent(){
	echo "<form method='post' id='addnew' action='../assets/db/addevent.php'>
							<div class='form-group'>
								<label for='date'>Date:</label>
								<input type='date' id='date' name='date'>
								<label for='time'>Time</label>
								<input type='time' id='time' name='time'>
								<select name='TOD'>
									<option value='am'>AM</option>
									<option value='pm'>PM</option>
								</select>
							</div>
							<div class='form-group'>
								<label for='desc'>Description:</label><br>
								<input class='form-control' type='text' id='desc' name='desc' placeholder='Description'><br>
								<input type='submit' value='Add New Event' class='addnewevent btn btn-info form-control'>
							</div> 
						</form>";
}

function pendingusers(){
	$session = $_SESSION['currentUser'];
	include('db_config.php');
	$results = $db->query('SELECT * FROM users WHERE authlvl = 0');
	if ($results->num_rows) {
		while($row = $results->fetch_object()){
	        $id = $row->id;
	        $name = $row->fullname;
	        $username = $row->username;
	        $useremail = $row->email;	        
	        echo "<tr><td><form method='post' class='pendingusers' action='../assets/db/approval.php'><input type='hidden' name='id' value='".$id."'>". $name . "</td><td>". $username . "
	        <input type='hidden' name='currentuser' value='".$session."'>
	        </td>
	        <td>
	        	<select name='role'>
	        		<option value='1'>Youth</option>
	        		<option value='2'>Leader LVL 1</option>
	        		<option value='3'>Leader LVL 2</option>
	        		<option value='4'>Administrator</option>
	        	</select>
	        </td><td id='approval'><label>
    <input type='radio' name='action' value='Reject'><label> Reject</label>
    <input type='hidden' name='useremail' value='".$useremail."'><input type='hidden' name='username' value='".$name."'></td>
    <td><input type='radio' name='action' value='Approve'><label> Approve</label> <input type='submit' value='Update' class='btn btn-info btn-xs'></form></td></tr>";
	    }
	}else{ 
		echo "<tr><td colspan='4'>No pending Users</td></tr>";
	}
}

function newmsgcount(){
	include('db_config.php');
	$user = $_SESSION['currentUser'];
	$results = $db->query("SELECT * FROM pm WHERE msg_read = 1 AND userto='$user'");
	$row_cnt = mysqli_num_rows($results);
	echo $row_cnt;
}

function countpending(){
	include('db_config.php');
	$results = $db->query('SELECT * FROM users WHERE authlvl = 0');
	$row_cnt = mysqli_num_rows($results);
	echo $row_cnt;
}

function count_events(){
	include('db_config.php');
	$results = $db->query('SELECT * FROM events WHERE date >= now()+INTERVAL 3 HOUR');
	$row_cnt = mysqli_num_rows($results);
	return $row_cnt;
}

function eventsx3(){
	include('db_config.php');
	$result = $db->query('SELECT * FROM events WHERE date >= now()+INTERVAL 3 HOUR ORDER BY date ASC LIMIT 3');
	if ($result->num_rows) {
		while($row = $result->fetch_object()){
			$date = date_create($row->date);
			$desc = $row->description;
			echo "<tr>" . "<td>". date_format($date, 'M dS, Y h:ia') . "</td>". "<td>". $desc . "</td>" . "</tr>";
			}
		}else {
		echo "<tr><td colspan='2'>No events scheduled at this time.</td></tr>";
	}
}

// function pagedevents($positionstart, $positionend){
// 	$position = 0;
// 	$all = allevents2();
// 	foreach($all as $event){
// 		$position += 1;
// 		if($position >= $positionstart && $position <= $positionend){
// 		$subset[] = $event;
// 		}
// 		echo $event;
// 	}
// }

function allevents(){
	include('db_config.php');
	$result = $db->query('SELECT * FROM events WHERE date >= now()+INTERVAL 3 HOUR ORDER BY date ASC LIMIT 25');
	if ($result->num_rows){
		while($row = $result->fetch_object()){
			$id = $row->id;
			$date = date_create($row->date);
			$desc = $row->description;
			$user = $row->added_by;
			echo "<tr><td><form action='../assets/db/deleteevent.php' class='deleteform' method='post'><input type='hidden' name='id' value='".$id."'>". date_format($date, 'M dS, Y h:ia') . "</td><td>". $desc . "</td><td>".$user."</td><td><input type='hidden' name='action' value='removeevent'><input type='submit' value='Remove' class='deleteevent btn btn-xs btn-danger'></form></td></tr>";
			}
		}else{
		echo "<tr><td colspan='2'>No events scheduled at this time.</td></tr>";
	}
}

function publicEvents(){
	include('db_config.php');
	$result = $db->query('SELECT * FROM events WHERE date >= now()+INTERVAL 3 HOUR ORDER BY date ASC LIMIT 20');
	if ($result->num_rows){
		while($row = $result->fetch_object()){
			$id = $row->id;
			$date = date_create($row->date);
			$desc = $row->description;
			echo "<tr><td>". date_format($date, 'M dS, Y h:ia') . "</td><td>". $desc . "</td><tr>";
			}
		}else{
		echo "<tr><td colspan='2'>No events scheduled at this time.</td></tr>";
	}
}

function allusers(){
	include('db_config.php');	
	$results = $db->query('SELECT * FROM users WHERE authlvl >= 1');
	if ($results->num_rows) {
		while($row = $results->fetch_object()){
	        $id = $row->id;
	        $name = $row->fullname;
	        $username = $row->username;
	        $email = $row->email;
	        $role = $row->authlvl;
	        $buttonallow = $row->authlvl;
	        if($role == 4){ $rolealpha = "Administrator";}
	        if($role == 3){ $rolealpha = "Leader LVL 2";}
	        if($role == 2){ $rolealpha = "Leader LVL 1";}
	        if($role == 1){ $rolealpha = "Youth";}
	        echo '<tr><td><form class="allusers" action="../assets/db/reject.php" method="post"><input type="hidden" name="id" value="'.$id.'">'.$name.'</td><td>'.$username.'</td><td>'.$email.'</td><td>'.$rolealpha.'
	        </td><td><input type="hidden" name="action" value="remove"><input type="submit" value="Remove" class="btn btn-xs btn-danger"></form></td></tr>';       
	        } 
	    }else{ 
		echo "<tr><td colspan='2'>No users present</td></tr>";
	}
}