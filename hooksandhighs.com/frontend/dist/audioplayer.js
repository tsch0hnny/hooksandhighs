const audioContainer = document.getElementById('player');
const playBtn = document.querySelector('[aria-label="Pause"]');
const prevBtn = document.querySelector('[aria-label="Previous"]');
const nextBtn = document.querySelector('[aria-label="Next"]');
const rewindBtn = document.querySelector('[aria-label="Rewind 10 seconds"]');
const skipBtn = document.querySelector('[aria-label="Skip 10 seconds"]');

const audio = document.getElementById('audio');
const progress = document.querySelector('.progressbar');
const progressContainer = document.querySelector('.progressbar-wrap');
const progressButton = document.querySelector('.progressbar-button');
const title = document.querySelector('.episode-title');
const cover = document.getElementById('episode-cover');
const episodeNumber = document.getElementById('episode-number');
const currTime = document.querySelector('.episode-current-time');
const durTime = document.querySelector('.episode-duration');

// Song titles
const songs = [
    'Juice WRLD Ft Benny Blanco - Real Shit',
    'Lil Baby, Lil Durk ft Rodwave - Rich Off Pain',
    'Polo G – I Know'
];

const url = 'https://admin.hooksandhighs.cyon.site/api/content/items/episodes?fields=%7Btitle:1,%20audio:1%7D'

let episodes;

fetch('https://admin.hooksandhighs.cyon.site/api/content/items/episodes?fields=%7Btitle:1,%20audio:1%7D')
  .then(res => res.json())
  .then(data => {
    episodes = data; // save the data to use later
    loadEpisode(episodes[episodeIndex]); // load the initial episode
    
    // Get all buttons with class "playlist-item"
    //const playlistItems = document.querySelectorAll('.playlist-item');

    // Add click event listener to each button
    //playlistItems.forEach(item => {
       // item.addEventListener('click', () => {
            // Get the aria-episode-index attribute of the clicked button
            //episodeIndex = Number(item.getAttribute('aria-episode-index'));

            // Load and play the corresponding episode
            //loadEpisode(episodes[episodeIndex]);
            //playAudio();
        //});
    //});
  })
  .catch(err => console.error(err));

// Keep track of song
let episodeIndex = 2;

// Wait for the DOM content to load
document.addEventListener('DOMContentLoaded', () => {
    // Get all buttons with class "playlist-item"
    const playlistItems = document.querySelectorAll('.playlist-item');

    // Add click event listener to each button
    playlistItems.forEach(item => {
        item.addEventListener('click', () => {
            // Get the aria-episode-index attribute of the clicked button
            episodeIndex = Number(item.getAttribute('aria-episode-index'));

            // Load and play the corresponding episode
            loadEpisode(episodes[episodeIndex]);
            playAudio();
        });
    });
});

// Update song details
function loadEpisode(episode) {
  title.innerText = episode.title;
  episodeNumber.innerText = episodeIndex + 1;
  audio.src = `https://admin.hooksandhighs.cyon.site/storage/uploads/${episode.audio.path}`;
  //cover.src = `images/${episode.title}.jpg`;


  // Remove "border-barely-purple" from all buttons and add it back if aria-episode-index matches episodeIndex
  document.querySelectorAll('.playlist-item').forEach((item) => {
    item.classList.remove('border-barely-purple');
    item.classList.add('border-barely-purple-dark/[0.3]');

    if (episodeIndex === Number(item.getAttribute('aria-episode-index'))) {
      item.classList.remove('border-barely-purple-dark/[0.3]');
      item.classList.add('border-barely-purple');
    }
  }); 
}

// Play song
function playAudio() {
  audioContainer.classList.add('play');
//  playBtn.querySelector('i.fas').classList.remove('fa-play');
//  playBtn.querySelector('i.fas').classList.add('fa-pause');

  audio.play();
}

// Pause song
function pauseAudio() {
  audioContainer.classList.remove('play');
//  playBtn.querySelector('i.fas').classList.add('fa-play');
//  playBtn.querySelector('i.fas').classList.remove('fa-pause');

  audio.pause();
}

// Previous song
function prevEpisode() {
  episodeIndex--;

  if (episodeIndex < 0) {
    episodeIndex = episodes.length - 1;
  }

  loadEpisode(episodes[episodeIndex]);
  playAudio();
}

// Next song
function nextEpisode() {
  episodeIndex++;

  if (episodeIndex > episodes.length - 1) {
    episodeIndex = 0;
  }

  loadEpisode(episodes[episodeIndex]);
  playAudio();
}

// Converts time in seconds to HH:MM:SS format
function formatTime(timeInSeconds) {
  const hours = Math.floor(timeInSeconds / 3600);
  const minutes = Math.floor((timeInSeconds - (hours * 3600)) / 60);
  const seconds = Math.floor(timeInSeconds - (hours * 3600) - (minutes * 60));

  let timeStr = '';

  if(hours > 0) {
    timeStr += (hours < 10 ? '0' : '') + hours + ':';
  }

  timeStr += (minutes < 10 ? '0' : '') + minutes + ':' +
             (seconds < 10 ? '0' : '') + seconds;

  return timeStr;
}

// Load metadata of the audio
audio.addEventListener('loadedmetadata', () => {
  // Display the duration when metadata is loaded
  durTime.innerText = formatTime(audio.duration);
});

// Update progress bar
function updateProgress(e) {
  const { duration, currentTime } = e.srcElement;
  const progressPercent = (currentTime / duration) * 100;
  progress.style.width = `${progressPercent}%`;
  progressButton.style.left = `${progressPercent}%`;
  currTime.innerText = formatTime(currentTime);

  // Check if duration is a number before updating durTime
  if (!isNaN(duration)) {
    durTime.innerText = formatTime(duration);
  }
}

// Set progress bar
function setProgress(e) {
  const width = this.clientWidth;
  const clickX = e.offsetX;
  const duration = audio.duration;

  audio.currentTime = (clickX / width) * duration;
}

// Rewind 10 seconds
rewindBtn.addEventListener('click', () => {
  audio.currentTime = Math.max(audio.currentTime - 10, 0);
});

// Skip 10 seconds
skipBtn.addEventListener('click', () => {
  audio.currentTime = Math.min(audio.currentTime + 10, audio.duration);
});

// Event listeners
playBtn.addEventListener('click', () => {
  const isPlaying = audioContainer.classList.contains('play');

  if (isPlaying) {
    pauseAudio();
  } else {
    playAudio();
  }
});

// Change song
prevBtn.addEventListener('click', prevEpisode);
nextBtn.addEventListener('click', nextEpisode);

// Time/song update
audio.addEventListener('timeupdate', updateProgress);

// Click on progress bar
progressContainer.addEventListener('click', setProgress);

// Song ends
audio.addEventListener('ended', nextEpisode);

// Time of song
audio.addEventListener('timeupdate',DurTime);
