<?php include "header.php" ?>
  <script src="https://cdn.jsdelivr.net/npm/p5@1.2.0/lib/p5.min.js"></script>
  <script src="https://unpkg.com/ml5@0.6.0/dist/ml5.min.js"></script>
  <meta charset="utf-8" />
<style>
#defaultCanvas0{
	margin-top:10px;
}
</style>
   <div class="container mt-4 ml-2 card">
              <div class="row">
                    <div class="col-md-12">
                    <h2 class="text-center pt-2 ">Output Module</h1>
                    </div>
					
                    <script src="output.js"></script>
              </div>
            </div>
<div id="txtop" contenteditable="true" style="border:1px solid white;color:white;margin-top:5px"></div>

<br>
  <button id="start" onclick="myStartFunction()" class="button upload" style="display:inline-block">START</button>&nbsp;<button id="stop" onclick="myStopFunction()" class="button upload" style="display:inline-block">STOP</button>
 <span id="wait" style="margin-left:20px;background-color:green;padding:7px;color:white;font-weight:bold"></span>
   <div class="container">
 
  <form class="col s8 offset-s2">
    <div class="row" hidden>
      <label>Choose voice</label>
      <select id="voices"></select>
    </div>
    <div class="row" hidden>
      <div class="col s6">
        <label>Rate</label>
        <p class="range-field">
          <input type="range" id="rate" min="1" max="100" value="10" />
        </p>
      </div>
      <div class="col s6">
        <label>Pitch</label>
        <p class="range-field">
          <input type="range" id="pitch" min="0" max="2" value="1" />
        </p>
      </div>
      <div class="col s12">
        <p>N.B. Rate and Pitch only work with native voice.</p>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
       <!-- <textarea id="message" class="materialize-textarea"></textarea>-->
	   <!--<div id="message" >PROGRAMMER</div>-->

      </div>
    </div>
	<br>
    <a href="#" id="speak" class="button upload" style="display:inline-block">Speak</a>
  </form>  
</div>

 <script>
   let wvar=1;
  function myStartFunction() {
  myVar = setInterval(function(){ 
  //console.log("s");
 // alertFunc("First parameter", "Second parameter");  wait
 var sw=wvar++;
 document.getElementById("wait").innerHTML="WAIT FOR "+sw+" SEC";
  if(wvar%6==0){
	   wvar=1;
	   document.getElementById("blbtn").click();
	}
  
  }, 5000);
}
function myStopFunction() {
  clearInterval(myVar);
}
 </script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/js/materialize.min.js"></script>

  <script>
$(function(){
  if ('speechSynthesis' in window) {
    speechSynthesis.onvoiceschanged = function() {
      var $voicelist = $('#voices');

      if($voicelist.find('option').length == 0) {
        speechSynthesis.getVoices().forEach(function(voice, index) {
          var $option = $('<option>')
          .val(index)
          .html(voice.name + (voice.default ? ' (default)' :''));

          $voicelist.append($option);
        });

        $voicelist.material_select();
      }
    }

    $('#speak').click(function(){
      var text = $('#txtop').text();
      var msg = new SpeechSynthesisUtterance();
      var voices = window.speechSynthesis.getVoices();
      msg.voice = voices[$('#voices').val()];
      msg.rate = $('#rate').val() / 10;
      msg.pitch = $('#pitch').val();
      msg.text = text;

      msg.onend = function(e) {
        console.log('Finished in ' + event.elapsedTime + ' seconds.');
      };

      speechSynthesis.speak(msg);
    })
  } else {
    $('#modal1').openModal();
  }
});
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.1.1/gsap.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/Physics2DPlugin3.min.js'></script>
<?php include "footer.php" ?>