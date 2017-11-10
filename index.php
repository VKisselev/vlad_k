<?php include("include/header.php");
$imageFiles = [];
$imageDirectory = "images";
$textFiles = [];
$finalArray = [];



if(is_dir($imageDirectory)) {
	
    foreach(scandir($imageDirectory) as $file)
        {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if ($ext == 'png')
            {
                $imageFiles[] .= '<img class="img-responsive" src="Images/'.$file.'">';
            } else if ($ext == 'txt')
            {
                $textFiles[] .= '<blockquote class"blockquote"><p class="mb-0 text-center">'. file_get_contents('Images/'.$file).'</p></blockquote>';
            }
        }
    

    
}
?>
<div class="container">
	<table class="table table-striped table-bordered">
			<?php 
            $count=0;
            $currentValue=0;
            foreach($imageFiles as $file)
                {
                
                if($count < 3) {
                    echo '<td class="sucess">'.$file.$textFiles[$currentValue].'</td>';
                    $count++;
                    $currentValue++;
                } elseif ($count == 3) {
                    echo '</tr><tr>';
                    $count=0;
                    $currentValue++;
                }
                 
                
                }
            ?>
                
			
	</table>
</div>

<?php include("include/footer.php");?>