"use strict";

/**************************/
// DOM VARIABLES
/**************************/

const body = document.body;

// Navigation
const nav = document.querySelector(".navbar");
const navMob = document.querySelector(".nav__mobile-side");
const navMobOpen = document.getElementById("nav__mobile-open");
const navMobClose = document.getElementById("nav__mobile-close");
const navMobContent = document.querySelector(".nav__mobile-content");
const navMobOverlay = document.getElementById("nav__mobile-overlay");

const sectionHero = document.querySelector(".hero");

/**************************/
// DOM MANIPULATION
/**************************/

/**************************/
// NAVIGATION

const openMobileNavigation = function () {
  navMob.style.right = "0";
  navMob.style.width = "15rem";

  navMobClose.style.display = "block";
  navMobContent.style.display = "block";

  navMobOverlay.style.height = "100vh";

  body.classList.add("no-scroll");

  setTimeout(() => {
    navMobContent.style.whiteSpace = "wrap";
  }, 50);
};

const closeMobileNavigation = function () {
  navMob.style.right = "-5rem";
  navMob.style.width = "0";

  navMobContent.style.whiteSpace = "nowrap";
  navMobClose.style.display = "none";
  navMobContent.style.display = "none";

  navMobOverlay.style.height = "0";

  body.classList.remove("no-scroll");
};

// Sticky Navigation
const obs = new IntersectionObserver(
  function (entries) {
    const ent = entries[0];

    if (!ent.isIntersecting) {
      nav.classList.add("nav__sticky");
    } else {
      nav.classList.remove("nav__sticky");
    }
  },
  {
    // In the viewport
    root: null,
    // Navbar goes sticky when <= 95% is visible
    threshold: 0.999,
  }
);

obs.observe(sectionHero);

/**************************/
// ADD EVENT LISTENERS
/**************************/

navMobOpen.addEventListener("click", openMobileNavigation);
navMobClose.addEventListener("click", closeMobileNavigation);
