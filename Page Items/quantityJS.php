<script>
    // Get the quantity input field and plus/minus buttons
const quantityInput = document.querySelector('.qty-control input');
const minusButton = document.querySelector('.qty-control .minus');
const plusButton = document.querySelector('.qty-control .plus');
const addToCartButton = document.getElementById('button-cart');
const cartQuantityElement = document.getElementById('cartQuantity');

// Add event listeners to the plus and minus buttons
minusButton.addEventListener('click', decrementQuantity);
plusButton.addEventListener('click', incrementQuantity);
addToCartButton.addEventListener('click', addToCart);

// Function to decrement the quantity
function decrementQuantity() {
    let quantity = parseInt(quantityInput.value);
    if (quantity > 1) {
        quantity--;
        quantityInput.value = quantity;
    }
}

// Function to increment the quantity
function incrementQuantity() {
    let quantity = parseInt(quantityInput.value);
    quantity++;
    quantityInput.value = quantity;
}

// Function to add the quantity to the cart
function addToCart() {
    const quantity = parseInt(quantityInput.value);
    let cartQuantity = parseInt(cartQuantityElement.textContent);
    cartQuantity += quantity;
    cartQuantityElement.textContent = cartQuantity;

    // Reset the quantity input value to 1
    quantityInput.value = 1;
}
</script>