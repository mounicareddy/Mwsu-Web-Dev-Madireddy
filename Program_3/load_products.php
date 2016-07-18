<?php
    // open mysql connection
	
    $host = "localhost";
    $username = "root";
    $password = "5rHCEfoFnQ";
    $dbname = "products";
    $conn = mysqli_connect($host, $username, $password, $dbname) or die('Error in Connecting: ' . mysqli_error($conn));

    // use prepare statement for insert query
    $st = mysqli_prepare($conn, 'INSERT INTO products(category, description, price, imgs) VALUES (?, ?, ?, ?)');

    // bind variables to insert query params
    mysqli_stmt_bind_param($st, 'sss', $category, $description, $price, $newimgs);

    // read json file
    $filename = 'products_big.json';
    $json = file_get_contents($filename);   

    //convert json object to php associative array
    $data = json_decode($json, true);

    // loop through the array
    foreach ($data as $row) {
        // get the employee details
        $category = $row['category'];
		echo $category;
        $description= $row['description'];
		
        $price= $row['price']; 
        $imgs= $row['imgs'];
	    $newimgs=str_replace("160", "~", $imgs[0]);
		//echo $newimgs
		
		
		

        // execute insert query
        mysqli_stmt_execute($st); 
    }
	echo "<pre>";
    print_r($data);


    //close connection
    mysqli_close($conn);
?>
  