const audioContainer = document.getElementById('player');
const playBtn = document.querySelector('[aria-label="Pause"]');
const prevBtn = document.querySelector('[aria-label="Previous"]');
const nextBtn = document.querySelector('[aria-label="Next"]');

const audio = document.getElementById('audio');
const progress = document.querySelector('progressbar');
const progressContainer = document.querySelector('progressbar-wrap');
const title = document.querySelector('.episode-title');
const cover = document.getElementById('episode-cover');
const currTime = document.querySelector('.episode-current-time');
const durTime = document.querySelector('.episode-duration');

// Song titles
const songs = [
    'Juice WRLD Ft Benny Blanco - Real Shit',
    'Lil Baby, Lil Durk ft Rodwave - Rich Off Pain',
    'Polo G – I Know'
];

const episodes = 'https://admin.hooksandhighs.cyon.site/api/content/items/episodes?fields=%7Btitle:1,%20audio:1%7D'

fetch(episodes)
    .then( res => { return res.json(); } )
    .then( data => { console.log(data); } )
    .catch( err => { console.errror(err) } )

// Keep track of song
let episodeIndex = 2;

// Initially load song details into DOM
loadEpisode(episodes[episodeIndex]);

// Update song details
function loadEpisode(episode) {
  title.innerText = episode.title;
  audio.src = `https://admin.hooksandhighs.cyon.site/storage/uploads/${episode.audio.path}`;
  cover.src = `images/${episode.title}.jpg`;
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
  songIndex--;

  if (songIndex < 0) {
    songIndex = songs.length - 1;
  }

  loadEpisode(episodes[episodeIndex]);

  playAudio();
}

// Next song
function nextEpisode() {
  episodeIndex++;

  if (episodeIndex > episode.length - 1) {
    episodeIndex = 0;
  }

  loadEpisode(episodes[episodeIndex]);

  playAudio();
}

// Update progress bar
function updateProgress(e) {
  const { duration, currentTime } = e.srcElement;
  const progressPercent = (currentTime / duration) * 100;
  progress.style.width = `${progressPercent}%`;
}

// Set progress bar
function setProgress(e) {
  const width = this.clientWidth;
  const clickX = e.offsetX;
  const duration = audio.duration;

  audio.currentTime = (clickX / width) * duration;
}


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
