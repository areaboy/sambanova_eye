<!DOCTYPE html>
<html lang="en">

<head>
 <title>Sambanova Eye</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style_css.css">
<link rel="stylesheet" href="bootstraps/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="bootstraps/bootstrap.min.js"></script>
 <script src="markdown/marked.min.js"></script>
</head>
<body>






<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img title='logo' class="img-rounded imagelogo_data" src="img/logo_img.png"></li>
<span class='navbar_title'></span>
    </div>
    <div class="collapse navbar-collapse" id="navgator">


      <ul class="nav navbar-nav navbar-right">

      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->


<br>

<div class="row">
<div class="col-sm-12">
<h2><center><b>Sambanova Eye</b></center></h2>

<center><h4>This is an application that allow  blind and visually impaired individuals to analyze images and understand the visual world around them leveraging
 <b style='color:fuchsia'>Sambanova AI</b></h4></center>
<br>

<h2>How it Works</h2>
The application allowed users analyze our sample  images or  to upload personal images from a browser, Desktop, Phones Cameras, etc.
 to be proccessed by <b>Sambanova AI</b> models for image content object recognition and analysis. The resultant data is displayed to the user which He/She can <b>
read or listen to via Audio--(Text to Speech)</b>.



<h2>Use Cases For the Blind</h2>
<ul>
<li><b>Object Recognition and Scene Understanding:</b> Application leverages <b>Sambanova AI</b> models to identify objects within an image, 
understand their relationships (e.g., "a cat sitting on a mat"), and describe the overall scene. 
This provides a textual description that a blind person can listen to or read. These descriptions can be quite detailed,
 specifying colors, sizes, and positions of objects.</li>

<li><b>Real-time Image Environmental Description:</b> Application leverages <b>Sambanova AI</b> to process images from a phone's camera in real-time, providing immediate descriptions of the environment. 
This is particularly useful for navigation for the blind and visually impaired individuals.</li>

<li><b>E-Commerce/Online Shopping:</b> Application leverages <b>Sambanova AI</b> to analyze product images and generate detailed descriptions. 
This includes not only identifying the product but also describing its features, colors, materials, and even style. Thus allowing blind and visually impaired individuals to select the perfect item.

In summary, <b>Samabanova Eye</b> application has tremendous potential to empower blind and visually impaired individuals, 
promoting greater independence and inclusion. 


</ul>

</h4></center>

</div>
</div>
<!-- row end  -->
<br><br>


<!-- row starts  -->
<div class="well row">


<div class="col-sm-3 alerts alert-info">

 <div class="form-group">
              <label> Sambanova API Key: </label>
              <input type="password" class="col-sm-12 form-control" id="sambanova_api_key"  placeholder="Sambanova API Key">
            </div>

<br>








 <div class="form-group">
              <label>Sambanova Model: </label>
              <select class="col-sm-12 form-control" id="sambanova_model"  placeholder="Sambanova Model">
<option value=''>--Select Model--</option>
<option value='Llama-3.2-11B-Vision-Instruct'>Llama-3.2-11B-Vision-Instruct</option>
<option value='Llama-3.2-90B-Vision-Instruct'>Llama-3.2-90B-Vision-Instruct</option>
</select>
            </div>

<br>



<br><br><button class='btn3' id="clear_api_key_btn" title='Clear API Key'>Clear Sambanova API Key</button>

 
</div>


<!-- form starts  -->
<div class="col-sm-9">




  
<div class='row'>

 <div class="form-group">
<label>Image Upload From Browsers, Phone Cameras, Desktops etc.</label>
  <input type="file"  class="image_file" id="image_file"  accept="image/*"/>
<input type='hidden' id='image_base64String' class='base64_image' value=''>
</div>

<center><button class='btn btn-info image_btn' title='Upload & Analyze Image' data-toggle='modal' data-target='#myModal_images2'>Upload & Analyze Image</button></center>

<div style='width:100%;'>.</div>
<center><h2>OR</h2></center>

<b>Analyze any of the Images below.....</b><br>

<div style='color:red;font-size:12px'>Image Source: Pixabay.com</div><br>

