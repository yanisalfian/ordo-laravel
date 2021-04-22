<div>
  <div class="sidebar-container">
    <div class="menu-container ">
      <div class="list-group category-group">
        @for($i = 0; $i < count($itemList); $i++)
          @if($i == 0)
            <div id="menu{{$i}}" class="list-group-item" aria-current="true">
              <span class="mdi {{$itemList[$i]['icon']}} me-2"></span> {{$itemList[$i]['title']}}
            </div>
          @else
            <a href="#" id="menu{{$i}}" class="list-group-item list-group-item-action" aria-current="true">
              <span class="mdi {{$activeMenu == $i ? 'mdi-check-bold' : $itemList[$i]['icon']}} me-2"></span> {{$itemList[$i]['title']}}
            </a>
          @endif
        @endfor
      </div>
    </div>
    <div style="margin-top: 20px"></div>
    <div class="menu-container">
      <div class="list-group location-group">
        @for($i = 0; $i < count($locList); $i++)
          @if($i == 0)
            <div id="loc{{$i}}" class="list-group-item" aria-current="true">
              <span class="mdi mdi-map-marker me-2"></span> {{$locList[$i]}}
            </div>
          @else
            <a href="#" id="loc{{$i}}" class="list-group-item list-group-item-action" aria-current="true">
              <span class="mdi mdi-check-bold {{$activeLoc == $i ? 'me-2 visible' : 'invisible'}}"></span>
              {{$locList[$i]}}
            </a>
          @endif
        @endfor
      </div>
    </div>
  </div>
  <div id="footer" class="pa-2">
    <div class="cart-container d-flex align-items-center">
      <div class="circle cart-icon d-flex align-items-center justify-content-center bg-warning">
        <span class="mdi mdi-cart-outline"></span>
      </div>
      <span class="item-desc">1 items = total Rp 14,000.00   
      </span>  
      <span class="badge bg-danger ms-2">3</span>
    </div>
    
  </div>
</div>
