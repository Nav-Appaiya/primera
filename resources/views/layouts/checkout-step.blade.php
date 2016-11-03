
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
<div class="row">
  <div id="crouton">
      <ul>
          <li><a href="#" class="{{ Request::is('winkelwagen') ? 'active' : null }}">Winkelwagen</a></li>
          <li><a href="#" class="{{ Request::is('winkelwagen/checkout') ? 'active' : null }}">Gegevens</a></li>
          <li><a href="#" class="{{ Request::is('winkelwagen/afrekenen/*') ? 'active' : null }}">Overzicht</a></li>
          <li><a href="#" class="{{ Request::is('order/payment/*') ? 'active' : null }}">Bedankt</a></li>
      </ul>
  </div>
</div>
