<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loading...</title>
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #000;
            cursor: pointer;
        }
        #container {
            text-align: center;
            position: relative;
        }
        #videoPlayer {
            width: 560px;
            height: 315px;
            opacity: 0;
            transition: opacity 0.5s;
        }
        #clickPrompt {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 24px;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px 40px;
            border-radius: 10px;
            border: 2px solid white;
        }
        #skipButton {
            display: none;
            padding: 10px 20px;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            background: #ff4444;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .hidden {
            display: none !important;
        }
    </style>
</head>
<body>
    <div id="container">
        <video id="videoPlayer" playsinline preload="auto">
            <source src="vedio/download.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div id="clickPrompt">Click to Continue...</div>
        <button id="skipButton">Skip</button>
    </div>

    <script>
        const video = document.getElementById('videoPlayer');
        const clickPrompt = document.getElementById('clickPrompt');
        const container = document.getElementById('container');
        
        // Set initial video properties
        video.defaultMuted = true;
        video.muted = true;
        video.currentTime = 3;
        
        // Start playing muted initially
        video.play();

        // Handle the click to start with sound
        function startWithSound() {
            video.muted = false;
            video.currentTime = 3;
            video.play();
            video.style.opacity = '1';
            clickPrompt.classList.add('hidden');
            
            // Remove the click event listeners
            document.body.removeEventListener('click', startWithSound);
            container.removeEventListener('click', startWithSound);
        }

        // Add click listeners
        document.body.addEventListener('click', startWithSound);
        container.addEventListener('click', startWithSound);

        // Show skip button after 15 seconds
        setTimeout(() => {
            document.getElementById('skipButton').style.display = 'block';
        }, 15000);

        // Redirect after 25 seconds
        setTimeout(() => {
            window.location.href = 'home.php';
        }, 25000);

        // Skip button handler
        document.getElementById('skipButton').addEventListener('click', (e) => {
            e.stopPropagation();  // Prevent triggering the main click handler
            window.location.href = 'home.php';
        });
    </script>
</body>
</html>