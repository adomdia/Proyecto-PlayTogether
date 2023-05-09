import './bootstrap';


//SIDEBAR//

const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      searchBnt = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");

    toggle.addEventListener("click", () =>{
        sidebar.classList.toggle("close");
    });

    modeSwitch.addEventListener("click", () =>{
        body.classList.toggle("dark");

        if(body.classList.contains("dark")){
            modeText.innerText = "Modo claro"
        } else {
            modeText.innerText = "Modo oscuro"
        }
    });


//SLICER//

const fotosContainers = [...document.querySelectorAll('.fotos-container')];
const clasesContainers = [...document.querySelectorAll('.clases-container')];

const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

fotosContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth/2;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth/2;
    })
})

clasesContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth/2;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth/2;
    })
})
