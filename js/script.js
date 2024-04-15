const slides = document.querySelectorAll(".slides img");
let currentSlide = 0;
slides[currentSlide].classList.add("active");
function changeSlide() {
  slides[currentSlide].classList.remove("active");
  currentSlide = (currentSlide + 1) % slides.length;
  slides[currentSlide].classList.add("active");
}
setInterval(changeSlide, 5000);


// JavaScript code for additional functionality (optional)

const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");

const loginButton = document.querySelector(".login-button");

loginButton.addEventListener("click", (event) => {
  event.preventDefault(); 
});

/*----------Cart------------ */
function updateTotal(quantityInput) {
  const priceCell = quantityInput.parentElement.previousElementSibling;
  const price = parseFloat(priceCell.textContent.substring(1)); 
  const quantity = quantityInput.value;
  const totalPrice = price * quantity;
  const totalCell = quantityInput.parentElement.nextElementSibling;
  totalCell.textContent = `$${totalPrice.toFixed(2)}`;
}

