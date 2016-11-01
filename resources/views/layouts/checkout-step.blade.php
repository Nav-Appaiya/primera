
<style>
    .cart-arrow-box > div{
        margin: 0px;
    }

    .cart-arrow-box .active{
        color: gray;
    }

    .cart-arrow {
        margin: 10px 0;
        font-weight: bold;
        /*line-height: 50px;*/
        box-sizing: border-box
        width: 50%;
        float:left;
    }
    .cart-arrow:after {
        left: 100%;
        border: solid transparent;
        content: " / ";
        line-height: 30px;
        height: 0;
        width: 50%;
        float: right;    
        pointer-events: none;
        box-sizing: border-box
    }
    .cart-arrow.active:after {
      color:gray;
    }
</style>

{{--TODO design --}}

<div class="row cart-arrow-box">
   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
       <div class="cart-arrow text-center {{ Request::is('winkelwagen') ? 'active' : null }}">
           <span>Winkelwagen</span>
       </div>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
       <div class="cart-arrow text-center {{ Request::is('winkelwagen/checkout') ? 'active' : null }}">
           <span>Gegevens</span>

       </div>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
       <div class="cart-arrow text-center {{ Request::is('winkelwagen/afrekenen/*') ? 'active' : null }}">
           <span>Overzicht</span>
       </div>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
       <div class="cart-arrow text-center {{ Request::is('order/payment/*') ? 'active' : null }}">
           <span>Bedankt</span>
       </div>
   </div>
</div>

<br>
<br>