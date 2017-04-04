      <!-- FLOATING ACTION BUTTON -->
      <div class="fab-container">
        <div class="fab-popup">
          <ul class="fab-popup-items">
            <li>
              <button class="btn fab-btn fab-btn-ranking" type="button" data-tooltip="tooltip" data-placement="left" title="랭킹(준비중)" data-toggle="modal" data-target="#rankingModal">
                <i class='fa fa-2x fa-trophy' aria-hidden='true'></i>
              </button>
            </li>
            <li>
              <button class="btn fab-btn fab-btn-achievement" type="button" data-tooltip="tooltip" data-placement="left" title="포인트" data-toggle="modal" data-target="#acheivementModal">
                <i class='fa fa-2x fa-user' aria-hidden='true'></i>
              </button>
            </li>
          </ul>
        </div>
        <div class="fab-btn-box">
          <button class="btn fab-btn" type="button">
            <i class='fa fa-3x fa-star-o' aria-hidden='true'></i>
          </button>
        </div>
      </div>
    </div>
    <!-- END CONTAINER-FLUID -->

    <!-- RANKING MODAL -->
    <div class="modal fade" id="rankingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">준비중입니다..</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="height: 100%;">
            <table class="table" style="text-align:center;">
              <thead>
                <tr>
                  <th>이름</th>
                  <th>출석</th>
                  <th>글작성</th>
                  <th>댓글</th>
                  <th>포인트</th>
                  <th>순위</th>
                </tr>
              </thead>
              <?php foreach ($this->session->userdata('rank') as $k => $row): ?>
                <?php $trBackground = ""; ?>
                <?php switch ($row['rank']) {
                  case 1:
                    $trBackground = "style='background-color:#FFD700;'";
                    break;
                  case 2:
                    $trBackground = "style='background-color:#C0C0C0;color:#fff'";
                    break;
                  case 3:
                    $trBackground = "style='background-color:#CD7F32;color:#fff'";
                    break;
                  default:
                    $trBackground = "";
                    break;
                } ?>
                <tr <?=$trBackground?>>
                  <td><?=$row['user_name']?></td>
                  <td><?=$row['attendance_count']?></td>
                  <td><?=$row['plan_count']?></td>
                  <td><?=$row['reply_count']?></td>
                  <td><?=$row['point']?></td>
                  <td><?=$row['rank']?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
          </div>
        </div>
      </div>
    </div>

    <!-- ACHEIVEMENT MODAL -->
    <div class="modal fade" id="acheivementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">개인 포인트 현황</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <tr>
                <th>&nbsp;</th>
                <th>출석 (10)</th>
                <th>스크럼 작성 (10)</th>
                <th>댓글 작성 (1)</th>
                <th>포인트</th>
              </tr>
              <tr>
                <th>이번달</th>
                <th><?=$this->session->userdata('month_attendance_count')?></th>
                <th><?=$this->session->userdata('month_plan_count')?></th>
                <th><?=$this->session->userdata('month_reply_count')?></th>
                <th><?=$this->session->userdata('month_point')?></th>
              </tr>
              <tr>
                <th>누적</th>
                <th><?=$this->session->userdata('attendance_count')?></th>
                <th><?=$this->session->userdata('plan_count')?></th>
                <th><?=$this->session->userdata('reply_count')?></th>
                <th><?=$this->session->userdata('accml_point')?></th>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
          </div>
        </div>
      </div>
    </div>

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
            trophy_chk = $(".plan-card").eq(i).find(".scrum-items__trophy");
            card_header = $(".plan-card").eq(i).find(".card-header");
            if (i === 0) {
               trophy_chk.append("<i class='fa fa-trophy' aria-hidden='true' style='color:#edcb5e'></i>");
               trophy_chk.append("<i class='fa fa-star fa-stack-1x star' aria-hidden='true' style='color:#edcb5e;'></i>");
              card_header.css({
                "background-color" : "#edcb5e",
                "color" : "#fff"
              });
              //  $(".plan-card").eq(i).append("<i class='fa fa-star star' style='color:#edcb5e' aria-hidden='true'></i>");
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
    <script type="text/javascript">
    /* Floating Action Button */
    $(function() {
      $('.fab-popup').hide();

      $('.fab-btn').click(function() {
        $('.fab-popup').fadeToggle();
      });
      $('[data-tooltip="tooltip"]').tooltip();
    });
    </script>
  </body>
</html>
