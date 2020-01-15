<?php
    $url = $_POST['url'];
    $path = explode("https://", $url);
    $img = $path[1];
    $dir_name = explode("/", $img);
    $dir = '';
    for ($i=0; $i < count($dir_name) - 1; $i++) { 
        if ($dir == '') {
            $dir = $dir_name[$i];
        } else {
            $dir = $dir.'/'.$dir_name[$i];
        }
        if (!file_exists($dir)) {
            mkdir($dir);
        }
    }// // Function to write image into file 
    if (file_exists($img)) {
        $status = true;
    }else{
        $status = file_put_contents($img, file_get_contents($url));
    }
    
?> 
<?php echo $dir_name[count($dir_name) - 1]; ?> [<a href="<?php echo $url;?>">Source</a> @ <a href="./<?php echo $img;?>">Downloaded</a> ]
