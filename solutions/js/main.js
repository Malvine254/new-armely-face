(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

})(jQuery);

    const speechKey = "adff6f8e12d24ecf8f12cacb35b9ed12";
    const serviceRegion = "eastus"; // For example, "eastus"

    var recognizer;
    var transcription = "";

    // Initialize Speech-to-Text Recognizer
    function initSpeechRecognizer() {
        const speechConfig = SpeechSDK.SpeechConfig.fromSubscription(speechKey, serviceRegion);
        const audioConfig = SpeechSDK.AudioConfig.fromDefaultMicrophoneInput();
        recognizer = new SpeechSDK.SpeechRecognizer(speechConfig, audioConfig);

        recognizer.recognizing = (s, e) => {
            current_content =  $('#transcription').val();
            $('#transcription').val(current_content + transcription + e.result.text);

        };

        recognizer.recognized = (s, e) => {
            if (e.result.reason === SpeechSDK.ResultReason.RecognizedSpeech) {
                transcription += e.result.text + " ";
                $('#transcription').val(current_content+" "+transcription);
                 current_content =  $('#transcription').val();
                 var fd = new FormData();
                fd.append('transcription',(current_content));
                displayAllHistory();
                //console.log(transcription)

                $.ajax({
                        url: 'php/actions', // Replace with your backend URL
                        type: 'POST',
                        processData: false, // Prevent jQuery from automatically processing data
                        contentType: false,
                        data: fd,
                        success: function(response) {
                            //$("#transcribedContents").html(response)
                           console.log(response);
                        },
                        error: function(error) {
                            console.error('Error saving transcription:', error);
                        }
                    });
            }
        };
    }

    // Start Recording
    $('#startRec').on('click', function() {
         displayAllHistory();
        initSpeechRecognizer();
        recognizer.startContinuousRecognitionAsync();
        $('#startRec').prop('disabled', true);
        $('#stopRec').prop('disabled', false);
        $('#resumeRec').prop('disabled', true);



    });

    // Stop Recording
    $('#stopRec').on('click', function() {
        recognizer.stopContinuousRecognitionAsync();
         displayAllHistory();
        $('#startRec').prop('disabled', true);
        $('#stopRec').prop('disabled', true);
        $('#resumeRec').prop('disabled', false);
    });

    // Resume Recording
    $('#resumeRec').on('click', function() {
         displayAllHistory();
        recognizer.startContinuousRecognitionAsync();
        $('#startRec').prop('disabled', true);
        $('#stopRec').prop('disabled', false);
        $('#resumeRec').prop('disabled', true);
    });

    

    // Download the transcription as a .txt file
    $('#downloadTranscription').on('click', function() {
    	$('#startRec').prop('disabled', false);
        $('#stopRec').prop('disabled', true);
        $('#resumeRec').prop('disabled', true);
        const blob = new Blob([transcription], { type: 'text/plain' });
        const link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'transcription.txt';
        link.click();
    });

    // Text-to-Speech Functionality
    $('#speakText').on('click', function() {
         displayAllHistory();
        const textToSynthesize = $('#textToSpeech').val();
        if (!textToSynthesize) {
            alert("Please enter text to convert to speech");
            return;
        }

        const speechConfig = SpeechSDK.SpeechConfig.fromSubscription(speechKey, serviceRegion);
        const audioConfig = SpeechSDK.AudioConfig.fromDefaultSpeakerOutput();
        const synthesizer = new SpeechSDK.SpeechSynthesizer(speechConfig, audioConfig);

        synthesizer.speakTextAsync(textToSynthesize,
            result => {
                if (result.reason === SpeechSDK.ResultReason.SynthesizingAudioCompleted) {
                    console.log("Speech synthesis succeeded.");
                    //$('#speakText').prop('disabled', true);

                }
                synthesizer.close();
            },
            error => {
                console.error(error);
                synthesizer.close();
            });
    });




// add new chat button

$("#addNewChats").click((e)=>{
     $("#unhideContents").css("display","block");
    displayAllHistory();
    transcription = "";
    $("#transcription").val("");
    e.preventDefault();
    var fd = new FormData();
    fd.append('new_chat_set',"true");
    //console.log(transcription)

    $.ajax({
            url: 'php/actions', // Replace with your backend URL
            type: 'POST',
            processData: false, // Prevent jQuery from automatically processing data
            contentType: false,
            data: fd,
            success: function(response) {
               console.log(response);
            },
            error: function(error) {
                console.error('Error saving transcription:', error);
            }
        });

})

//display all the details for converstion history

function displayAllHistory(){
    transcription = "";
    var setIt = new FormData();
    setIt.append('diaplay_all_history',"true");
    $.ajax({
        url: 'php/actions', // Replace with your backend URL
        type: 'POST',
        processData: false, // Prevent jQuery from automatically processing data
        contentType: false,
        data: setIt,
        success: function(response) {
            $("#transcribedContents").html(response)
        },
        error: function(error) {
            console.error('Error saving transcription:', error);
        }
});
}
displayAllHistory();


// Use event delegation to handle dynamically loaded content
$(document).on('click', '.clickedFullInfo', function(e) {
    e.preventDefault();
    transcription = "";
     $("#unhideContents").css("display","block");
    //recognizer.stopContinuousRecognitionAsync();
    id = $(this).attr('id');
    var setIt = new FormData();
    setIt.append('old_session_id',id);
    $.ajax({
        url: 'php/actions', // Replace with your backend URL
        type: 'POST',
        processData: false, // Prevent jQuery from automatically processing data
        contentType: false,
        data: setIt,
        success: function(response) {
           //alert(response) 
        },
        error: function(error) {
            console.error('Error saving transcription:', error);
        }
});
    $('#stopRec').click();
    $("#transcription").val($("#text-"+id).text())
    $('#startRec').prop('disabled', false);
    $('#stopRec').prop('disabled', true);
    $('#resumeRec').prop('disabled', true);

});


