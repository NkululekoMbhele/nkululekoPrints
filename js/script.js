 (document.querySelector('.menuIcon')).addEventListener('click', () => {
    if (document.querySelector('.overlay-menu').style.transform != 'translateX(0%)') {
        document.querySelector('.overlay-menu').style.transform = 'translateX(0%)';
        document.querySelector('.overlay-menu').style.transition = 'transform 0.2s ease-out';
    } else {
        document.querySelector('.overlay-menu').style.transform = 'translateX(-100%)';
        document.querySelector('.overlay-menu').style.transition = 'transform 0.2s ease-out';
    }
});


// Toggle Menu Icon ========================================


document.querySelector('.menuIcon').addEventListener('click', () => {
    if (document.querySelector('.menuIcon').className != 'menuIcon toggle') {
        document.querySelector('.menuIcon').className += ' toggle';
    } else {
        document.querySelector('.menuIcon').className = 'menuIcon';
    }
});


//  ============================================================
//                      Page Navigation
// =============================================================



// --------- PHP-JAVASCRIPT TEST =--------



const btnScript = document.querySelectorAll(".nav-btn");
const post = document.querySelector("#posters-cont");
const art = document.querySelector("#artwork-cont");
const cust = document.querySelector("#custom-cont");

btnScript[0].addEventListener('click', posters);
btnScript[1].addEventListener('click', artwork);
btnScript[2].addEventListener('click', custom);

function posters() {
    btnScript[0].classList.add("page-active");
    btnScript[1].classList.remove("page-active");
    btnScript[2].classList.remove("page-active");
    post.style.display = "block";
    cust.style.display = "none";
    art.style.display = "none";
}

function artwork() {
    btnScript[1].classList.add("page-active");
    btnScript[0].classList.remove("page-active");
    btnScript[2].classList.remove("page-active");
    art.style.display = "block";
    post.style.display = "none";
    cust.style.display = "none";
}

function custom() {
    btnScript[2].classList.add("page-active");
    btnScript[0].classList.remove("page-active");
    btnScript[1].classList.remove("page-active");
    cust.style.display = "block";
    post.style.display = "none";
    art.style.display = "none";
}


// --------- copyRight =--------


    var copyRight = document.querySelector("#copyright");
    var time = new Date();
    var year = time.getFullYear();
    copyRight.innerHTML = "Copyrights &copy; " + year + " All right reserved. Designed by <strong><a href='index.php' style='textDecoration:none;'>Nkululeko Mbhele</a></strong>";


