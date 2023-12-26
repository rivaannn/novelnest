import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';
import theme from 'tailwindcss/defaultTheme';

window.Alpine = Alpine;

Alpine.start();

// Fungsi Dark Mode
const sunIcon = document.querySelector(".sun")
const moonIcon = document.querySelector(".moon")

const userTheme = localStorage.getItem("theme")
const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches

const iconToggle = () => {
    moonIcon.classList.toggle("display-none")
    sunIcon.classList.toggle("display-none")
}

const themeCheck = () => {
    if(userTheme === "dark" || (!userTheme && systemTheme)) {
        document.documentElement.classList.add("dark")
        moonIcon.classList.add("display-none")
        return
    }
    sunIcon.classList.add("display-none")
}

const themeSwitch = () => {
    if (document.documentElement.classList.contains("dark")) {
        document.documentElement.classList.remove("dark")
        localStorage.setItem("theme","light")
        iconToggle()
        return
    }
    document.documentElement.classList.add("dark")
    localStorage.setItem("theme", "dark")
    iconToggle()
}

sunIcon.addEventListener("click", () => {
    themeSwitch()
})

moonIcon.addEventListener("click", () => {
    themeSwitch()
})

themeCheck();

// Fungsi Scroll Back to Top

let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

document.getElementById('myBtn').addEventListener('click', topFunction);