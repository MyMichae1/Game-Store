
let searchIcon = document.querySelector('.bxs-search');
let searchMenu = document.createElement('div'); 

function createSearchMenu() {
    searchMenu.innerHTML = `
        <div class="search-menu">
         <a href="index.php" class="logo">X</a>
            <input type="text" placeholder="Search.....">
            <button>Cari</button>
        </div>
    `;
    searchMenu.classList.add('search-menu-container');
    document.body.appendChild(searchMenu);
}

searchIcon.onclick = () => {
    if (!searchMenu.classList.contains('active')) {
        createSearchMenu();
        searchMenu.classList.add('active');
    
        navbar.classList.remove('active');
        menu.classList.remove('move');
        bell.classList.remove('active');
    } else {
        searchMenu.classList.remove('active');
        searchMenu.remove();
    }
};


let menu = document.querySelector(".menu-icon");
let navbar = document.querySelector(".menu");


menu.onclick = () => {
  navbar.classList.toggle("active");
  menu.classList.toggle("move");
  bell.classList.remove("active");
};

let bell = document.querySelector(".notification");

document.querySelector("#bell-icon").onclick = () => {
  bell.classList.toggle("active");
};

var swiper = new Swiper(".trending-content", {
  slidesPerView: 1,
  spaceBetween: 10,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 15,
    },
    1068: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
  },
});

window.onscroll = function () {
  mufuction();
};

function mufuction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("scroll-bar").style.width = scrolled + "%";
}

document.getElementById("download-btn").addEventListener("click", function () {
  window.print();
});
