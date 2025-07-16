$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})

//lắc h1

const title = document.getElementById("betta-title");
let hue = 0;

setInterval(() => {
    hue = (hue + 10) % 360;
    title.style.color = `hsl(${hue}, 100%, 50%)`;
}, 100);

//tăng giảm của cá bettta

let price = 300000;
const minPrice = 300000;
const maxPrice = 500000;

function increasePrice() {
  if (price < maxPrice) {
    price += 10000;
    updateDisplay();
  }
}

function decreasePrice() {
  if (price > minPrice) {
    price -= 10000;
    updateDisplay();
  }
}

function updateDisplay() {
  document.getElementById('priceDisplay').textContent = price;
}


const products = [
  { name: "Cá Betta 1", price: 350000 },
  { name: "Cá Betta 2", price: 320000 },
  { name: "Cá Betta 3", price: 370000 },
  { name: "Cá Betta 4", price: 450000 },
  { name: "Cá Betta 5", price: 490000 },
  { name: "Cá Betta 6", price: 380000 },
  { name: "Cá Betta 7", price: 410000 },
  { name: "Cá Betta 8", price: 430000 },
  { name: "Cá Betta 9", price: 300000 },
  { name: "Cá Betta 10", price: 480000 },
  { name: "Cá Betta 11", price: 350000 },
  { name: "Cá Betta 12", price: 399000 },
];

function renderList(data) {
  const list = document.getElementById("productList");
  list.innerHTML = "";
  data.forEach(item => {
    list.innerHTML += `<li>${item.name} - ${item.price.toLocaleString()} đ</li>`;
  });
}

function sortAsc() {
  const sorted = [...products].sort((a, b) => a.price - b.price);
  renderList(sorted);
}

function sortDesc() {
  const sorted = [...products].sort((a, b) => b.price - a.price);
  renderList(sorted);
}

// Khởi động danh sách mặc định
window.onload = () => renderList(products);
