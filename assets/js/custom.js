window.onscroll = () => stickyMenu()

let header = document.getElementById("headerSticky")
let sticky = header.offsetTop

function stickyMenu() {
  if (window.pageYOffset > sticky) {
    header.classList.add("-headerFixed")
  } else {
    header.classList.remove("-headerFixed")
  }
}

let ipad = window.matchMedia('screen and (min-width: 300px)')

let menuMb = document.getElementById('menuContent')
let burgerButton = document.getElementById('burgerOpen')
let burgerButtonTwo = document.getElementById('burgerOpenTwo')
let burgerOutMenu = document.getElementById('burgerOutMenu')
let theBody = document.getElementById('theBody')

ipad.addListener(validation)

function validation(event) {
    if (event.matches) {
        burgerButton.addEventListener('click', hideShow)
        burgerButtonTwo.addEventListener('click', hideShow)
        burgerOutMenu.addEventListener('click', hideShow)
    }
    else {
        burgerButton.removeEventListener('click', hideShow)
        burgerButtonTwo.addEventListener('click', hideShow)
        burgerOutMenu.addEventListener('click', hideShow)
    }
}

validation(ipad)

function hideShow() {
    if (menuMb.classList.contains('-openMenu')) {
        menuMb.classList.remove('-openMenu')
        theBody.style.cssText = ''
    } else {
        menuMb.classList.add('-openMenu')
        theBody.style.overflow = 'hidden'
    }
}

/* When the user clicks on the button, 
closes every dropdowns and open the only one passed as argument */

/* Javascript only */
function myFunction(element) {
  let dropdowns = document.getElementsByClassName("m-pageNav__group");
  
  // element.nextSibling is the carriage return… The dropdown menu is the next next.
  let thisDropdown = element.nextSibling.nextSibling;
  
  if (!thisDropdown.classList.contains('-visible')) {  // Added to hide dropdown if clicking on the one already open
    let i;
    for (i = 0; i < dropdowns.length; i++) {
      dropdowns[i].classList.remove('-visible');
    }
  }
  
  // Toggle the dropdown on the element clicked
  thisDropdown.classList.toggle("-visible");
}

/* W3Schools function to close the dropdown when clicked outside. */
window.onclick = function(event) {
  if (!event.target.matches('.m-pageNav__heading')) {
    let dropdowns = document.getElementsByClassName("m-pageNav__group");
    let i;
    for (i = 0; i < dropdowns.length; i++) {
      let openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('-visible')) {
        openDropdown.classList.remove('-visible');
      }
    }
  }
}
