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


$(document).ready(function() {
    const speechKey = "adff6f8e12d24ecf8f12cacb35b9ed12";
    const serviceRegion = "eastus"; // For example, "eastus"

    let recognizer;
    let transcription = "";

    // Initialize Speech-to-Text Recognizer
    function initSpeechRecognizer() {
        const speechConfig = SpeechSDK.SpeechConfig.fromSubscription(speechKey, serviceRegion);
        const audioConfig = SpeechSDK.AudioConfig.fromDefaultMicrophoneInput();
        recognizer = new SpeechSDK.SpeechRecognizer(speechConfig, audioConfig);

        recognizer.recognizing = (s, e) => {
            $('#transcription').val(transcription + e.result.text);

        };

        recognizer.recognized = (s, e) => {
            if (e.result.reason === SpeechSDK.ResultReason.RecognizedSpeech) {
                transcription += e.result.text + " ";
                $('#transcription').val(transcription);
                 var fd = new FormData();
                fd.append('transcription',(transcription));
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
            }
        };
    }

    // Start Recording
    $('#startRec').on('click', function() {
        initSpeechRecognizer();
        recognizer.startContinuousRecognitionAsync();
        $('#startRec').prop('disabled', true);
        $('#stopRec').prop('disabled', false);
        $('#resumeRec').prop('disabled', true);



    });

    // Stop Recording
    $('#stopRec').on('click', function() {
        recognizer.stopContinuousRecognitionAsync();
        $('#startRec').prop('disabled', true);
        $('#stopRec').prop('disabled', true);
        $('#resumeRec').prop('disabled', false);
    });

    // Resume Recording
    $('#resumeRec').on('click', function() {
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

});