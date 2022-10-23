<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video Conference</title>
  </head>
  <body>
    <script>
      var script = document.createElement("script");
      script.type = "text/javascript";

      script.addEventListener("load", function (event) {
        const config = {
          name: "User",
          meetingId: "doctor-connect",
          apiKey: "b0b1393d-0af2-4655-baf2-2f13a670d5c2",

          containerId: null,

          micEnabled: true,
          webcamEnabled: true,
          participantCanToggleSelfWebcam: true,
          participantCanToggleSelfMic: true,

          chatEnabled: true,
          screenShareEnabled: true,

          

          /*
      
           Other Feature Properties
           
            
            */
  

            // --------------------------------------
            permissions: {
              askToJoin: false, // Ask joined participants for entry in meeting
              toggleParticipantMic: false, // Can toggle other participant's mic
              toggleParticipantWebcam: false, // Can toggle other participant's webcam
              toggleParticipantScreenshare: false, // Can toggle other partcipant's screen share
              drawOnWhiteboard: true, // Can draw on whiteboard
              toggleWhiteboard: true, // Can toggle whiteboard
              toggleRecording: true, // Can toggle meeting recording
              removeParticipant: true, // Can remove participant
              endMeeting: true, // Can end meeting
            },
      
            joinScreen: {
              visible: true, // Show the join screen ?
              title: "Doctor Patient Video call.", // Meeting title
              meetingUrl: window.location.href, // Meeting joining url
            },
      
            pin: {
              allowed: true, // participant can pin any participant in meeting
              layout: "SPOTLIGHT", // meeting layout - GRID | SPOTLIGHT | SIDEBAR
            },
      
            leftScreen: {
              // visible when redirect on leave not provieded
              actionButton: {
                // optional action button
                label: "Video SDK Live", // action button label
                href: "https://videosdk.live/", // action button href
              },
            },
      
      
        };

        const meeting = new VideoSDKMeeting();
        meeting.init(config);
      });

      script.src ="https://sdk.videosdk.live/rtc-js-prebuilt/0.3.17/rtc-js-prebuilt.js";
      document.getElementsByTagName("head")[0].appendChild(script);
    </script>
  </body>
</html>
