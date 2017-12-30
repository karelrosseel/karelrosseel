<style>
body {
  padding: 2rem;
}


.gallery-wrapper {
  display: grid;
  grid-template-columns: 1fr;
  grid-gap: 2rem;
  max-width: 1100px;
  margin: auto;
}

@media (min-width: 600px) {
  .gallery-wrapper {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 2rem;
  }
}
  

@media (min-width: 900px) {
  .gallery-wrapper {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 2rem;
  }
}

.gallery-image img {
  width: 100%;
  
  
}


	.gallery-image{
        cursor:pointer;
		position: relative;
		display: block;

	}

	.gallery-text{
	    position: absolute;
	    top: 0; right: 0;
	    bottom: 0; left: 0;
	   width: 100%;
	   height: 100%;
	    text-align: center;
	    background-color: rgba(0,0,0,0.8);
	    opacity: 0;
	    -webkit-transition: opacity 0.6s;
	    -moz-transition: opacity 0.6s;
	    transition: opacity 0.6s;
       vertical-align:middle;
       line-height:200px;
     
	}

	.gallery-text:hover{
	    opacity: 1;
	   
	}

	.gallery-text h3{
	    color: white;
	            
	}

</style>

<?php
//index.php
$connect = mysqli_connect("localhost", "id4055259_karel", "karel", "id4055259_slider");
function make_query($connect)
{
 //$query = "SELECT * FROM banner ORDER BY banner_id ASC"; //originele query
 //$query = "SELECT * FROM banner ORDER BY banner_id ASC LIMIT 4";
 $query = "SELECT * FROM banner WHERE banner_tag='winter' ORDER BY banner_id ASC"; //query met selectie voor winter
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_photolist($connect)
{
 $output = '';
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  
<div class="gallery-image">
   
             <img src="banner/'.$row["banner_image"].'" alt="'.$row["banner_title"].'"/>
  
   <a href=' . $row["banner_url"] . '> <div class="gallery-text"><h3>'. $row["banner_title"]. '</h3></div></a>
   
   </div>'
    ;
 }
 return $output;
}


?>
<!DOCTYPE html>
<html>
 <head>
  <title>How to Make Dynamic Bootstrap Carousel with PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
    <div class="gallery-wrapper">
         
             <?php echo make_photolist($connect); ?>
        
  </div>
   <!-- <div class="g1"></div>-->
 </body>
</html>