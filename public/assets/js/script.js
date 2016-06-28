
    function addCart(e, id){
        e.preventDefault();
        var items = JSON.parse(localStorage.getItem('cart'));
        items.push(id);
        localStorage.setItem("cart", JSON.stringify(items));

        var storedNames = JSON.parse(localStorage.getItem("cart"));

        console.log(storedNames);

    }