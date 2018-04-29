<?php 
$filename = 'messages.txt';
$cachetime = 30;

if($_SERVER['REQUEST_METHOD'] == "GET"){
	//If file exists and is < 30 then read the file
	if (file_exists($filename)&& time() - filemtime($filename) < $cachetime) {
		echo "The file reads: \r\n";
		readfile($filename);
	}else{ 
		//If file exists and is > 30 the delete the file
		if (file_exists($filename) && time() - filemtime($filenmae) > $cachtime){
			unlink($filename);
			echo "$filename was deleted!";
		} else {
			//If file !exist then use response code 404 and print not found
			http_response_code(404);
			echo "404: Resource not found!";
		}
	}
} else if($_SERVER['REQUEST_METHOD'] == "POST"){
	//Stores output to the buffer rather than sent to the browser
	ob_start();
	
	//Write to the file and then close the file
    $fp = fopen($filename, 'w');
    fwrite($fp, "{\"id\": 2019,\"message\": \"Telstra 2019 Graduate Program\"}");
    fclose($fp);
	
	//Send and turn off output buffer
    ob_end_flush();
	
}

?>