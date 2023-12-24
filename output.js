let video;
let videoSize = 64;
let ready = false;
let label = '';
let classifier;
let nn;
let inputImage;
let labelP;

function setup() {
  createCanvas(200, 200);
  video = createCapture(VIDEO,videoReady);
  video.size(videoSize, videoSize);
  video.hide();
  
  labelP = createP('');
  
  labelP.style('font-size', '32pt');
   labelP.id('caminput');
  labelP.addClass('caminput');
  x = width / 2;
  y = height / 2;
  
  
  var billingdiv = createDiv();
  //billingdiv.style('border','1px solid black');
  billingdiv.style('padding','8px');
  billingdiv.style('margin-top','8px');
  billingdiv.id('billingdiv');
  billingdiv.addClass('billingdiv');
  
  billButton = createButton('Insert');
  billButton.style('margin-top','8px');
  billButton.style('display','inline');
  billButton.style('background-color','green');
  billButton.style('border','1px solid black');
  billButton.style('font-weight','bold');
  billButton.style('font-size','18px');
  //billButton.style('width','100%');
  billButton.id('blbtn');
  billButton.addClass('billbtn');
  document.getElementById("billingdiv").appendChild(billButton.elt);
  document.getElementById("blbtn").setAttribute("onclick","addLabel()");
}
function addLabel(){
    //txtop
	var cm=document.getElementById("caminput").innerHTML;
	sp=createSpan(cm);	
	document.getElementById("txtop").appendChild(sp.elt);
}

function videoReady() {
  ready = true;
  console.log('Video ready!');
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
   nn = ml5.neuralNetwork(options);
  const modelDetails = {
    model: 'model.json',
    metadata: 'model_meta.json',
    weights: 'model.weights.bin'
  }
  nn.load(modelDetails, modelReady);
   inputImage = {
     image: video,
   };
}

 function modelReady() {
 
  nn.classify(inputImage, gotResults);

  }

  function gotResults(error, results) {

	   if (error) {
			 return;
		 }
		label = results[0].label;
		
      labelP.html(label);

    modelReady();
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