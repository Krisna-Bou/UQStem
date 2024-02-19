<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<script>
  $( function() {
    var courses = [
      "CSSE2310",
      "INFS3202",
      "ENGG4900",
    ];
    $( "#tags" ).autocomplete({
      source: courses
    });
  } );
</script>

<body class="page-overview">
    <header>
        <h1>ACCOUNT</h1>
    </header>
    <?php $session = session();
            echo '<br>'; ?>
    <img src="<?php echo $session->get('profilepic')?>">     
    <?php
        echo '<br>';
        ?>
    <a href='account/upload'> Change Profile Picture </a>
    <?php
        echo '<br>';
        echo "ID: ", $session->get('uid'), "<br />";
        echo "Username: ", $session->get('username'), "<br />";
        echo "Email: ", $session->get('email'), "<br />";
    ?>

    <?php echo form_open(base_url() . 'account/update'); ?>
        <div class="form-group ">
            <input name="email" placeholder="email">
        </div>
        <div class="form-group col-2">
            <button type="submit" class="btn btn-primary btn-block">Update Email</button>
        </div>
    <?php echo form_close(); ?>

    <?php
        echo "Courses: ";
        echo '[';
        foreach ($cid as $row) {
            printf("%s, ", $row['cid']);
        }
        echo ']';
        echo '<br>';
        echo '<br>';
    ?>

    <?php echo form_open(base_url() . 'account/add_course'); ?>
        <b> Enroll in course </b>
        <div class="col-2"> 
            <div class="form-group ">
                <input name="course" placeholder="Course" id="tags">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Add Course</button>
            </div>
        </div>
    <?php echo form_close(); ?>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <?php echo '<br>';?>

    <button onclick="sendRequest()">View Favourites</button>

    <div id="ajaxResponse"></div>
    
	<script>
		function sendRequest() {
			var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {                    
                    document.getElementById("ajaxResponse").innerHTML = this.responseText;                                                             
				}
			};
			xhttp.open("POST", "<?php echo base_url(); ?>account/ajax", true);         
            xhttp.setRequestHeader("X-Requested-With", "XMLHTTPRequest");
            xhttp.send();
		}        
	</script>
</body>
</html>
