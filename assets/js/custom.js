window.onscroll = () => stickyMenu()

let header = document.getElementById("headerSticky")

function stickyMenu() {
  // window.pageYOffset > sticky
  if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
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


// Dropdown 
let mediaQueries = window.matchMedia('screen and (max-width: 768px)')
let classDrop = document.getElementsByClassName('m-pageNav__item m-pageNav__heading')
let numberDrop = ['one','two','three','four']

let classDropMenu = document.getElementsByClassName('m-menuOutNav__expander')
let numberMenu = ['one','two','three','four', 'five', 'six', 'seven', 'eight']

let submenuDrop = document.getElementsByClassName('m-pageNav__item -active')


mediaQueries.addListener(dropdownMenu)
mediaQueries.addListener(dropdownSubmenu)
mediaQueries.addListener(dropdownBootstrap)

function dropdownBootstrap(media) {
  if (media.matches) {
    // If media query matches
    for (let i = 0; i < classDrop.length; i++) {
      let idDropCollapse = document.getElementById(`dropdown_${numberDrop[i]}`)

      // Drop Footer
      classDrop[i].setAttribute("data-bs-toggle", "collapse")
      classDrop[i].setAttribute("data-bs-target", `#dropdown_${numberDrop[i]}`)
      classDrop[i].setAttribute("aria-controls", `dropdown_${numberDrop[i]}`)
      idDropCollapse.classList.add('collapse')
    }
  } else {
    for (let i = 0; i < classDrop.length; i++) {
      let idDropCollapse = document.getElementById(`dropdown_${numberDrop[i]}`)

      classDrop[i].removeAttribute("data-bs-toggle", "collapse")
      classDrop[i].removeAttribute("data-bs-target", `#dropdown_${numberDrop[i]}`)
      classDrop[i].removeAttribute("aria-controls", `dropdown_${numberDrop[i]}`)
      idDropCollapse.classList.remove('collapse')
    }
  }
}


function dropdownMenu(media) {
  if (media.matches) {
    // If media query matches
    for (let i = 0; i < classDropMenu.length; i++) {
      let idMenuCollapse = document.getElementById(`menuDrop_${numberMenu[i]}`)

      // Drop Menu
      classDropMenu[i].setAttribute("data-bs-toggle", "collapse")
      classDropMenu[i].setAttribute("data-bs-target", `#menuDrop_${numberMenu[i]}`)
      classDropMenu[i].setAttribute("aria-controls", `menuDrop_${numberMenu[i]}`)
      idMenuCollapse.classList.add('collapse')
    }
  } else {
    for (let i = 0; i < classDropMenu.length; i++) {
      let idMenuCollapse = document.getElementById(`menuDrop_${numberMenu[i]}`)

      classDropMenu[i].removeAttribute("data-bs-toggle", "collapse")
      classDropMenu[i].removeAttribute("data-bs-target", `#menuDrop_${numberMenu[i]}`)
      classDropMenu[i].removeAttribute("aria-controls", `menuDrop_${numberMenu[i]}`)
      idMenuCollapse.classList.remove('collapse')
    }
  }
}


function dropdownSubmenu(media) {
  if (media.matches) {
    // If media query matches
    for (let i = 0; i < submenuDrop.length; i++) {
      let idSubmenuCollapse = document.getElementById(`dropSubMenu_one`)

      submenuDrop[i].setAttribute("data-bs-toggle", "collapse")
      submenuDrop[i].setAttribute("data-bs-target", `#dropSubMenu_one`)
      submenuDrop[i].setAttribute("aria-controls", `dropSubMenu_one`)
      idSubmenuCollapse.classList.add('collapse')
    }
  } else {
    for (let i = 0; i < submenuDrop.length; i++) {
      let idSubmenuCollapse = document.getElementById(`dropSubMenu_one`)

      submenuDrop[i].setAttribute("data-bs-toggle", "collapse")
      submenuDrop[i].setAttribute("data-bs-target", `#dropSubMenu_one`)
      submenuDrop[i].setAttribute("aria-controls", `dropSubMenu_one`)
      idSubmenuCollapse.classList.remove('collapse')
    }
  }
}

dropdownMenu(mediaQueries)
dropdownSubmenu(mediaQueries)
dropdownBootstrap(mediaQueries)
