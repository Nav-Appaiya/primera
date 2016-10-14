
<style>
    .cart-arrow-box > div{
        margin: 0px;
    }

    .cart-arrow{
        background-color: darkorange;
    }

    .cart-arrow-box .active{
        background-color: #1dff00 !important;
    }

    .cart-arrow {
        position: relative;
        background: #88b7d5;
        border: 4px solid #c2e1f5;
        height: 50px;
        padding-top: 10px;
        font-weight: bold;
    }
    .cart-arrow:after, .cart-arrow:before {
        left: 100%;
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }

    .cart-arrow:after {
        border-color: rgba(136, 183, 213, 0);
        border-left-color: #88b7d5;
        border-width: 30px;
        margin-top: -30px;
    }

    .cart-arrow:before {
        border-color: rgba(194, 225, 245, 0);
        border-left-color: #c2e1f5;
        border-width: 36px;
        margin-top: -36px;
    }
</style>

{{--TODO design --}}

<div class="row cart-arrow-box">
   <div class="col-lg-3">
       <div class="cart-arrow text-center {{ Request::is('winkelwagen') ? 'active' : null }}">
           <span>Winkelwagen</span>
       </div>
   </div>
   <div class="col-lg-3">
       <div class="cart-arrow text-center {{ Request::is('winkelwagen/checkout') ? 'active' : null }}">
           <span>Gegevens</span>

       </div>
   </div>
   <div class="col-lg-3">
       <div class="cart-arrow text-center {{ Request::is('winkelwagen/afrekenen/*') ? 'active' : null }}">
           <span>Overzicht</span>
       </div>
   </div>
   <div class="col-lg-3">
       <div class="cart-arrow text-center {{ Request::is('order/payment/*') ? 'active' : null }}">
           <span>Bedankt</span>
       </div>
   </div>
</div>

<br>
<br>