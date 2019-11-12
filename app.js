//hiện giỏ hàng
var cart = document.getElementById('cart');
var cartdrop = document.getElementById('cart-drop');

cart.addEventListener('click',()=>{
    
    if(cartdrop.style.display == 'block') {
        cartdrop.style.display = "none";
    } else {
        cartdrop.style.display = "block";
    }
    
});