var images=['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg','09.jpg','11.jpg','14.jpg','16.jpg','18.jpg','20.jpg','22.jpg','24.jpg','26.jpg','28.jpg','30.jpg','10.jpg','12.jpg','15.jpg','17.jpg','19.jpg','21.jpg','23.jpg','25.jpg','27.jpg','29.jpg'];
var $slideshow = document.getElementById('slideshow');
var imagesLoaded = 0;

images = images.map(function(img) {
  var el = document.createElement('img');
  el.setAttribute('src', window.imgUrl + '/img/' + img);

  el.onload = function() {
    imagesLoaded++;
    if (imagesLoaded >= images.length) {
      triggerSlide();
    }
  };

  $slideshow.appendChild(el);
  return el;
});

var activeImage = 0;
var interval = 5;
var intervalChange = 1;
var mouseCoords;
var speed = 0;
var screenWidth = window.innerWidth;
var screenHeight = window.innerHeight;
var center = window.innerWidth / 2;
var lastTimeStamp = Date.now();

document.onmousemove = function(ev) {
  screenWidth = window.innerWidth;
  center = window.innerWidth / 2;
  var x = ev.clientX
  speed = screenWidth / Math.abs(x - center);
}

function triggerSlide() {
  setTimeout(triggerSlide, 50);
  if ((Date.now() - lastTimeStamp) < (speed * speed * interval)) {
    return ;
  }

  lastTimeStamp = Date.now();
  if (activeImage > images.length - 1) {
    activeImage = 0;
  }
  var active = document.querySelector('img.active');
  if (active) {
    active.className = '';
  }
  images[activeImage].className = 'active';
  activeImage++;

  intervalChange++;
}
