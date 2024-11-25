

// Clear Sambanova API Key
$(document).ready(function(){
$("#clear_api_key_btn").click(function(){
$('#sambanova_api_key').val('');

alert('API Key Cleared Successfully...');
});
});




 




$(document).ready(function(){
$(".image_btn1").click(function(){

var id_image = this.id; 
$("#image_name").html(id_image);

var sambanova_api_key= $('#sambanova_api_key').val();
var sambanova_model= $('#sambanova_model').val();
var medium_api_token= $('#medium_api_token').val();

if(sambanova_api_key == ''){
alert('Sambanova API Key cannot be empty');
return false;
}
if(sambanova_model == ''){
alert('Please Select Sambanova AI Model');
return false;
}

if(medium_api_token == ''){
alert('Medium API  Token cannot be empty');
return false;
}


$("#result_img").empty();
$("#result_img2").empty();



async function urlToBase64(url) {
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    const blob = await response.blob();
    const reader = new FileReader();
    return new Promise((resolve, reject) => {
      reader.onloadend = () => resolve(reader.result);
      reader.onerror = reject;
      reader.readAsDataURL(blob);
    });
  } catch (error) {
    console.error('Error converting URL to Base64:', error);
    return null; // or throw the error, depending on your error handling strategy
  }
}



//const imageUrl = "http://localhost/sambanova_image_anlyzer/img/image1.png"; 
const imageUrl = `${image_url_settings}/${id_image}.png`; 

urlToBase64(imageUrl,id_image,sambanova_api_key,sambanova_model)
  .then(base64 => {
    if (base64) {
     // console.log("Base64 representation:", base64);

      // Use the base64 string here, e.g., to display the image in an <img> tag:
    // document.getElementById("myImage").src = base64;
$("#base64_img").attr("src", base64);

$("#loader_img").fadeIn(400).html('<br><center><div class="loader_css"><img src="img/loader.gif">&nbsp; Generating  Data From Image By Sambanova AI...</div></center>');

        $.ajax({
            url: 'sambanova_ai_content_image.php',
            type: 'post',
            data: {base64_image:base64,sambanova_api_key:sambanova_api_key, sambanova_model:sambanova_model},
            dataType: 'html',
            success: function(data){
$("#loader_img").hide();
//$("#result_img").html(data);
$("#result_img").html(marked.parse(data));
$(".alerts_content").delay(5000).fadeOut('slow');
            }
        });

// ajax call ends




    }
  });



  });
  });




// Sambanova AI Image Content Generation starts
$(document).ready(function(){


$(".image_btn").click(function(){

var base64_image = $('.base64_image').val();
var sambanova_api_key= $('#sambanova_api_key').val();
var sambanova_model= $('#sambanova_model').val();


if(sambanova_api_key == ''){
alert('Sambanova API Key cannot be empty');
return false;
}
if(sambanova_model == ''){
alert('Please Select Sambanova AI Model');
return false;
}


$("#result_img").empty();
$("#result_img2").empty();
if(base64_image == ''){
alert('Please Upload Image For Analysis');
return false;
}

        // AJAX Request

$("#loader_img2").fadeIn(400).html('<br><center><div class="loader_css"><img src="img/loader.gif">&nbsp; Generating  Data From Image By Sambanova AI....</div></center>');

        $.ajax({
            url: 'sambanova_ai_content_image.php',
            type: 'post',
            data: {base64_image:base64_image,sambanova_api_key:sambanova_api_key, sambanova_model:sambanova_model},
            dataType: 'html',
            success: function(data){
$("#loader_img2").hide();
//$("#result_img2").html(data);
$("#result_img2").html(marked.parse(data));
$(".alerts_content").delay(5000).fadeOut('slow');
            }
        });
    });
});

// Sambanova AI Image Content Generation  ends






//convert image to base 64
 const image_file = document.querySelector('#image_file');
    image_file.addEventListener('change', (e) => {
// convert images to base64
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onloadend = () => {
       //console.log(reader.result);
var image_base64String = reader.result;
document.getElementById("image_base64String").value = image_base64String;

   // document.getElementById("myImage").src = base64;
$("#base64_img2").attr("src", image_base64String);


 };
        reader.readAsDataURL(file);
    });
