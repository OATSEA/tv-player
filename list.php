<link href="movies.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet"></link>
<?php
    $sDestination ='../../data/constants.php';
    require_once $sDestination;
    $temp ="";
    $mp4=".mp4";
    $jpg=".jpg";
    $png=".png";
    $defaultNav="defaultnav.jpg";
    $defaultNavJPG="nav.jpg";
    $defaultNavPNG="nav.png";
    $folderNav="nav.jpg";
    $loopCount=0;
    $baseFolder=TVPLAYER_LOCATION;//(EXTERNAL_TEXT == 1) ? EXTERNAL_FOLDER.'/content/movies' : 'content/movies';
    $folderName=isset($_POST["folder_name"]) ? $_POST["folder_name"] : '';
    $navHTML="";
    $thumbsHTML="";
    $movieHTML="";
    $scriptDir = SITE_URL.'content/'.TVPLAYER_LOCATION;
    $sImageUrl = SITE_URL.'content/'.TVPLAYER_LOCATION;;
    $fullPathPrefix = ROOT_DIR.'/content/'.TVPLAYER_LOCATION;
    $sExternalUrl = SITE_URL.EXTERNAL_FOLDER.'/content'.DIRECTORY_SEPARATOR.TVPLAYER_LOCATION;
    //$foldername = isset($_POST["folder_name"]) ? $_POST["folder_name"] : '';
    $moviesDir =(EXTERNAL_TEXT == 1) ? ROOT_DIR.DIRECTORY_SEPARATOR.EXTERNAL_FOLDER.DIRECTORY_SEPARATOR.'content'.DIRECTORY_SEPARATOR.TVPLAYER_LOCATION : ROOT_DIR.DIRECTORY_SEPARATOR.'content'.DIRECTORY_SEPARATOR.TVPLAYER_LOCATION.DIRECTORY_SEPARATOR.$folderName ;

    $dir = new RecursiveDirectoryIterator( $moviesDir,FilesystemIterator::SKIP_DOTS );
    foreach(new RecursiveIteratorIterator($dir,RecursiveIteratorIterator::SELF_FIRST) as $file) 
    {

        $filename= $file->getFilename();
	// echo "<p>File: ".$filename."</p>";
	// $filePath= 
	// echo "filename:".$filename."</p>";
       /// echo strpos($filename,'.','-4');
	$title = substr( $filename ,0,strlen($filename)-4);
	$displayTitle = str_replace("-", ' ', $title);
	$displayTitle = str_replace(".", ' ', $displayTitle);
	$displayTitle = str_replace("_", ' ', $displayTitle);		
	
	$titleLen=8;
	if (strlen($title)<=8) { $titleLen=strlen($title);}
	$shortTitle = substr( $title ,0,$titleLen);
    $itemID="'".$title."'";
    
            $itemUrl = (EXTERNAL_TEXT == 1) ?  SITE_URL.'/'. EXTERNAL_FOLDER.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$filename:  SITE_URL.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$filename;//str_replace(SITE_URL,'', $filename);
        //$itemUrl = $fullPathPrefix.'/'.$folderName.'/'.$filename;
	$checkApple = strpos($itemUrl,".Apple");
	$currentFolder = str_replace($filename, '', $itemUrl);
	
	
	// check isn't a .dot or an .Apple item
	if ((substr( $filename ,0,1) != ".")&&($checkApple===false)) {
		
		// Is it a movie file or directory?
		if ($file->Isfile()  && (substr( $filename,-4) == ".mp4")) {		
						
			//$tags = str_replace($scriptDir."/".$baseFolder,"",$currentFolder);
			//$tags = str_replace("/"," ",$tags);
			// echo $tags."<br>";
			$imageURLJPG = $title.$jpg;
			$imageURLPNG = $title.$png;
			$imageURLdefaultJPG = $defaultNavJPG;
			$imageURLdefaultPNG = $defaultNavPNG;
                        
//                        $thisFullImagePathJPG=$fullPathPrefix.'/'.$folderName.'/'.$imageURLJPG;
//			$thisFullImagePathPNG=$fullPathPrefix.DIRECTORY_SEPARATOR.'/'.$folderName.'/'.$imageURLPNG;
//			$thisFullImagePathDefaultJPG=$fullPathPrefix.DIRECTORY_SEPARATOR.'/'.$folderName.'/'.$imageURLdefaultJPG;
//			$thisFullImagePathDefaultPNG=$fullPathPrefix.DIRECTORY_SEPARATOR.'/'.$folderName.'/'.$imageURLdefaultPNG;					
						
			// If there's no thumbnail for this movie use either the default one in this folder or if that doesn't exist the default one

//				if(file_exists($thisFullImagePathJPG)) { 
//					$imageURL=$imageURLJPG;
//				}   else if(file_exists($thisFullImagePathPNG)){
//					$imageURL=$imageURLPNG;
//				} else if(file_exists($thisFullImagePathDefaultJPG)){ 
//					$imageURL=$imageURLdefaultJPG;
//					
//				} else if(file_exists($thisFullImagePathDefaultPNG)){
//					$imageURL=$imageURLdefaultPNG;
//				} else {
//					$imageURL=$defaultNav;
//				} // END thumbs image exists test
			
                        $thisFullImagePathJPG= (EXTERNAL_TEXT == 1) ?  ROOT_DIR.'/'. EXTERNAL_FOLDER.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLJPG :  ROOT_DIR.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLJPG;
			$thisFullImagePathPNG=  (EXTERNAL_TEXT == 1) ? ROOT_DIR.'/'.EXTERNAL_FOLDER.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLPNG : ROOT_DIR.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLPNG;
			$thisFullImagePathDefaultJPG = (EXTERNAL_TEXT == 1) ? ROOT_DIR.'/'.EXTERNAL_FOLDER.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLPNG : ROOT_DIR.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLdefaultJPG;
			$thisFullImagePathDefaultPNG= (EXTERNAL_TEXT == 1) ? ROOT_DIR.'/'.EXTERNAL_FOLDER.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLPNG : ROOT_DIR.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLdefaultPNG;					
						
			// If there's no thumbnail for this movie use either the default one in this folder or if that doesn't exist the default one
                        //var_dump(file_exists($thisFullImagePathJPG));exit;
                         
                       // $headers = @get_headers("$thisFullImagePathJPG");
                       	     if(file_exists($thisFullImagePathJPG)) { 
					$imageURL=(EXTERNAL_TEXT == 1) ?  SITE_URL.'/'. EXTERNAL_FOLDER.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLJPG :  SITE_URL.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLJPG;
				}   else if(file_exists($thisFullImagePathPNG)){
					$imageURL=(EXTERNAL_TEXT == 1) ? SITE_URL.'/'.EXTERNAL_FOLDER.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLPNG : SITE_URL.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLPNG;
				} else if(file_exists($thisFullImagePathDefaultJPG)){ 
					$imageURL= (EXTERNAL_TEXT == 1) ? SITE_URL.'/'.EXTERNAL_FOLDER.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLPNG : SITE_URL.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLdefaultJPG;
					
				} else if(file_exists($thisFullImagePathDefaultPNG)){
					$imageURL=(EXTERNAL_TEXT == 1) ? SITE_URL.'/'.EXTERNAL_FOLDER.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLPNG : SITE_URL.'/content/'.TVPLAYER_LOCATION.'/'.$folderName.'/'.$imageURLdefaultPNG;
				} else {
					$imageURL=$defaultNav;
				} // END thumbs image exists test
			// END thumbs image exists test
                        //header("Content-Type: video/mp4");
                        $iconID=$title."_icon";
                        //<img onClick="playvid('.$itemID.');" class="videoicon" id="'.$iconID.'" width="320" height="240" src="'.$imageURL.'" />
		    echo '<div class="myfig"><img onClick="playvid('.$itemID.');" class="videoicon" id="'.$iconID.'" width="320" height="240" src="'.$imageURL.'" /><p class="imgtitle">'.$displayTitle.'</p>';
                    echo '<video onClick="playvid('.$itemID.');" class="videoclip" id="'.$title.'" width="1" height="1" controls preload="none" onended="videoEnded('.$itemID.')" src="'.$itemUrl.'">
			  <source src="'.$itemUrl.'" type="video/mp4"> 
				  Your browser does not support the video tag.
			  </video> </div>
		  ' ;
		} 
		} // END if is not apple
    } // END foreach
    ?>