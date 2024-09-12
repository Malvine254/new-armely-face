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
        displayAllHistory();
        // Retrieve the existing content from the textarea
        let current_content = $('#temporaryStore').text();
        //console.log(current_content)
        // Append the newly transcribed text to the existing content
        $('#transcription').val(current_content+" "+e.result.text);
        //console.log(current_content + e.result.text);
    };

    recognizer.recognized = (s, e) => {
        displayAllHistory();
        if (e.result.reason === SpeechSDK.ResultReason.RecognizedSpeech) {
            transcription += e.result.text + " ";
            let current_content = $('#temporaryStore').text();
            // Get the current textarea value (including newly appended content)
            // let text = $('#transcription').val();
            var fd = new FormData();
            fd.append('transcription', (transcription));
            $("#transcribedContents").html(current_content+" "+ transcription);
            displayAllHistory();
            // Send the transcription data to the server
            $.ajax({
                url: 'php/actions', // Replace with your backend URL
                type: 'POST',
                processData: false, // Prevent jQuery from automatically processing data
                contentType: false,
                data: fd,
                success: function(response) {
                 
                    
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
     transcription = "";
    displayAllHistory();
    initSpeechRecognizer();
    recognizer.startContinuousRecognitionAsync();
    $('#startRec').prop('disabled', true);
    $('#stopRec').prop('disabled', false);
    $('#resumeRec').prop('disabled', true);
});

// Stop Recording
$('#stopRec').on('click', function() {
    displayAllHistory();
    recognizer.stopContinuousRecognitionAsync();
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
            }
            synthesizer.close();
        },
        error => {
            console.error(error);
            synthesizer.close();
        }
    );
});

// Add new chat button
$("#addNewChats").click((e) => {
     transcription = "";
    displayAllHistory();
    $("#unhideContents").css("display", "block");
    $("#transcription").val("");
    e.preventDefault();
    var fd = new FormData();
    fd.append('new_chat_set', "true");

    $.ajax({
        url: 'php/actions', // Replace with your backend URL
        type: 'POST',
        processData: false,
        contentType: false,
        data: fd,
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error('Error saving transcription:', error);
        }
    });
});

// Display all the details for conversation history
function displayAllHistory() {
    var setIt = new FormData();
    setIt.append('diaplay_all_history', "true");
    $.ajax({
        url: 'php/actions', // Replace with your backend URL
        type: 'POST',
        processData: false,
        contentType: false,
        data: setIt,
        success: function(response) {
            $("#transcribedContents").html(response);
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
    $("#unhideContents").css("display", "block");
    id = $(this).attr('id');
    $("#transcription").val($("#text-" + id).text());
    $("#temporaryStore").html($("#text-" + id).text());
    var setIt = new FormData();
    setIt.append('old_session_id', id);
    $.ajax({
        url: 'php/actions', // Replace with your backend URL
        type: 'POST',
        processData: false,
        contentType: false,
        data: setIt,
        success: function(response) {
            // Handle response if needed
        },
        error: function(error) {
            console.error('Error saving transcription:', error);
        }
    });
    $('#stopRec').click();
    $('#startRec').prop('disabled', false);
    $('#stopRec').prop('disabled', true);
    $('#resumeRec').prop('disabled', true);
});



