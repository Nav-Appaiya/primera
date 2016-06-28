
    function addCart(e, id){
        e.preventDefault();
        items = [];
        localStorage.setItem('cart', id);
        var product = JSON.stringify(id);
        items.push(id);
        localStorage.setItem('cart', items);


        //console.log(storedNames);
    }