
    function addCart(e, id){
        e.preventDefault();
        items = [];
        localStorage.setItem('cart', id);
        var product = JSON.stringify(id);
        items.push(id);
        localStorage.setItem('cart', items);


        //console.log(storedNames);
    }

    $(document).ready(function(){
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
                $(this).toggleClass('open');
            }
        );
    });