<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hooks and Highs</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="output.css" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
    </head>
    <body class="bg-gradient-to-br from-black to-deeper-purple bg-no-repeat h-100 min-h-screen text-white bg-fixed custom-scrollbar">
    <!--<body class="purple-gradient h-100 min-h-screen text-white background-fixed">-->
        <div class="nav-wrap relative container min-w-full flex flex-wrap p-5 max-md:gap-5 flex-col md:flex-row max-md:content-center place-content-between items-center fixed top-0 z-20 backdrop-blur-md w-screen border-b border-barely-purple-dark shadow-xl">
            <nav class="links-internal flex-1 flex flex-wrap justify-start place-content-between text-base mr-auto max-md:justify-center font-extralight">
                <a href="#episodes" class="mr-6 relative">
                    Episodes
                </a>
                <a href="#about" class="mr-6 max-md:ml-0 relative">
                    About
                </a>
                <a href="#contact" class="mr-6 max-md:mr-0 relative">
                    Contact
                </a>
            </nav>
            <a href="#" class="hidden md:flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0 mx-12">
                <img src="img/hooks-and-highs-logo-no-outline.png" id="logo" class="logo" alt="">
            </a>
            <nav class="links-external flex-1 flex flex-row sm:justify-end justify-center md:ml-auto">
                <a href="https://www.instagram.com/hooksandhighs/" class="mx-2">
                    <svg viewBox="23 23 64 64" class="w-6 fill-barely-purple-light hover:fill-white">
                        <use xlink:href="#instagram-unauth-icon" width="110" height="110"></use>
                    </svg>
                </a>
                <a href="https://open.spotify.com/show/31sqG8zp1gGz4JlXx6ipXa" class="mx-2">
                    <svg viewBox="23 23 64 64" class="w-6 fill-barely-purple-light hover:fill-white">
                        <use xlink:href="#spotify-unauth-icon" width="110" height="110"></use>
                    </svg>
                </a>
                <a href="https://podcasts.google.com/feed/aHR0cHM6Ly93d3cuaG9va3NhbmRoaWdocy5jb20vZXBpc29kZXM_Zm9ybWF0PXJzcw" class="mx-2">
                    <svg viewBox="23 23 64 64" class="w-6 fill-barely-purple-light hover:fill-white">
                        <use xlink:href="#applepodcast-icon" width="110" height="110"></use>
                    </svg>
                </a>
            </nav>
        </div>
        <!-- END navigation  -->

        <!-- START CONTENT  -->
        <div class="content-wrap ml-6 flex flex-col min-h-70vh items-start sm:items-center gap-72 custom-scrollbar custom-full-height pr-4 mr-0 mt-0">
            <div class="section-recent w-full flex flex-col min-h-84vh md:flex-row md:items-center" id="episodes">
                <div class="break-after-column md:flex-1" id="animated-logo-wrap">
                    <img src="img/hooksandhighs-logo.gif" id="animated-logo" class="w-full" alt="">
                </div>
                <div class="flex-1"> 
                    <h2 class="text-3xl font-extralight">
                        Episodes
                    </h2>
                    <div class="mt-6 sm:mt-6 relative z-10 rounded-xl shadow-xl border border-barely-purple-dark" id="player">
                        <div
                            class="bg-transparent border-barely-purple-dark transition-all duration-500 dark:border-barely-purple-dark border-b rounded-t-xl p-4 pb-6 sm:p-10 sm:pb-8 lg:p-6 xl:p-10 xl:pb-8 space-y-6 sm:space-y-8 lg:space-y-6 xl:space-y-8">
                            <div class="flex items-center space-x-4">
                                <img src="img/hooks-and-highs-logo-square.jpg" loading="lazy" decoding="async" alt="" id="episode-cover" class="flex-none rounded-lg bg-slate-100" width="88" height="88">
                                <div class="min-w-0 flex-auto space-y-1 font-semibold">
                                    <p class="text-cyan-500 transition-all duration-500 dark:text-cyan-400 text-sm leading-6">
                                    Episode <span id="episode-number">1</span>
                                    </p>
                                    <!-- <h2 class="text-slate-500 transition-all duration-500 dark:text-slate-400 text-sm leading-6 truncate">
                                        Fuck Putin
                                        </h2> --> 
                                        <p class="episode-title text-slate-900 transition-all duration-500 dark:text-slate-50 text-lg">
                                        Hooks and Highs - Fuck Putin
                                        </p>
                                </div>
                            </div>
                            <div class="border-barely-purple-dark transition-all duration-500 bg-transparent dark:border-barely-purple-dark border-b space-y-6 sm:space-y-8 lg:space-y-6 xl:space-y-8">
                                <div class="playlist flex flex-col gap-4 mb-4 overflow-y-scroll h-56 custom-scrollbar pr-4">
                            <?php
                            // Define your API key here
                            define("API_KEY", "USR-f2d25347a1445d35430201fb41c1a5645deeabfe");

                            // Define the API URL
                            $url = "https://admin.hooksandhighs.com/api/content/items/episodes";

                            // Initialize the curl
                            $ch = curl_init();

                            // Set the options
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . API_KEY)); // Adjust this according to the API documentation

                            // Execute the curl and get the response
                            $response = curl_exec($ch);

                            // Close the curl
                            curl_close($ch);

                            // Convert the response into an array
                            $data = json_decode($response, true);

                            // Initialize the counter
                            $episodeIndex = 0;

                            // Loop through the data to generate the HTML
                            foreach($data as $item){
                                echo '<button
                                    aria-episode-index="' . $episodeIndex . '"
                                    aria-current="false"
                                    aria-release-datetime="' . htmlspecialchars($item['releasedate']) . '"
                                    aria-id="' . htmlspecialchars($item['_id']) . '"
                                    aria-duration=""  // This value is missing from the provided data
                                    aria-description="' . htmlspecialchars($item['description']) . '"
                                    aria-file-url="' . htmlspecialchars($item['audio']['path']) . '"
                                    type="button"
                                    class="playlist-item border border-barely-purple-dark/[0.3] mt-px block w-full cursor-pointer rounded-lg p-4 text-left transition duration-500 hover:border-barely-purple-dark hover:text-neutral-500 focus:bg-neutral-100 focus:text-neutral-500 focus:ring-0 dark:hover:bg-neutral-600 dark:hover:text-neutral-200 dark:focus:bg-neutral-600 dark:focus:text-neutral-200">
                                        ' . htmlspecialchars($item['title']) . '
                                        </button>';
                                    // Increment the counter for the next iteration
                                    $episodeIndex++;
                            }
                            ?>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div class="relative">
                                    <div class="progressbar-wrap bg-barely-purple transition-all duration-500 dark:bg-slate-700 rounded-full overflow-hidden">
                                        <div class="progressbar bg-white transition-all duration-500 dark:bg-cyan-400 w-1/2 h-2" role="progressbar"
                                            aria-label="music progress" aria-valuenow="1456" aria-valuemin="0" aria-valuemax="4550"></div>
                                    </div>
                                    <div
                                        class="progressbar-button ring-barely-purple-light transition-all duration-500 dark:ring-cyan-400 ring-2 absolute left-1/2 top-1/2 w-4 h-4 -mt-2 -ml-2 flex items-center justify-center bg-white rounded-full shadow">
                                        <div
                                            class="w-1.5 h-1.5 bg-cyan-500 transition-all duration-500 dark:bg-cyan-400 rounded-full ring-1 ring-inset ring-barely-purple-light">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between text-sm leading-6 font-medium tabular-nums">
                                    <div class="episode-current-time text-cyan-500 transition-all duration-500 dark:text-slate-100">00:00</div>
                                    <div class="episode-duration text-slate-500 transition-all duration-500 dark:text-slate-400">--:--:--</div>
                                </div>
                            </div>
                            <audio controls class="hidden" id="audio">
                                <source src="" type="audio/mpeg">
                                    Your browser does not support the audio tag.
                            </audio>
                        </div>
                        <div
                            class="bg-slate-50 text-slate-500 transition-all duration-500 dark:bg-slate-600 transition-all duration-500 dark:text-slate-200 rounded-b-xl flex items-center">
                            <div class="flex-auto flex items-center justify-evenly">
                                <button type="button" aria-label="Previous">
                                    <svg width="24" height="24" fill="none">
                                        <path d="m10 12 8-6v12l-8-6Z" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M6 6v12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                                <button type="button" aria-label="Rewind 10 seconds">
                                    <svg width="24" height="24" fill="none">
                                        <path d="M6.492 16.95c2.861 2.733 7.5 2.733 10.362 0 2.861-2.734 2.861-7.166 0-9.9-2.862-2.733-7.501-2.733-10.362 0A7.096 7.096 0 0 0 5.5 8.226" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5 5v3.111c0 .491.398.889.889.889H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                            <button type="button" class="bg-barely-purple-dark text-slate-900 transition-all duration-500 dark:bg-slate-100 transition-all duration-500 dark:text-slate-700 flex-none -my-2 mx-auto w-20 h-20 rounded-full ring-1 ring-barely-purple shadow-md flex items-center justify-center" aria-label="Pause">
                                <svg width="30" height="32" fill="currentColor" class="play-button-icon-pause hidden">
                                    <rect x="6" y="4" width="4" height="24" rx="2"></rect>
                                    <rect x="20" y="4" width="4" height="24" rx="2"></rect>
                                </svg>
                                <svg width="35" height="35" fill="currentColor" class="play-button-icon-play" style="margin-left:5px;" viewBox="0 0 16 16">
                                    <path d="M2 2 14 8 2 14Z" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>

                            </button>
                            <div class="flex-auto flex items-center justify-evenly">
                                <button type="button" aria-label="Skip 10 seconds" class="">
                                    <svg width="24" height="24" fill="none">
                                        <path d="M17.509 16.95c-2.862 2.733-7.501 2.733-10.363 0-2.861-2.734-2.861-7.166 0-9.9 2.862-2.733 7.501-2.733 10.363 0 .38.365.711.759.991 1.176" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M19 5v3.111c0 .491-.398.889-.889.889H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                                <button type="button" aria-label="Next">
                                    <svg width="24" height="24" fill="none">
                                        <path d="M14 12 6 6v12l8-6Z" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M18 6v12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex section-about flex-row sm:flex-col w-100 md:w-6/12 min-h-84vh justify-center items-center relative self-end" id="about">
                <div class="three-d-model absolute -left-[95%]">
                    <model-viewer id="mic" style="width: 42vw; height: 90vh;" loading="eager" camera-orbit="calc(30deg - env(window-scroll-y) * 60deg) 75deg 7m" src="3d/microphone.glb" shadow-intensity="1" alt="A 3D model of a microphone">
                    </model-viewer>
                </div>
                <div class="border transition-shadow border-barely-purple-dark rounded-xl shadow-xl hover:shadow-md p-6">
                    <h2 class="text-3xl font-extralight mb-4">
                        About us
                    </h2>
                    <p class="text-xl font-extralight mb-3 leading-8">
                        Hooks and Highs is about two men with white belt levels of expertise reaching black belt levels of shit-talking. All the while trying to make sense of the world, the music industry and mixed martial arts.
                    </p>
                    <p class="text-xl font-extralight leading-8">
                        In the contemporary ocean of available podcasts one thing is direly missing – the voice of insanity. Who really talks for the confused, drunk and poorly educated? – I guess it’s us then.
                    </p>
                </div>
            </div>
            <div class="flex section-contact flex-col w-100 md:w-6/12 min-h-84vh justify-center" id="contact">
                <div class="border transition-shadow border-barely-purple-dark rounded-xl shadow-xl hover:shadow-md p-6">
                    <h2 class="text-3xl font-extralight mb-4">
                        Contact us
                    </h2>
                    <p class="text-xl font-extralight mb-3 leading-8">
                        Get in touch for press, licensing or booking enquiries.
                    </p>
                    <p class="text-xl font-extralight leading-8">
                    Email: <a href="mailto:high@hooksandhighs.com">high@hooksandhighs.com</a>
                    </p>
                </div>
            </div>
        <footer class="border-t border-barely-purple text-l font-extralight mb-3 pt-3 w-full text-center">
            Hooks & Highs &nbsp; | &nbsp; <a href="/impressum">Impressum</a>
        </footer>
        </div>
        <!-- END CONTENT  -->



        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display:none" data-usage="social-icons-svg"><symbol id="instagram-unauth-icon" viewBox="0 0 64 64"><path d="M46.91,25.816c-0.073-1.597-0.326-2.687-0.697-3.641c-0.383-0.986-0.896-1.823-1.73-2.657c-0.834-0.834-1.67-1.347-2.657-1.73c-0.954-0.371-2.045-0.624-3.641-0.697C36.585,17.017,36.074,17,32,17s-4.585,0.017-6.184,0.09c-1.597,0.073-2.687,0.326-3.641,0.697c-0.986,0.383-1.823,0.896-2.657,1.73c-0.834,0.834-1.347,1.67-1.73,2.657c-0.371,0.954-0.624,2.045-0.697,3.641C17.017,27.415,17,27.926,17,32c0,4.074,0.017,4.585,0.09,6.184c0.073,1.597,0.326,2.687,0.697,3.641c0.383,0.986,0.896,1.823,1.73,2.657c0.834,0.834,1.67,1.347,2.657,1.73c0.954,0.371,2.045,0.624,3.641,0.697C27.415,46.983,27.926,47,32,47s4.585-0.017,6.184-0.09c1.597-0.073,2.687-0.326,3.641-0.697c0.986-0.383,1.823-0.896,2.657-1.73c0.834-0.834,1.347-1.67,1.73-2.657c0.371-0.954,0.624-2.045,0.697-3.641C46.983,36.585,47,36.074,47,32S46.983,27.415,46.91,25.816z M44.21,38.061c-0.067,1.462-0.311,2.257-0.516,2.785c-0.272,0.7-0.597,1.2-1.122,1.725c-0.525,0.525-1.025,0.85-1.725,1.122c-0.529,0.205-1.323,0.45-2.785,0.516c-1.581,0.072-2.056,0.087-6.061,0.087s-4.48-0.015-6.061-0.087c-1.462-0.067-2.257-0.311-2.785-0.516c-0.7-0.272-1.2-0.597-1.725-1.122c-0.525-0.525-0.85-1.025-1.122-1.725c-0.205-0.529-0.45-1.323-0.516-2.785c-0.072-1.582-0.087-2.056-0.087-6.061s0.015-4.48,0.087-6.061c0.067-1.462,0.311-2.257,0.516-2.785c0.272-0.7,0.597-1.2,1.122-1.725c0.525-0.525,1.025-0.85,1.725-1.122c0.529-0.205,1.323-0.45,2.785-0.516c1.582-0.072,2.056-0.087,6.061-0.087s4.48,0.015,6.061,0.087c1.462,0.067,2.257,0.311,2.785,0.516c0.7,0.272,1.2,0.597,1.725,1.122c0.525,0.525,0.85,1.025,1.122,1.725c0.205,0.529,0.45,1.323,0.516,2.785c0.072,1.582,0.087,2.056,0.087,6.061S44.282,36.48,44.21,38.061z M32,24.297c-4.254,0-7.703,3.449-7.703,7.703c0,4.254,3.449,7.703,7.703,7.703c4.254,0,7.703-3.449,7.703-7.703C39.703,27.746,36.254,24.297,32,24.297z M32,37c-2.761,0-5-2.239-5-5c0-2.761,2.239-5,5-5s5,2.239,5,5C37,34.761,34.761,37,32,37z M40.007,22.193c-0.994,0-1.8,0.806-1.8,1.8c0,0.994,0.806,1.8,1.8,1.8c0.994,0,1.8-0.806,1.8-1.8C41.807,22.999,41.001,22.193,40.007,22.193z"></path></symbol><symbol id="instagram-unauth-mask" viewBox="0 0 64 64"><path d="M43.693,23.153c-0.272-0.7-0.597-1.2-1.122-1.725c-0.525-0.525-1.025-0.85-1.725-1.122c-0.529-0.205-1.323-0.45-2.785-0.517c-1.582-0.072-2.056-0.087-6.061-0.087s-4.48,0.015-6.061,0.087c-1.462,0.067-2.257,0.311-2.785,0.517c-0.7,0.272-1.2,0.597-1.725,1.122c-0.525,0.525-0.85,1.025-1.122,1.725c-0.205,0.529-0.45,1.323-0.516,2.785c-0.072,1.582-0.087,2.056-0.087,6.061s0.015,4.48,0.087,6.061c0.067,1.462,0.311,2.257,0.516,2.785c0.272,0.7,0.597,1.2,1.122,1.725s1.025,0.85,1.725,1.122c0.529,0.205,1.323,0.45,2.785,0.516c1.581,0.072,2.056,0.087,6.061,0.087s4.48-0.015,6.061-0.087c1.462-0.067,2.257-0.311,2.785-0.516c0.7-0.272,1.2-0.597,1.725-1.122s0.85-1.025,1.122-1.725c0.205-0.529,0.45-1.323,0.516-2.785c0.072-1.582,0.087-2.056,0.087-6.061s-0.015-4.48-0.087-6.061C44.143,24.476,43.899,23.682,43.693,23.153z M32,39.703c-4.254,0-7.703-3.449-7.703-7.703s3.449-7.703,7.703-7.703s7.703,3.449,7.703,7.703S36.254,39.703,32,39.703z M40.007,25.793c-0.994,0-1.8-0.806-1.8-1.8c0-0.994,0.806-1.8,1.8-1.8c0.994,0,1.8,0.806,1.8,1.8C41.807,24.987,41.001,25.793,40.007,25.793z M0,0v64h64V0H0z M46.91,38.184c-0.073,1.597-0.326,2.687-0.697,3.641c-0.383,0.986-0.896,1.823-1.73,2.657c-0.834,0.834-1.67,1.347-2.657,1.73c-0.954,0.371-2.044,0.624-3.641,0.697C36.585,46.983,36.074,47,32,47s-4.585-0.017-6.184-0.09c-1.597-0.073-2.687-0.326-3.641-0.697c-0.986-0.383-1.823-0.896-2.657-1.73c-0.834-0.834-1.347-1.67-1.73-2.657c-0.371-0.954-0.624-2.044-0.697-3.641C17.017,36.585,17,36.074,17,32c0-4.074,0.017-4.585,0.09-6.185c0.073-1.597,0.326-2.687,0.697-3.641c0.383-0.986,0.896-1.823,1.73-2.657c0.834-0.834,1.67-1.347,2.657-1.73c0.954-0.371,2.045-0.624,3.641-0.697C27.415,17.017,27.926,17,32,17s4.585,0.017,6.184,0.09c1.597,0.073,2.687,0.326,3.641,0.697c0.986,0.383,1.823,0.896,2.657,1.73c0.834,0.834,1.347,1.67,1.73,2.657c0.371,0.954,0.624,2.044,0.697,3.641C46.983,27.415,47,27.926,47,32C47,36.074,46.983,36.585,46.91,38.184z M32,27c-2.761,0-5,2.239-5,5s2.239,5,5,5s5-2.239,5-5S34.761,27,32,27z"></path></symbol><symbol id="spotify-unauth-icon" viewBox="0 0 64 64"><path d="M32,16c-8.8,0-16,7.2-16,16c0,8.8,7.2,16,16,16c8.8,0,16-7.2,16-16C48,23.2,40.8,16,32,16 M39.3,39.1c-0.3,0.5-0.9,0.6-1.4,0.3c-3.8-2.3-8.5-2.8-14.1-1.5c-0.5,0.1-1.1-0.2-1.2-0.7c-0.1-0.5,0.2-1.1,0.8-1.2 c6.1-1.4,11.3-0.8,15.5,1.8C39.5,38,39.6,38.6,39.3,39.1 M41.3,34.7c-0.4,0.6-1.1,0.8-1.7,0.4c-4.3-2.6-10.9-3.4-15.9-1.9 c-0.7,0.2-1.4-0.2-1.6-0.8c-0.2-0.7,0.2-1.4,0.8-1.6c5.8-1.8,13-0.9,18,2.1C41.5,33.4,41.7,34.1,41.3,34.7 M41.5,30.2 c-5.2-3.1-13.7-3.3-18.6-1.9c-0.8,0.2-1.6-0.2-1.9-1c-0.2-0.8,0.2-1.6,1-1.9c5.7-1.7,15-1.4,21,2.1c0.7,0.4,0.9,1.3,0.5,2.1 C43.1,30.4,42.2,30.6,41.5,30.2"></path></symbol><symbol id="spotify-unauth-mask" viewBox="0 0 64 64"><path d="M39,37.7c-4.2-2.6-9.4-3.2-15.5-1.8c-0.5,0.1-0.9,0.7-0.8,1.2c0.1,0.5,0.7,0.9,1.2,0.7c5.6-1.3,10.3-0.8,14.1,1.5 c0.5,0.3,1.1,0.1,1.4-0.3C39.6,38.6,39.5,38,39,37.7z M40.9,33c-4.9-3-12.2-3.9-18-2.1c-0.7,0.2-1,0.9-0.8,1.6 c0.2,0.7,0.9,1,1.6,0.8c5.1-1.5,11.6-0.8,15.9,1.9c0.6,0.4,1.4,0.2,1.7-0.4C41.7,34.1,41.5,33.4,40.9,33z M0,0v64h64V0H0z M32,48 c-8.8,0-16-7.2-16-16c0-8.8,7.2-16,16-16c8.8,0,16,7.2,16,16C48,40.8,40.8,48,32,48z M43,27.6c-5.9-3.5-15.3-3.9-21-2.1 c-0.8,0.2-1.2,1.1-1,1.9c0.2,0.8,1.1,1.2,1.9,1c4.9-1.5,13.4-1.2,18.6,1.9c0.7,0.4,1.6,0.2,2.1-0.5C43.9,29,43.7,28,43,27.6z"></path></symbol><symbol id="applepodcast-icon" viewBox="0 0 64 64"><circle cx="32" cy="29.624" r="3.128"></circle><path d="M35.276 35.851s-.358-1.848-3.309-1.848c-3.015 0-3.242 1.848-3.243 1.848-.173.117-.025 3.616.352 6.206.386 2.651.399 4.753 2.62 4.768h.607c2.222.027 2.235-2.117 2.62-4.768.378-2.59.526-6.089.353-6.206z"></path><path d="M31.558 21.608c-4.346.206-8.352 4.153-8.62 8.495-.206 3.35 1.411 6.329 3.947 8.063.169.115.4-.011.4-.216v-1.563a.329.329 0 0 0-.115-.248 7.273 7.273 0 0 1-2.463-5.661c.1-3.786 3.207-6.939 6.991-7.091a7.296 7.296 0 0 1 7.598 7.29 7.267 7.267 0 0 1-2.367 5.368.25.25 0 0 0-.082.185v1.629c0 .206.234.334.402.215a9.056 9.056 0 0 0 3.83-7.398 9.08 9.08 0 0 0-9.52-9.068z"></path><path d="M31.138 17.202c-6.831.424-12.342 6.067-12.617 12.905-.247 6.116 3.58 11.371 8.987 13.28a.241.241 0 0 0 .316-.26l-.194-1.461a.24.24 0 0 0-.146-.19c-4.207-1.76-7.172-5.894-7.204-10.731-.042-6.19 4.898-11.454 11.079-11.783 6.764-.36 12.362 5.018 12.362 11.703 0 4.85-2.949 9.008-7.15 10.79a.23.23 0 0 0-.137.174l-.252 1.486c-.03.18.145.331.317.27 5.238-1.852 8.992-6.847 8.992-12.72 0-7.736-6.512-13.95-14.353-13.463z"></path></symbol><symbol id="applepodcast-mask" viewBox="0 0 64 64"><path d="M0 0v64h64V0H0zm34.926 42.175c-.386 2.683-.399 4.852-2.622 4.825h-.608c-2.223-.015-2.236-2.142-2.622-4.825-.377-2.62-.525-6.16-.352-6.278.001-.001.228-1.87 3.245-1.87 2.953 0 3.31 1.87 3.31 1.87.174.118.026 3.658-.351 6.278zm-7.759-5.987a.334.334 0 0 1 .114.25v1.582c0 .207-.23.335-.4.218a9.197 9.197 0 0 1-3.949-8.157c.268-4.394 4.277-8.387 8.626-8.596 5.218-.25 9.527 3.954 9.527 9.176a9.194 9.194 0 0 1-3.832 7.484c-.168.121-.403-.008-.403-.217v-1.649c0-.071.03-.138.082-.187a7.39 7.39 0 0 0 2.369-5.431c0-4.178-3.433-7.546-7.603-7.376-3.787.154-6.895 3.344-6.996 7.175a7.396 7.396 0 0 0 2.465 5.728zm7.963-6.592c0 1.747-1.401 3.164-3.13 3.164s-3.13-1.417-3.13-3.164c0-1.748 1.401-3.165 3.13-3.165s3.13 1.417 3.13 3.165zm1.372 13.924c-.172.061-.348-.092-.317-.274l.252-1.504a.232.232 0 0 1 .138-.175A11.86 11.86 0 0 0 43.73 30.65c0-6.765-5.602-12.206-12.37-11.842-6.185.333-11.129 5.66-11.088 11.922.033 4.894 3 9.078 7.21 10.858.079.033.135.106.146.192l.194 1.479c.024.178-.15.323-.316.263-5.411-1.932-9.24-7.25-8.994-13.437.276-6.92 5.79-12.628 12.626-13.058C38.984 16.534 45.5 22.822 45.5 30.65c0 5.942-3.756 10.995-8.998 12.87z"></path></symbol></svg>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let logo = document.querySelector("#animated-logo");
                let logoWrap = document.querySelector("#animated-logo-wrap");
                let episodeCover = document.querySelector("#episode-cover");
                let player = document.querySelector("#player");

                if(logo) { // Check if the element exists
                    logo.addEventListener("click", function() {
                        this.classList.toggle("md:w-32");
                        logoWrap.classList.toggle("md:flex-1");
                    });
                }
                if(episodeCover) {
                    episodeCover.addEventListener("click", function() {
                        player.classList.toggle("pointer-events-auto relative flex w-full flex-col rounded-md ");
                    });
                }
            });
        </script>
        <script src='audioplayer.js'></script>
        <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.0.1/model-viewer.min.js"></script>
        <script>
        const modelViewerParameters = document.querySelector("model-viewer#mic");

        modelViewerParameters.addEventListener("load", (ev) => {

          let material = modelViewerParameters.model.materials[0];

           // Defaults to gold
          material.pbrMetallicRoughness.setBaseColorFactor([0.7294, 0.5333, 0.0392]);


            material.pbrMetallicRoughness.setMetallicFactor(1);

            material.pbrMetallicRoughness.setRoughnessFactor(1);
        });
        </script>
    </body>
</html>
