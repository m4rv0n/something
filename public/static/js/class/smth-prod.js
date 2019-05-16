class smthProductList extends HTMLElement {
    constructor() {
        super();
    }
}

customElements.define('smth-prod-list', smthProductList);

class smthProduct extends HTMLElement {
    constructor() {
        super();
    }
}

customElements.define('smth-prod', smthProduct);

class smthProductImage extends HTMLElement {
    constructor() {
        super();
        if (this.hasAttribute('src')) {
            let img = document.createElement('img');
            img.src = this.getAttribute('src');
            img.width = this.getAttribute('width');
            img.height = this.getAttribute('height');
            this.parentNode.replaceChild(img, this);
        }
    }
}

customElements.define('smth-prod-img', smthProductImage);

class smthProductButton extends HTMLElement {
    constructor() {
        super();

        if (this.hasAttribute('type')) {
            switch (this.getAttribute('type')) {
                case 'order':
                    this.classList.add('order-product');
                    break;
                case 'submit':
                    break;
                default:
                    break;
            }
        }
    }
}

customElements.define('smth-prod-button', smthProductButton);