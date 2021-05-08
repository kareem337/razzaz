//law el doc bada2 loading Ahamm 7agaa!!
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    //benemsek el item el hane3m3laha remove from cart
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }
    //bamsek el quantity beta3et kol item
    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }
    //bamsek el 7agat el gowa kol row fel cart 
    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }

    //bamsek el button beta3v purchase
    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
}
//deleting all the items the i choose when i click on this button
function purchaseClicked() {
    alert('Thank you for your purchase')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal()
}
//removing an item from cart
//lma el quantity teb2a 2a2al men one tet8ayar 
function quantityChanged(event) {
    var input = event.target
    //NAN Not A Number or less than one
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}
//benemsek esm el item we el price we el image beta3etha we ne7otaha fel cart ta7t
function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText 
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
    var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src
    addItemToCart(title, price, imageSrc) //creating a row 
    updateCartTotal()
}
//creating the row beta3 el cart ta7t we ben7ot feh kol el 7agat el mesektaha 
function addItemToCart(title, price, imageSrc) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    //3ashan maykararsh item
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == title) {
            alert('This item is already added to the cart')
            return
        }
    }
    //bab3atlaha el variables el fel function 
    var cartRowContents = `
        <div class="cart-item cart-column">
            <img class="cart-item-image" src="${imageSrc}" width="100" height="100">
            <span class="cart-item-title">${title}</span>
        </div>
        <span class="cart-price cart-column">${price}</span>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-danger" type="button">REMOVE</button>
        </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    //bensha8al el remove we el change quantity
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged);
}
//ba7seb beha el total kol mara we ba update el total we el function dr basta3melha kaza mara fo2
function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0] //se3raha
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]  //3adadha
        var price = parseFloat(priceElement.innerText.replace('$', '')) //bena5od el se3r men el element men 8er el dolar sign
        var quantity = quantityElement.value
        total = total + (price * quantity) //benedrab el price beta3 el item fe 3adaha
    }
    total = Math.round(total * 100) / 100 //round the total to the nearest two decimals
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total
}