<x-layout.default-layout title="Home" :location="$location" :category="$category">
  <h5>Available Stores</h5>
  <hr class="seperator">
  <p>Discount</p>
  <div class="discount-container">
    <div id="discount-content">
      <x-home.discount-card 
        title="Adas Manis (plastik kecil)" 
        image="https://i1.wp.com/teaxy.ru/wp-content/uploads/2017/12/anise-seed-1024x683-e1513349303565.jpeg">
      </x-home.discount-card>
      <x-home.discount-card 
        title="Soto Ayam Kampung" 
        image="https://m.ayosemarang.com/images-semarang/post/articles/2020/04/29/56180/cara-membuat-soto-ayam.jpg">
      </x-home.discount-card>
      <x-home.discount-card 
        title="Soto Ayam Kampung + Nasi Putih" 
        image="https://m.ayosemarang.com/images-semarang/post/articles/2020/04/29/56180/cara-membuat-soto-ayam.jpg">
      </x-home.discount-card>
      <x-home.discount-card 
        title="Ayam Sambal Ijo" 
        image="https://i.ytimg.com/vi/ZceRN6SVYDA/maxresdefault.jpg">
      </x-home.discount-card>
      <x-home.discount-card 
        title="Ayam Geprek" 
        image="https://selerasa.com/wp-content/uploads/2019/01/Resep-ayam-geprek-sambal-korek-531x400.jpg">
      </x-home.discount-card>
      <x-home.discount-card 
        title="Gado-gado Spesial" 
        image="https://img-global.cpcdn.com/recipes/d673616eeeb1cbf5/1200x630cq70/photo.jpg">
      </x-home.discount-card>
    </div>
    <div id="prevButton" class="nav-button">
      <span class="mdi mdi-chevron-left"></span>
    </div>
    <div id="nextButton" class="nav-button" style="display: none">
      <span class="mdi mdi-chevron-right"></span>
    </div>
  </div>
  <div style="padding-top: 30px"></div>
  <div class="me-4">
    <div class="row g-0" id="result-header">
      <div class="col">204 Stores found</div>
      <div class="col col-auto">
        <span id="res-list" class="mdi mdi-format-list-bulleted active"></span>
      </div>
      <div class="col col-auto">
        <span id="res-grid" class="mdi mdi-view-grid-outline"></span>
      </div>
    </div>
    <div id="result-data">
      <div class="row g-0 mt-4">
        @foreach($data as $d)
        <div class="col col-12 my-col">
          <div class="store-card">
            <div class="row">
              <div class="col col-auto col-img">
                <div class="store-image"></div>
              </div>
              <div class="col col-content">
                <div class="store-content">
                  <div class="store-name">{{$d['name']}}</div>
                  <div class="store-category">{{$d['category']}}</div>
                  <div class="row align-items-center">
                    <div class="col col-auto">
                      <span class="mdi mdi-map-marker"></span>
                    </div>
                    <div class="col g-0 store-address me-3">
                      <span class="text-warning">{{$d['status']}}</span>
                      {{$d['address']}}<br/>{{$d['city']}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  
  @push('script')
  <script>
    var clicked = false, base = 0;
    var goRightTimeout;
    var goLeftTimeout;

    $(function(){
      var inWidth = $('#discount-content').width()
      console.log(inWidth)
    })

    $('#discount-content').on({
      "mousemove touchmove": function(e) {
        clicked && function(xAxis) {
          var _this = $(this);
          if(base > xAxis) {
            base = xAxis;
            var curPos = _this.scrollLeft() + 4
            _this.scrollLeft(curPos)
          }
          if(base < xAxis) {
            base = xAxis;
            var curPos = _this.scrollLeft() - 4
            _this.scrollLeft(curPos)
          }
        }.call($(this), pointerEventToXY(e).x);
      },
      "mousedown touchstart": function(e) {
        clicked = true;
        base = pointerEventToXY(e).x;
      },
      "mouseup touchend": function(e) {
        clicked = false;
        base = 0;
      },
      scroll:function(e){
        curPos = $('#discount-content').scrollLeft()
        inWidth = $('#discount-content').innerWidth()
        console.log(curPos)
        console.log(inWidth)
        if(curPos <= 0){
          $("#nextButton").hide()
          clearTimeout(goLeftTimeout)
        } else if (curPos >= inWidth ){
          $("#prevButton").hide()
          clearTimeout(goRightTimeout)
        } else {
          $("#nextButton").show()
          $("#prevButton").show()
        }
      }
    });

    $("#prevButton").on({
      "mousedown touchstart":function(e){
        var curPos = $('#discount-content').scrollLeft() + 20 
        $('#discount-content').scrollLeft(curPos)
        scrollRight()
      },
      "mouseup touchend":function(e){
        clearTimeout(goRightTimeout)
      }
    })

    $("#nextButton").on({
      "mousedown touchstart":function(e){
        var curPos = $('#discount-content').scrollLeft() - 20 
        $('#discount-content').scrollLeft(curPos)
        scrollLeft()
      },
      "mouseup touchend":function(e){
        clearTimeout(goLeftTimeout)
      }
    })

    $('#res-list').on('click', function(){
      $('#res-list').addClass('active');
      $('#res-grid').removeClass('active');
      $('#result-data .row .my-col').removeClass('five-col')
      $('#result-data .row .my-col').addClass(['col', 'col-12'])
      $('.store-card .store-content').removeClass('grid')
      $('.store-card .store-image').removeClass('grid')

      $('.store-card .col-img').removeClass('col-12')
      $('.store-card .col-img').addClass('col-auto')
    })

    $('#res-grid').on('click', function(){
      $('#res-grid').addClass('active');
      $('#res-list').removeClass('active');
      $('#result-data .row .my-col').addClass('five-col')
      $('#result-data .row .my-col').removeClass(['col', 'col-12'])
      $('.store-card .store-content').addClass('grid')
      $('.store-card .store-image').addClass('grid')


      $('.store-card .col-img').addClass('col-12')
      $('.store-card .col-img').removeClass('col-auto')
      
    })

    function scrollRight(){
      goRightTimeout = setTimeout(function(){
        var curPos = $('#discount-content').scrollLeft() + 20 
        $('#discount-content').scrollLeft(curPos).animate()
        scrollRight()
      }, 100)
    }

    function scrollLeft(){
      goLeftTimeout = setTimeout(function(){
        var curPos = $('#discount-content').scrollLeft() - 20 
        $('#discount-content').scrollLeft(curPos).animate()
        scrollLeft()
      }, 100)
    }

    function pointerEventToXY(e){
      var out = {x:0, y:0};
      if(e.type == 'touchstart' || e.type == 'touchmove' || e.type == 'touchend' || e.type == 'touchcancel'){
        var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
        out.x = touch.pageX;
        out.y = touch.pageY;
      } else if (e.type == 'mousedown' || e.type == 'mouseup' || e.type == 'mousemove' || e.type == 'mouseover'|| e.type=='mouseout' || e.type=='mouseenter' || e.type=='mouseleave') {
        out.x = e.pageX;
        out.y = e.pageY;
      }
      return out;
    };
  </script>
  @endpush
</x-layout.default-layout>