"use strict";

// VARIABLES

const pricingBtnExpand = document.querySelectorAll(".pricing__content-btn");

// DOM MANIPULATION

const expandPricing = function () {};

/**************************/
// ADD EVENT LISTENERS
/**************************/

pricingBtnExpand.forEach((btn) => {
  btn.addEventListener("click", () => {
    // Get the parent element
    const pricingContent = btn.parentElement;

    pricingContent.classList.toggle("pricing__content-open");

    // Get the span element
    let textBox = btn.childNodes[3];

    if (pricingContent.classList.contains("pricing__content-open")) {
      textBox.textContent = "Verberg prijzen";
    } else {
      textBox.textContent = "Bekijk alle prijzen";
    }
  });
});
