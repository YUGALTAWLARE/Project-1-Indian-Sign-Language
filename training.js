
let video;
let videoSize = 64;
let ready = false;

let pixelBrain;
let label = '';

let save;
let train;
function setup() {
  createCanvas(200, 200);
  video = createCapture(VIDEO, videoReady);
  video.size(videoSize, videoSize);
  video.hide();
  
 var div = createDiv();
 div.id('trainingdiv');
  div.addClass('trainingdiv buttons');
  div.style('border','1px solid white');
  div.style('padding','8px');
  div.style('margin-top','0px');
  div.style('position','relative');
  div.style('left','230px');
  div.style('margin','0px');
  div.style('width','900px');
  

let ii=2;
  for (var i = 65; i <= 90; i++) {
	  var yt=String.fromCharCode(i);
 var btn = document.createElement("BUTTON");   
 btn.innerHTML = String.fromCharCode(i);                   
 var yy=document.getElementById('trainingdiv').appendChild(btn); 
 
 $( "button" ).each(function( index,item ) {
  //console.log( index + ": " + $( this ).text() );
  $( item ).attr("class", "trnbtn btn-hover color-"+(index+1));
$( item ).attr("id", $( this ).text());
$( item ).attr("onclick", "addExample(this)");	
});
 ii++;
}

 space = createButton('space');
    space.id('space');
    space.addClass('trnbtn btn-hover color-25');
document.getElementById("trainingdiv").appendChild(space.elt);
$( "#space" ).attr("onclick", "addExample(this)");


  train = createButton('Train');
  //train.position(250, 300);
  train.id('btntrain');
  document.getElementById("btntrain").setAttribute("onclick", "trainSystem()");

  save = createButton('Save');
  //save.position(250, 250);
  save.id('btnsave');
  document.getElementById("btnsave").setAttribute("onclick", "saveModule()");

  
let customLayers= [
  {
    type: 'conv2d',
    filters: 8,
    kernelSize: 5,
    strides: 1,
    activation: 'relu',
    kernelInitializer: 'varianceScaling',
  },
  {
    type: 'maxPooling2d',
    poolSize: [2, 2],
    strides: [2, 2],
  },
  {
    type: 'conv2d',
    filters: 16,
    kernelSize: 5,
    strides: 1,
    activation: 'relu',
    kernelInitializer: 'varianceScaling',
  },
  {
    type: 'maxPooling2d',
    poolSize: [2, 2],
    strides: [2, 2],
  },
  {
    type: 'flatten',
  },
  {
    type: 'dense',
    kernelInitializer: 'varianceScaling',
    activation: 'softmax',
  },
];

  let options = {
    inputs: [64, 64, 4],
    task: 'imageClassification',
	layers:customLayers,
    debug: true
  };
  pixelBrain = ml5.neuralNetwork(options);
  
 
}

function loaded() {
  pixelBrain.train(
    {
      epochs: 50,
    },
    finishedTraining
  );
}

function finishedTraining() {
  console.log('training complete');
  //classifyVideo();
}

// function classifyVideo() {
  // let inputImage = {
    // image: video,
  // };
  // pixelBrain.classify(inputImage, gotResults);
// }

// function gotResults(error, results) {
  // if (error) {
    // return;
  // }
  // label = results[0].label;
  // classifyVideo();
// }
// function happySystem(){
	// addExample('Happy');
// }
// function nothappySystem(){
	// addExample('Not Happy');
// }
function trainSystem(){
	  pixelBrain.normalizeData();
     pixelBrain.train(
       {
         epochs: 50,
       },
       finishedTraining
     );
}
function saveModule(){
	//pixelBrain.saveData();
	pixelBrain.save()
}
function addExample(label) {
var lx=label.id;
var ly;
if(lx=="space"){
	ly=" ";
}else{
	ly=label.id;
}
	
  let inputImage = {
    image: video,
  };
  let target = {
    ly,
  };
  console.log('Adding example: ' + ly);
  pixelBrain.addData(inputImage, target);
}

// Video is ready!
function videoReady() {
  ready = true;
}

function draw() {
  background(0);
  if (ready) {
    image(video, 0, 0, width, height);
  }

  textSize(64);
  textAlign(CENTER, CENTER);
  fill(255);
  text(label, width / 2, height / 2);
}