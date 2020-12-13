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

// When the user clicks on the button, 
// toggle between hiding and showing the dropdown content
// function myFunction() {
//   document.getAttribute("myDropdown").classList.toggle("show")
// }

// // Close the dropdown if the user clicks outside of it
// window.onclick = (event) => {
//   if (!event.target.matches('.dropbtn')) {
//     let dropdowns = document.getElementsByClassName("dropdown-content")
//     let i
//     for (let i = 0; i < dropdowns.length; i++) {
//       let openDropdown = dropdowns[i]
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show')
//       }
//     }
//   }
// }