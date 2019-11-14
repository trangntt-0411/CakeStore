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

//tabs
var tab_title = document.getElementsByClassName('tablink');
var tab_content = document.getElementsByClassName('tf_content');
function showContent(id) {
    for(var i = 0; i<tab_content.length; i++) {
        tab_content[i].style.display = 'none';
    }
    var content = document.getElementById(id);
    content.style.display = 'block';
}

var ttkhac = document.getElementById('thongtinkhac');
var ttsp = document.getElementById('thongtinsp');
showContent(ttsp.textContent);
ttkhac.addEventListener('click',()=>{
    ttkhac.className += " active";
    ttsp.classList.remove('active');
    var id = ttkhac.textContent;
    showContent(id);
});
ttsp.addEventListener('click',()=>{
    ttsp.className += " active";
    ttkhac.classList.remove('active');
    var id = ttsp.textContent;
    showContent(id);
});