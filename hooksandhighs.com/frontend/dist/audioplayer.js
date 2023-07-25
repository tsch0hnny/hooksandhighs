const audioContainer = document.getElementById('player');
const playBtn = document.querySelector('[aria-label="Pause"]');
const prevBtn = document.querySelector('[aria-label="Previous"]');
const nextBtn = document.querySelector('[aria-label="Next"]');

const audio = document.getElementById('audio');
const progress = document.getElementById('progress');
const progressContainer = document.getElementById('progress-container');
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

const url = 'https://admin.hooksandhighs.cyon.site/api/content/items/episodes'

fetch(url)
    .then( res => { return res.json(); } )
    .then( data => { console.log(data); } )
    .catch( err => { console.errror(err) } )

// Keep track of song
let songIndex = 2;

// Initially load song details into DOM
loadSong(songs[songIndex]);

// Update song details
function loadSong(song) {
  title.innerText = song;
  audio.src = `https://admin.hooksandhighs.cyon.site/storage/uploads//2023/07/20/${song}.mp3`;
  cover.src = `images/${song}.jpg`;
}

// Play song
function playSong() {
  audioContainer.classList.add('play');
//  playBtn.querySelector('i.fas').classList.remove('fa-play');
//  playBtn.querySelector('i.fas').classList.add('fa-pause');

  audio.play();
}

// Pause song
function pauseSong() {
  audioContainer.classList.remove('play');
//  playBtn.querySelector('i.fas').classList.add('fa-play');
//  playBtn.querySelector('i.fas').classList.remove('fa-pause');

  audio.pause();
}

// Previous song
function prevSong() {
  songIndex--;

  if (songIndex < 0) {
    songIndex = songs.length - 1;
  }

  loadSong(songs[songIndex]);

  playSong();
}

// Next song
function nextSong() {
  songIndex++;

  if (songIndex > songs.length - 1) {
    songIndex = 0;
  }

  loadSong(songs[songIndex]);

  playSong();
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
    pauseSong();
  } else {
    playSong();
  }
});

// Change song
prevBtn.addEventListener('click', prevSong);
nextBtn.addEventListener('click', nextSong);

// Time/song update
audio.addEventListener('timeupdate', updateProgress);

// Click on progress bar
progressContainer.addEventListener('click', setProgress);

// Song ends
audio.addEventListener('ended', nextSong);

// Time of song
audio.addEventListener('timeupdate',DurTime);
