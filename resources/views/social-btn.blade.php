<div style="float: right; width: 20%;">

    <div id="ok_shareWidget"></div>
    <script>
    !function (d, id, did, st, title, description, image) {
      var js = d.createElement("script");
      js.src = "https://connect.ok.ru/connect.js";
      js.onload = js.onreadystatechange = function () {
      if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {
        if (!this.executed) {
          this.executed = true;
          setTimeout(function () {
            OK.CONNECT.insertShareWidget(id,did,st, title, description, image);
          }, 0);
        }
      }};
      d.documentElement.appendChild(js);
    }(document,"ok_shareWidget","{{ url()->current() }}",'{"sz":20,"st":"rounded","ck":1}',"{{ $r->titlu_ro }}","{{ $r->tip }}","{{ url('/') }}/img/{{ $r->foto_1 }}");
    </script>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your like button code -->
   <!--  <div class="fb-like" 
      data-href="{{ Request::url() }}" 
      data-layout="standard" 
      data-action="like" 
      data-show-faces="true">
    </div> -->
    <!-- Your share button code -->
    <div class="fb-share-button" 
      data-href="{{ Request::url() }}" 
      data-layout="button_count">
    </div>

</div>
