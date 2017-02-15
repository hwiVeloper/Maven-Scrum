    </div>
    <!-- END CONTAINER-FLUID -->

    <!-- navigation toggle button script -->
    <script type="text/javascript">
    $(document).ready(function(){
      $('.dropdown-menu').hide();
      $('#nav-icon2').click(function(){
        $(this).toggleClass('open');
      });

      // navigation slideUp / slideDown 적용
      $('.nav-item').click(function() {
          var drop_menu = $(this).find(".dropdown-menu");
          $(".dropdown-menu").slideUp();
          if(drop_menu.css("display") === "block") {
              drop_menu.slideUp();
          } else {
              drop_menu.slideDown();
          }
      })
    });
    </script>

    <!-- dashboard 순위별 색상 및 트로피 변경 -->

    <script>
      $(function() {
          var trophy_chk;
          var card_header;
          for (var i = 0; i < 3; i++) {
            trophy_chk = $(".plan-card").eq(i).find(".trophy");
            card_header = $(".plan-card").eq(i).find(".card-header");
            if (i === 0) {
               trophy_chk.append("<i class='fa fa-trophy' aria-hidden='true' style='color:#edcb5e'></i>");
              card_header.css({
                "background-color" : "#edcb5e",
                "color" : "#fff"
              });
               $(".plan-card").eq(i).append("<i class='fa fa-star star' style='color:#edcb5e' aria-hidden='true'></i>");
            } else if(i === 1) {
               trophy_chk.append("<i class='fa fa-trophy' aria-hidden='true' style='color:#C0C0C0'></i>");
              card_header.css({
                "background-color" : "#C0C0C0",
                "color" : "#fff"
              });
             } else {
               trophy_chk.append("<i class='fa fa-trophy' aria-hidden='true' style='color:#d8b17e'></i>");
              card_header.css({
                "background-color" : "#d8b17e",
                "color" : "#fff"
              });
             }
          }
      })
    </script>
  </body>
</html>
