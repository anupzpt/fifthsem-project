// dropdown 
let subMenu = document.getElementById("subMenu");

        var toggleMenu = document.getElementById("toggleMenu");
        toggleMenu.addEventListener('click', () => {
          event.preventDefault();
            subMenu.classList.toggle("open-menu");
        });

        // close the sub-menu-wrap element when the user click outside of it
        document.addEventListener("click", function(event) {
            if (!event.target.closest("#submenu") && !event.target.closest(".user-pic")) {
                subMenu.classList.remove("open-menu");
            }
        });


// side navbar
const navShowBtn = document.querySelector(".navbar-show-btn");
const navHideBtn = document.querySelector(".navbar-hide-btn");
const sideNavbar = document.getElementById("side-navbar");
navShowBtn.addEventListener("click", () => {
  sideNavbar.classList.add("side-navbar-show");
});

navHideBtn.addEventListener("click", () => {
  sideNavbar.classList.remove("side-navbar-show");
});

// category
const categoryItems = document.getElementById("category-list-items");

const categoryTogglerBtn = document.querySelector(".category-toggler-btn");
categoryTogglerBtn.addEventListener("click", () => {
  categoryItems.style.display = "block";

  

  categoryItems.classList.toggle("show-category-items");

  if (categoryItems.classList.contains("show-category-items")) {
    categoryTogglerBtn.querySelector("i").className = "fas fa-circle-arrow-up";
  } else {
    categoryTogglerBtn.querySelector("i").className =
      "fas fa-circle-arrow-down";
    categoryItems.style.display = "none";
  }
});
//artist
// teachers slider
$(".teachers-content").slick({
  arrows: false,
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 3,
  adaptiveHeight: true,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
      },
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
  ],
});
$(".feature-product").slick({
    arrows: false,
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
// feedback
const feedbackItems = document.querySelectorAll(".feedback-item");
const feedbackBtns = document.querySelectorAll(".feedback-btn");
const feedbackDisplay = document.querySelector("#feedback-display");

let activeId = 1;
changeFeedback(activeId);
function changeFeedback(id) {
  feedbackItems.forEach((item) => {
    if (id == item.dataset.id) {
      // swapping data id
      [feedbackDisplay.dataset.id, item.dataset.id] = [
        item.dataset.id,
        feedbackDisplay.dataset.id,
      ];
      // swapping the innder content
      [feedbackDisplay.innerHTML, item.innerHTML] = [
        item.innerHTML,
        feedbackDisplay.innerHTML,
      ];
      // swapping quote image
      [
        feedbackDisplay.querySelector("img").src,
        item.querySelector("img").src,
      ] = [
        item.querySelector("img").src,
        feedbackDisplay.querySelector("img").src,
      ];
    }
  });
}

feedbackBtns.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    activeId = index + 1;
    feedbackBtnReset();
    btn.classList.add("feedback-active-btn");
    changeFeedback(activeId);
  });
});

function feedbackBtnReset() {
  feedbackBtns.forEach((btn) => {
    btn.classList.remove("feedback-active-btn");
  });
}
