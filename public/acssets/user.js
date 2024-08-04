document.getElementById('cart-btn').addEventListener('click', function() {
    document.getElementById('cart-container').classList.add('active');
});

document.getElementById('close-cart-btn').addEventListener('click', function() {
    document.getElementById('cart-container').classList.remove('active');
});
