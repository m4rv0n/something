document.addEventListener('DOMContentLoaded', () => {
    let order_buttons = document.getElementsByClassName('order-product');

    function submitOrder() {
        let product_id = this.getAttribute('product-id');

        let parent = document.querySelector('[product-id="' + product_id + '"]');

        for (let x = 0; x < parent.childNodes.length; x++) {
            console.log(parent.childNodes[x].nodeName);
            if (parent.childNodes[x].nodeName === 'SMTH-PROD-TITLE') {
                // alert(parent.childNodes[x].innerText);
            }
        }
    }

    for (let x = 0; x < order_buttons.length; x++) {
        order_buttons[x].addEventListener('click', submitOrder, false);
    }
});