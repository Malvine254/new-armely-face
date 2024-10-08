<?php include 'php/check_session.php'; ?>
<!doctype html>
	<html lang="en">
	  <head>
	  	<title>Solutions</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
			
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="css/style.css">
			<!-- Favicon -->
		<link rel="icon" href="../img/logo/logo1.png"> 
	  </head>
	  <body>
			
			<div class="wrapper d-flex align-items-stretch" >
				<nav id="sidebar">
					<div class="custom-menu">
						<button type="button" id="sidebarCollapse" class="btn btn-primary">
		          <i class="fa fa-bars"></i>
		          <span class="sr-only">Toggle Menu</span>
		        </button>
	        </div>
					<div class="p-4 pt-5" >
			  		<h1><a href="index" class="armely">armely</a></h1>
		        <ul class="list-unstyled components mb-5">
		          <li class="active">
		            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Speech Service</a>
		            <ul class="collapse list-unstyled" id="homeSubmenu">
	                <li>
	                     <a class="nav-item-one" href="#" data-target="#content1">Speech to Text</a>
	                </li>
	                <li>
	                    <a class="nav-item-one" href="#" data-target="#content2">Text to speech</a>
	                </li>
		            </ul>
		          </li>
		          <li>
	              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Virtual Assistants</a>
	              <ul class="collapse list-unstyled" id="pageSubmenu">
	                <li>
	                     <a class="nav-item-one" href="#" data-target="#content3">Copilot</a>
	                </li>
	                <li>
	                     <a class="nav-item-one" href="#" data-target="#content4">Teams RAG App</a>
	                </li>
	                 <li>
	                     <a class="nav-item-one" href="#" data-target="#content5">Sharepoint RAG App</a>
	                </li>
	               
	              </ul>
		          </li>
		          <li>
	              <a href="#aiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">AI & ML</a>
	              <ul class="collapse list-unstyled" id="aiSubmenu">
	                <li>
	                	<a class="nav-item-one" href="#" data-target="#content6">Copilot</a>
	                </li>
	                <li>
	                   <a class="nav-item-one" href="#" data-target="#content7">RAG App</a>
	                </li>
	               
	              </ul>
		          </li>
		          <li>
	              <a href="#visionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Computer Vision</a>
	              <ul class="collapse list-unstyled" id="visionSubmenu">
	                <li>
	                	<a class="nav-item-one" href="#" data-target="#content8">Image Classification</a>
	                </li>
	                <li>
	                   <a class="nav-item-one" href="#" data-target="#content9">Object Detection</a>
	                </li>
	                 <li>
	                   <a class="nav-item-one" href="#" data-target="#content10">OCR</a>
	                </li>
	                 <li>
	                   <a class="nav-item-one" href="#" data-target="#content11">Facial Recognition</a>
	                </li>
	               
	              </ul>
		          </li>


		         <!--  
		          <li>
	              	<a href="#">Computer Vision</a>
		          </li> -->
		        </ul>

		      
		      </div>
	    	</nav>

	        <!-- Page Content  -->
	      <div id="content1" class="content-section" style="display: none; height: 100vh; width: 100vw;">
	      	<div class="p-4" style="background: #2f5597;">
			   	 		 <h6 class="text-right text-light"><i id="downloadTranscription"  class="fa fa-download ml-5"> Download </i><i class="fa fa-upload  ml-5"> Publish </i>
			   	 		  </h6> 
			   	 	</div>
			   	 	 	
			   <div class="row shadow  p-4">

			   	<div class="col-md-4" style="border-right:solid #2f5597 5px;">
			   		<h4>Transcription History </h4>
			   		<hr>
			   		<h5 class=" text-right text-primary" ><a href="#" id="addNewChats">New Chat <i class="fa fa-plus-square "></i></a></h5>
			   		<hr>
			   		<div style="height: 60vh; overflow-y: scroll;" id="transcribedContents"></div>
			   		
			   		
			   	</div>
			   	 <div class="col-md-8">

			   	 	 <!-- <h6 id="downloadTranscription" class="text-right"><i id="downloadTranscription"  class="fa fa-upload text-primary"> Download </i>  </h6> -->
			   	 	<div id="unhideContents" style="display: none;" class="form-group bg-white p-5">
			        <textarea style="height: 60vh !important;" class="form-control" id="transcription" rows="6" placeholder="Your transcribed text will appear here..."></textarea><br>
			        <hr>
			       <button id="startRec" class="btn btn-primary ">Start Transcription</button>
		        	<button id="stopRec" class="btn btn-danger ">Stop Transcription</button>
		        	<button id="resumeRec" class="btn btn-info ">Resume Transcription</button>
	     
			    </div>
			   	 </div>
			   </div>
	      </div>
	       <!-- Page Content2  -->
	      <div id="content2" class="content-section p-4 p-md-5 pt-5" style="display: none; height: 100vh; width: 100vw;">
	      	<div class="form-group shadow bg-white p-5">
	        <h2 id="title" class="mb-4 ">Text to Speech</h2>
	       <div>
		        <textarea style="height: 50vh !important;" class="form-control" id="textToSpeech" placeholder="Enter text to convert to speech..."></textarea>
		        <button class="btn btn-primary" id="speakText">Speak Text</button>
		        
		    </div>
			</div>
	      </div>
	        <!-- Page Content3  -->
	      <div id="content3" class="content-section p-4 p-md-5 pt-5" style="display: none; height: 100vh; width: 100vw;">

	        <h2 id="title" class="mb-4 ">Copilot</h2>
	        <p class="text-danger">Coming Soon...</p>
	      </div>
	       <!-- Page Content3  -->
	      <div id="content4" class="content-section p-4 p-md-5 pt-5" style="display: none; height: 100vh; width: 100vw;">

	        <h2 id="title" class="mb-4 ">Teams Rag App</h2>
	        <p class="text-danger">Coming Soon...</p>
	      </div>
	       <!-- Page Content3  -->
	      <div id="content5" class="content-section p-4 p-md-5 pt-5" style="display: none; height: 100vh; width: 100vw;">

	        <h2 id="title" class="mb-4 ">Sharepoint Rag App</h2>
	        <p class="text-danger">Coming Soon...</p>
	      </div>
	 <!-- Page Content3  -->
	      <div id="content6" class="content-section p-4 p-md-5 pt-5" style="display: none; height: 100vh; width: 100vw;">

	        <h2 id="title" class="mb-4 ">Copilot</h2>
	        <p class="text-danger">Coming Soon...</p>
	      </div>

		  <!-- Page Content3  -->
	      <div id="content7" class="content-section p-4 p-md-5 pt-5" style="display: none; height: 100vh; width: 100vw;">

	        <h2 id="title" class="mb-4 ">Rag App</h2>
	        <p class="text-danger">Coming Soon...</p>
	      </div>


		  <!-- Page Content3  -->
	      <div id="content8" class="content-section p-4 p-md-5 pt-5" style="display: none; height: 100vh; width: 100vw;">

	        <h2 id="title" class="mb-4 ">Image Classification</h2>
	        <!-- <h4>Micro-organisms Model</h4> -->
		    <p>This model has been trained with the following micro-organisms:</p>
		    <ul>
		        <li>Amoeba</li>
		        <li>Euglena</li>
		        <li>Hydra</li>
		        <li>Paramecium</li>
		        <li>Spherical bacteria</li>
		        <li>Rod bacteria</li>
		        <li>Spiral bacteria</li>
		        <li>Yeast</li>
		    </ul>
	       
	        <!-- Image URL form -->
		    <div>
		    	<select id="option-choice" class="form-control col-md-4">
		    		<option selected disabled>Upload/paste Url</option>
		    		<option value="1">Url</option>
		    		<option value="2">Upload</option>

		    	</select>


		        <!-- <h3>Classify using an Image URL</h3> -->
		       
		    </div><br><br>

		    <!-- File upload form -->
		    <div id="urlOption" style="display: none;">
		    	 <input class="form-control col-md-4" type="text" id="imageUrl" placeholder="Enter image URL"><br>
		        <button class="btn btn-primary" onclick="predictFromUrl()">Submit</button>
		    </div>
		    <div id="uploadOptions" style="display: none;">
		  
		        <input class="form-control col-md-4" type="file" id="imageFile"><br>
		        <button class="btn btn-primary" onclick="predictFromFile()">Upload</button>
		    </div>

		   
		    <div class="row">
		    	<div class="col">
		    		 <div id="result"></div>
		    	</div>
		    	<div class="col">
		    		<div id="imagePreview"></div>
		    	</div>
		    </div>









	      </div>


		  <!-- Page Content3  -->
	      <div id="content9" class="content-section p-4 p-md-5 pt-5" style="display: none; height: 100vh; width: 100vw;">

	        <h2 id="title" class="mb-4 ">Object Detection</h2>
	        <p class="text-danger">Coming Soon...</p>
	      </div>


		  <!-- Page Content3  -->
	      <div id="content10" class="content-section p-4 p-md-5 pt-5" style="display: none; height: 100vh; width: 100vw;">

	        <h2 id="title" class="mb-4 ">OCR</h2>
	        <p class="text-danger">Facial Recognition</p>
	      </div>

		  <!-- Page Content3  -->
	      <div id="content11" class="content-section p-4 p-md-5 pt-5" style="display: none; height: 100vh; width: 100vw;">

	        <h2 id="title" class="mb-4 ">Rag App</h2>
	        <p class="text-danger">Coming Soon...</p>
	      </div>

			</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    	<script src="https://cdn.jsdelivr.net/npm/microsoft-cognitiveservices-speech-sdk@1.21.0/distrib/browser/microsoft.cognitiveservices.speech.sdk.bundle.js"></script>
	   
	    <script src="js/popper.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/main.js"></script>
	    <script src="js/paging.js"></script>
	    <script type="text/javascript">
	    	const predictionUrl = "https://democustomimage-prediction.cognitiveservices.azure.com/customvision/v3.0/Prediction/18f9801b-0418-4955-bb6a-a063f40e6e0c/classify/iterations/micro%20organisms%20model/";
				const predictionKey = "2528943c9d204dc6b375cd851ae730c1";

				async function predictFromUrl() {
				    const url = document.getElementById('imageUrl').value;
				    previewImage(url); // Preview the image from URL
				    const response = await fetch(predictionUrl + 'url', {
				        method: 'POST',
				        headers: {
				            'Prediction-Key': predictionKey,
				            'Content-Type': 'application/json'
				        },
				        body: JSON.stringify({ Url: url })
				    });
				    const result = await response.json();
				    displayPlainResult(result);
				}

				async function predictFromFile() {
				    const fileInput = document.getElementById('imageFile');
				    const file = fileInput.files[0];
				    const reader = new FileReader();
				    
				    reader.onload = function (e) {
				        previewImage(e.target.result); // Preview the uploaded image
				    };
				    reader.readAsDataURL(file);

				    const formData = new FormData();
				    formData.append('image', file);

				    const response = await fetch(predictionUrl + 'image', {
				        method: 'POST',
				        headers: {
				            'Prediction-Key': predictionKey
				        },
				        body: file
				    });
				    const result = await response.json();
				    displayPlainResult(result);
				}

				function displayPlainResult(result) {
				    const resultDiv = document.getElementById('result');
				    const predictions = result.predictions;
				    
				    let output = '<h3>Prediction Results:</h3>';
				    predictions.forEach(prediction => {
				        output += `<p><strong>${prediction.tagName}</strong>: ${Math.round(prediction.probability * 100)}% confidence</p>`;
				    });
				    
				    resultDiv.innerHTML = output;
				}

				function previewImage(imageSrc) {
				    const previewDiv = document.getElementById('imagePreview');
				    previewDiv.innerHTML = `<img src="${imageSrc}" alt="Image Preview" style="max-width: 100%; height: auto;" />`;
				}

				$("#option-choice").change(() => {
				    if ($("#option-choice").val() == 1) {
				        $("#uploadOptions").css("display", "none");
				        $("#urlOption").css("display", "block");
				    } else if ($("#option-choice").val() == 2) {
				        $("#uploadOptions").css("display", "block");
				        $("#urlOption").css("display", "none");
				    }
				});




	    </script>
	  </body>
	</html>