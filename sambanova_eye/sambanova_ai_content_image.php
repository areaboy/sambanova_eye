<script>

// Test to Speech Starts


$(document).ready(function() {
  $('#speakButton').click(function() {
    const text_check = $('#textToSpeak').val();
// remove all html elements
const text = text_check.replace(/<[^>]*>/g, "");
    if (text.trim() === '') return;

    utterance = new SpeechSynthesisUtterance(text);
    speechSynthesis.speak(utterance);

    $(this).prop('disabled', true);
    $('#pauseButton').prop('disabled', false);
    $('#stopButton').prop('disabled', false);
    animateVisualizer();

    utterance.onend = function() {
      $('#speakButton').prop('disabled', false);
      $('#pauseButton').prop('disabled', true);
      $('#stopButton').prop('disabled', true);
      cancelAnimationFrame(animationFrameId);
      resetVisualizer();
    };
  });

  $('#pauseButton').click(function() {
    speechSynthesis.pause();
    $(this).text('Resume');
    $(this).off('click'); // Remove existing click handler
    $(this).click(resumeSpeech);
    cancelAnimationFrame(animationFrameId);
  });

  function resumeSpeech() {
    speechSynthesis.resume();
    $('#pauseButton').text('Pause');
    $('#pauseButton').off('click'); // Remove existing click handler
    $('#pauseButton').click(function() {
      speechSynthesis.pause();
      $(this).text('Resume');
      $(this).off('click');
      $(this).click(resumeSpeech);
      cancelAnimationFrame(animationFrameId);
    });
    animateVisualizer();
  }

  $('#stopButton').click(function() {
    speechSynthesis.cancel();
    $('#speakButton').prop('disabled', false);
    $('#pauseButton').prop('disabled', true);
    $('#pauseButton').text('Pause');
    $('#stopButton').prop('disabled', true);
    cancelAnimationFrame(animationFrameId);
    resetVisualizer();
  });



// On modal close stop speaking
$(document).ready(function(){
$('#myModal_images').on('hidden.bs.modal', function() {
 speechSynthesis.cancel();
    $('#speakButton').prop('disabled', false);
    $('#pauseButton').prop('disabled', true);
    $('#pauseButton').text('Pause');
    $('#stopButton').prop('disabled', true);
    cancelAnimationFrame(animationFrameId);
    resetVisualizer();
 });
});

$(document).ready(function(){
$('#myModal_images2').on('hidden.bs.modal', function() {
 speechSynthesis.cancel();
    $('#speakButton').prop('disabled', false);
    $('#pauseButton').prop('disabled', true);
    $('#pauseButton').text('Pause');
    $('#stopButton').prop('disabled', true);
    cancelAnimationFrame(animationFrameId);
    resetVisualizer();
 });
});

  function animateVisualizer() {
    const visualizer = $('#audioVisualizer');
    visualizer.empty();

    const numBars = 15;
    for (let i = 0; i < numBars; i++) {
      const bar = $('<div class="bar"></div>');
      bar.css('height', Math.random() * 80 + 20 + 'px');
      visualizer.append(bar);
    }
    animationFrameId = requestAnimationFrame(animateVisualizer);
  }

  function resetVisualizer() {
    $('#audioVisualizer').empty();
  }
});


// Text to Speech Ends
</script>



<?php
error_reporting(0);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
include('settings.php');
$base64Image = strip_tags($_POST['base64_image']);
$sambanova_api_key = strip_tags($_POST['sambanova_api_key']);
$sambanova_api_model = strip_tags($_POST['sambanova_model']);

if ($base64Image == ''){
echo "<div class='bad_css' id='alerts_content'>Base64 Image cannot be empty</div>";
exit();
}


$apiEndpoint = $sambanova_api_url;


$data = array(
    "model" => $sambanova_api_model,
    "messages" => array(
        array(
            "role" => "user",
            "content" => array(
                array(
                    "type" => "text",
                    "text" => "What is in this image?. Generate Posts Contents based on the Image. Give full details. Give Cities name, Locations or Country or any nearby Country/locations where it was taken. Describe the Picture Environments etc."
                ),
                array(
                    "type" => "image_url",
                    "image_url" => array(
                        "url" => $base64Image
                    )
                ),
            )
        )
    )
);
$jsonData = json_encode($data);

$ch = curl_init($apiEndpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json', "Authorization: Bearer $sambanova_api_key"
));

$response = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);




if($response == ''){
echo "<div class='alerts_content bad_css' >API Call to Sambanova AI Failed. Ensure there is an Internet  Connections...</div><br>";
exit();
}

$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// catch error message before closing
if (curl_errno($ch)) {
   //echo $error_msg = curl_error($ch);
}
curl_close($ch);

if($http_status == 400){
echo "<div class='alerts_content  bad_css'>Server Unable to understand Your Request. Ensure The Sambanova Model is Correct</div><br>";
exit();
}

if($http_status == 401){
echo "<div class='alerts_content bad_css' >Sambanova Invalid Authentication Keys</div><br>";
exit();
}


if($http_status == 408){
echo "<div class='alerts_content  bad_css'>Samabanova Request Timeout</div><br>";
exit();
}


if($http_status == 429){
echo "<div class='alerts_content bad_css'>Sambanova -- Too Many Request. Insufficient Quota</div><br>";
exit();
}

if($http_status == 200){
$responseData = json_decode($response, true);
$allContent = $responseData['choices'][0]['message']['content'];

$cleanedString = strip_tags(preg_replace('/[^a-zA-Z0-9,\.\s]/', '', $allContent)); 

echo "
<div class='res_clear result_ai2'>
<div class=''>

<center><h4><b style='color:purple'>Image Description Successfully Generated by Sambanova AI</b></h4></center>

 <div class='col-sm-6'>
<b>Image AI Analysis:</b> $allContent
</div>


 <div class='col-sm-6 well'>
<textarea cols='5' rows='5' id='textToSpeak' placeholder=''>$cleanedString</textarea>
<br>
<button class='speakButton' id='speakButton'>Speak</button>
<button class='pauseButton' id='pauseButton' disabled>Pause</button>
<button class='stopButton' id='stopButton' disabled>Stop</button>
<div id='audioVisualizer'></div>
</div>

<div style='width:100%;'>.</div>
<br><br>
</div></div>";


}





}



?>




