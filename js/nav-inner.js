/*
dit is om de inner-navbar op index.html op de juiste plek te houden wanner je gaat scrollen
*/

window.onscroll = function() {makeSticky()};

var navInner = document.querySelector(".nav-inner");
const oae = document.querySelector("#oae");
let twoPercentOfWindowHeight = window.innerHeight * 0.02;
var stickyOffset = navInner.offsetTop - twoPercentOfWindowHeight;

function makeSticky() {
  if (window.pageYOffset >= stickyOffset) {
    navInner.classList.add("sticky");
    oae.classList.add("oae-sticky");
  } else {
    navInner.classList.remove("sticky");
    oae.classList.remove("oae-sticky");
  }
}