<div style='width:100%;'>.</div>
<div class='col-sm-4 well'>
<img class='rounded' src='img/image7.png' style='min-width:300px;min-height:300px;max-width:300px;max-height:300px;'>
<br>
<br>
<center><button class='btn btn-primary image_btn1' id='image7' title='Analyze Image' data-toggle='modal' data-target='#myModal_images'>Analyze Image</button></center>
</div>
<div class='col-sm-4 well'>
<img class='rounded' src='img/image2.png' style='min-width:300px;min-height:300px;max-width:300px;max-height:300px;'>
<br>
<br>
<center><button class='btn btn-primary image_btn1' id='image2' title='Analyze Image'  data-toggle='modal' data-target='#myModal_images'>Analyze Image</button></center>
</div>
<div class='col-sm-4 well'>
<img class='rounded' src='img/image3.png' style='min-width:300px;min-height:300px;max-width:300px;max-height:300px;'>
<br>
<br>
<center><button class='btn btn-primary image_btn1' id='image3' title='Analyze Image' data-toggle='modal' data-target='#myModal_images'>Analyze Image</button></center>

</div>
<div class='col-sm-4 well'>
<img class='rounded' src='img/image4.png' style='min-width:300px;min-height:300px;max-width:300px;max-height:300px;'>
<br>
<br>
<center><button class='btn btn-primary image_btn1' id='image4' title='Analyze Image' data-toggle='modal' data-target='#myModal_images'>Analyze Image</button></center>
</div>
<div class='col-sm-4 well'>
<img class='rounded' src='img/image5.png' style='min-width:300px;min-height:300px;max-width:300px;max-height:300px;'>
<br>
<br>
<center><button class='btn btn-primary image_btn1' id='image5' title='Analyze Image' data-toggle='modal' data-target='#myModal_images'>Analyze Image</button></center>
</div>
<div class='col-sm-4 well'>
<img class='rounded' src='img/image6.png' style='min-width:300px;min-height:300px;max-width:300px;max-height:300px;'>
<br>
<br>
<center><button class='btn btn-primary image_btn1' id='image6' title='Analyze Image' data-toggle='modal' data-target='#myModal_images'>Analyze Image</button></center>
</div>





</div>






</div>



<div class="col-sm-0">

</div>

</div>






<!-- row ends  -->







<!--Images Modal starts here -->


<div class="container_map">

  <div class="modal fade" id="myModal_images" role="dialog">
    <div class="modal-dialog modal-lg  modal-appear-center1 pull-right1_no modaling_sizing1  full-screen-modal_no">
      <div class="modal-content">
        <div class="modal-header" style="color:black;background:#c1c1c1">
 <h3>Images Analyzer For the Blind</h3>

      
 <button type="button" class="close btn btn-warning" data-dismiss="modal">Close</button>


        </div>
        <div class="modal-body">


<!-- start-->
<center><h3>Image Name: <span style='color:fuchsia' id="image_name"></span></h3></center><br>

<img id='base64_img' style='min-width:200px;min-height:200px;max-width:200px;max-height:200px;'><br><br>
 

<div id="loader_img"></div>
<div id="result_img" class='result_ai2'></div>



<!-- end -->


        </div>
      

   <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


      </div>


      </div>
    </div>
  </div>
</div>



<!-- Images Modal modal ends here -->






<!--Images Modal starts here -->


<div class="container_map">

  <div class="modal fade" id="myModal_images2" role="dialog">
    <div class="modal-dialog modal-lg  modal-appear-center1 pull-right1_no modaling_sizing1  full-screen-modal_no">
      <div class="modal-content">
        <div class="modal-header" style="color:black;background:#c1c1c1">
 

      
 <button type="button" class="close btn btn-warning" data-dismiss="modal">Close</button>
<h3>Image Analyzer For the Blind</h3>


        </div>
        <div class="modal-body">

<!-- start-->


<img id='base64_img2' style='min-width:200px;min-height:200px;max-width:200px;max-height:200px;'><br><br>

<div id="loader_img2"></div>
<div id="result_img2"></div>



<!-- end -->


        </div>
      

   <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


      </div>


      </div>
    </div>
  </div>
</div>



<!-- Images Modal modal ends here -->


<style>

body {
  font-family: sans-serif;
 // text-align: center;
  padding: 20px;
}

textarea {
  width: 80%;
  padding: 10px;
  margin-bottom: 10px;
  box-sizing: border-box;
}

button {
  margin: 5px;
  padding: 10px 15px;
  font-size: 16px;
}

#audioVisualizer {
  width: 180px;
  height: 100px;
  margin: 20px auto;
  background-color: #f0f0f0;
  border: 1px solid #ccc;
  overflow: hidden;
}

.bar {
  float: left;
  width: 10px;
  background-color: #007bff; /* Blue bars */
  margin-right: 2px;
  transition: height 0.1s ease-in-out; /* Smooth animation */
}
</style>

<script src="script/image_url_setting.js"></script>
<script src="script/script_ai.js"></script>


<br><br><br><br><br>
</body>
</html>



















