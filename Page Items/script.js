
// should use 500 as setInterval won't always run on time.
        


// Add Wishlist Products 
let wishList = [];

function setup() 
{
    let products = document.querySelectorAll(".but");
    for (let i = 0; i < products.length; i++)
    {
        products[i].onclick = function(e) {
            addItem(e);
        }
    }
}
function redirectToLogin() {
    window.location.href = "login.php";
}
function redirectToSignup() {
    window.location.href = "sign-up.php";
}


function addItem (e) {
    let productId = e.target.getAttribute("id");
    if(!wishList.find(element => element === productId)){
        let productDiv = document.getElementById("product" + productId);
        let wishDiv = document.createElement("div");
        wishDiv.setAttribute("id", "wish" + productId);
        wishDiv.setAttribute("class", "product");
        wishDiv.setAttribute("style", "margin-bottom: 10px;")
        wishDiv.innerHTML += productDiv.innerHTML;
        let removeBtn = document.createElement("input");
        removeBtn.setAttribute("id", "remove" + productId);
        removeBtn.setAttribute("type", "button");
        removeBtn.setAttribute("value", "Remove");
        // removeBtn.setAttribute("class", "removebut");
        removeBtn.onclick = () => removeItem(productId);
        wishDiv.appendChild(removeBtn);

        let aside = document.getElementById("wishlist");
        aside.appendChild(wishDiv);

        wishList.push(productId);
    }
}

function removeItem(productId) {
    document.getElementById("wish" + productId).remove();
    wishList = wishList.filter(element => element !== productId)
}

window.addEventListener("load", setup);


 
// Remove Wishlist Products

// Get all elements with class ri-heart-line
const heartLines = document.querySelectorAll('.ri-heart-line');
  
// Loop through the NodeList and add event listener to each element
heartLines.forEach(heartLine => {
  heartLine.addEventListener('click', (event) => {
    // Get the closest parent element with class item
    const item = event.target.closest('.item');
    // Remove the parent element
    item.remove();
  });
});




// copy menu for mobile

function copyMenu(){
    //copy inside .dpt-cat to .departments
    var dptCategory = document.querySelector('.dpt-cat');
    var dptPlace = document.querySelector('.departments');
    dptPlace.innerHTML = dptCategory.innerHTML;

    //copy inside nav to nav
    var mainNav = document.querySelector('.header-nav nav');
    var navPlace = document.querySelector('.off-canvas nav') /* remove ;*/
    navPlace.innerHTML = mainNav.innerHTML;
    
    //copy .header-top .wrapper to .thetop-nav 
    // 1:03:30
    var topNav = document.querySelector('.header-top .wrapper');  
    var topPlace = document.querySelector('.off-canvas .thetop-nav'); 
    topPlace.innerHTML = topNav.innerHTML;    
}
copyMenu();

if (document.querySelector('.dpt-cat .dpt-trigger')) {
        // code to manipulate the element here
        console.log("GOOD");
}

//show mobile menu
const menuButton = document.querySelector('.trigger'),
      closeButton = document.querySelector('.t-close'),
      addclass = document.querySelector('.site');

menuButton.addEventListener('click', function() {
    addclass.classList.toggle('showmenu')
})
closeButton.addEventListener('click', function(){
    addclass.classList.remove('showmenu')
})

//show sub menu on mobile
const submenu = document.querySelectorAll('.has-child .icon-small');
submenu.forEach((menu) => menu.addEventListener('click',toggle));

function toggle(e) {
    e.preventDefault();
    submenu.forEach((item) => item != this ? item.closest('.has-child').classList.remove('expand') : null);
    if(this.closest('.has-child').classList !='expand');
    this.closest('.has-child').classList.toggle('expand')
}

//slider 
const swiper = new Swiper('.swiper', {
    loop: true,
    
    pagination: {
      el: '.swiper-pagination',
    },
});

  
//show seaech 
const searchButton = document.querySelector('.t-search'),
      tClose = document.querySelector('.search-close'),
      showClass = document.querySelector('.site');
searchButton.addEventListener('click', function() {
    showClass.classList.toggle('showsearch')
})
tClose.addEventListener('click', function() {
    showClass.classList.remove('showsearch')
})
 

//show dpt menu
const dptButton = document.querySelector('.dpt-cat .dpt-trigger'),
      dptClass = document.querySelector('.site');
dptButton.addEventListener('click', function(){
    dptClass.classList.toggle('showdpt')
    
})

//product image s;ider

var productThumb = new Swiper ('.small-image', {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 3,
    freeMode: true,
    watchSliderProgress: true,
    breakpoints: {
        481: {
            searchButton: 32,
        }
    }
})
var productBig = new Swiper ('.big-image', {
    loop: true,
    autoHeight: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev', // error < 12:40
        
    },
    thumbs: {
        swiper: productThumb,
    }
})

//stock products bar width percentage
var stocks = document.querySelectorAll('.products .stock');
for (let x = 0; x < stocks.length; x++) {
    let stock = stocks[x].dataset.stock,
    available = stocks[x].querySelector('.qty-available').innerHTML,
    sold = stocks[x].querySelector('.qty-sold').innerHTML,
    percent = sold*100/stock;

    stocks[x].querySelector('.available').style.width = percent + '%';
}

    // show cart on click
    const divtoShow = '.mini-cart';
    const divPopup = document.querySelector(divtoShow);
    const divTrigger = document.querySelector('.cart-trigger');

    divTrigger.addEventListener('click', () => {
        setTimeout(() => {
            if(!divPopup.classList.contains('show')) {
                divPopup.classList.add('show');
            }
        }, 250 )
    })

    //close bu click outside
    document.addEventListener('click', (e) => {
        const isClosest = e.target.closest(divtoShow);
        if(!isClosest && divPopup.classList.contains('show')) {
            divPopup.classList.remove('show')
        }
    })
    
    //show modal on load
    window.onload = function () {
        document.querySelector('.site').classList.toggle('showmodal')
    }
    document.querySelector('.modalclose').addEventListener('click', function() {
        document.querySelector('.site').classList.remove('showmodal')
    })
////////////////////////////////////////////////////////////////////////
