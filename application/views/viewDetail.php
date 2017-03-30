<style>
* {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.scrum-items__detail {
  margin-bottom: 100px;
}
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style media="screen">
/* 댓글 목록 스타일 */
.reply{
  /*border-top: 1px dashed #bbb;*/
  /*border-bottom: 1px dashed #bbb;*/
  padding-top: 1em;
  padding-bottom: 1em;
}
.scrum-items__chart-lists {
    list-style: none;
    padding-left: 0;
    text-align: center;
    border-bottom:1px solid rgba(0, 0, 0, 0.125);
}
.scrum-items__chart-lists li {
    float: left;
    width: 25%;
    border-right: 1px solid rgba(0, 0, 0, 0.125);
}
.scrum-items__chart-lists li:hover {
    background-color: #7495c6;
}
.scrum-items__chart-lists li a:hover {
    color: #fff;
}
.scrum-items__chart-lists li:last-child {
    border-right: 0;
}
.scrum-items__chart-lists li a {
    padding: 10px 0;
}
.scrum-items__chart-lists:after {
    content: "";
    clear: both;
    display: block;
}
.scrum-items__chart {
    width: 100%;
    padding:20px;
}
#chart-acheivement {
    width: 100%;
}
#chart-trend {
    width:100%;
}
.scrum-items__list-item {
    position: relative;
}
.scrum-items__chart-lists li a {
    display: block;
    font-size: 12px;
}
.is-actived {
    background-color: #7495c6;
}
.is-actived a {
    color: #fff;
}
</style>

<div class="container">
  <div class="row scrum-items__detail">
    <!-- PLAN AREA -->
    <div class="col-md-6">
      <h5><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;일정 상세보기</h5>
      <div class="card text-xs-left">
        <div class="scrum-items__card-block">
        <div class="scrum-items__card-title">
            <h4>
              <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$plans[0]['user_img']);?>" width="50px" height="50px">
              &nbsp;<?=$plans[0]['user_name']?>
            </h4>
        </div>
          <ul class="scrum-items__chart-lists">
              <li class="is-actived"><a href="#"><span class="scrum-items__list-item">acheivement</span></a></li>
              <li><a href="#"><span class="scrum-items__list-item">trend</span></a></li>
              <li><a href="#"><span class="scrum-items__list-item">chartItem3</span></a></li>
              <li><a href="#"><span class="scrum-items__list-item">chartItem4</span></a></li>
          </ul>
          <div class="scrum-items__chart">
              <div id="chart-acheivement" style="width: 100%;"></div>
              <div id="chart-trend" style="width: 100%;"></div>
          </div>
          <dt class="col-sm-3">작성일</dt>
          <dd class="col-sm-9"><?=$plan_date?></dd>
          <dt class="col-sm-3">할 일</dt>
          <?php
          foreach ($plans as $k=>$row) :
            if(1 == $row['plan_status']){
              $sts = '<i class="fa fa-check" aria-hidden="true" style="color:#425f4b"></i>';
            }else{
              $sts = '<i class="fa fa-times" aria-hidden="true" style="color:#d9534f"></i>';
            }
            if($k == 0){
              ?>
              <dd class="col-sm-9"><?=$sts?> <?=$row['plan_content']?></dd>
              <?php
            }else{
              ?>
              <dd class="col-sm-9 offset-sm-3"><?=$sts?> <?=$row['plan_content']?></dd>
              <?php
            }
            ?>
            <?php
          endforeach;
          ?>
          <dt class="col-sm-3">코멘트</dt>
          <dd class="col-sm-9"><?=$comment?></dd>
          <p class="card-text" align="right"><small class="text-muted"><?=$creation_dttm?>에 작성</small></p>
        </div>
      </div>
    </div>
    <!-- END PLAN AREA -->
    <!-- REPLY AREA -->
    <div class="col-md-6">
      <h5><i class="fa fa-rss" aria-hidden="true"></i>&nbsp;댓글 <small class="text-muted"><?=$count_reply?> 개</small></h5>
      <div class="card text-xs-center">
        <div class="card-block">
          <div class="card card-outline-comment">
            <div class="card-block2">
              <!-- WRITE REPLY AREA -->
              <form class="" action="<?php echo base_url('Reply/add'); ?>" method="post">
                <input type="hidden" name="user_id" value="<?=$user_id?>">
                <input type="hidden" name="write_user" value="<?=$this->session->userdata('user_id')?>">
                <input type="hidden" name="plan_date" value="<?=$plan_date?>">
                <input type="hidden" name="up_reply_id" value="0">
                <textarea class="form-control" name="reply_comment" rows="2" placeholder="댓글을 남겨주세요." style="" required=""></textarea>
                <button type="submit" class="btn btn-block btn-primary btn-comment" href="">댓글 등록</button>
              </form>
            </div>
          </div>
          <blockquote class="card-blockquote">
            <?php
            // reply count check and fetch replies(count > 0)
            if($count_reply == 0){
              echo "댓글이 없습니다.";
            }else {
              foreach ($replies as $k=>$row) :
                ?>
                <div class="text-xs-left reply">
                  <div class="card-block-comment">
                    <h6>
                      <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$row['user_img']);?>" width="35px" height="35px">
                      &nbsp;<?=$row['user_name']?>
                    </h6>
                    <p><?=$row['reply_comment']?></p>
                    <p class="card-text">
                      <small class="text-muted"><?=$row['reply_timestamp']?></small>
                      <button class="btn btn-link btn-reply-of-reply" type="button">댓글</button>
                      <?php if($this->session->userdata('user_id') == $row['write_user']) : ?>
                        <a class="btn btn-link" href="<?php echo base_url('Reply/delete/'.$row['reply_id'].'/'.$row['plan_date'].'/'.$row['user_id'])?>">삭제</a>
                      <?php endif; ?>
                    </p>
                  </div>
                  <!-- WRITE REPLY OF REPLY -->
                  <div class="r-of-r">
                    <form class="" action="<?=base_url('Reply/add')?>" method="post">
                      <input type="hidden" name="user_id" value="<?=$user_id?>">
                      <input type="hidden" name="write_user" value="<?=$this->session->userdata('user_id')?>">
                      <input type="hidden" name="plan_date" value="<?=$plan_date?>">
                      <input type="hidden" name="up_reply_id" value="<?=$row['reply_id']?>">
                      <input type="hidden" name="up_reply_user" value="<?=$row['write_user']?>">
                      <textarea class="form-control" name="reply_comment" rows="1" placeholder="" style="" required></textarea>
                      <div class="" align="right">
                        <button type="submit" class="btn btn-primary" style="margin-top:0.5em;">대댓글 등록</button>
                      </div>
                    </form>
                  </div>
                </div>
                <?php
              endforeach;
            }
            ?>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
  <script>
  <?php
  foreach ($charts_dates as $k => $row) {
    $chart_date[] = $row['date'];
  }
  foreach ($user_count as $k => $row) {
    $chart_user[] = $row['count'];
  }
  foreach ($maven_count as $k => $row) {
    $chart_maven[] = $row['avg'];
  }
  ?>
  (function() {
    Highcharts.chart('chart-trend', {
      chart: {
      },
      title: {
        text: '스크럼 최근 동향'
      },
      xAxis: {
        categories: [<?php echo join($chart_date, ',') ?>]
      },
      yAxis: {
        title: '완료'
      },
      series: [{
        name: '<?=$user_id?>',
        data: [<?php echo join($chart_user, ',') ?>],
        color: '#7495c6'
      }, {
        name: 'MAVEN 평균',
        data: [<?php echo join($chart_maven, ',') ?>],
        color: '#6536D7'
      }],
      plotOptions: {
        series: {
          marker: {
            fillColor: '#FFFFFF',
            lineWidth: 2,
            lineColor: null // inherit from series
        },
        }
      },
    });
  })();
  </script>
  <script>
  (function() {
    Highcharts.chart('chart-acheivement', {

      chart: {
        polar: true,
        type: 'line'
      },
      title: {
        style: {
          display: 'none'
        }
      },
      xAxis: {
        categories: ['월 출석율', '월 작성률', '댓글 비중', '오늘 완료율', '월평균 완료율'],
        tickmarkPlacement: 'on',
        lineWidth: 0
      },
      yAxis: {
        gridLineInterpolation: 'polygon',
        lineWidth: 0,
        min: 0,
        max: 100
      },
      legend: {
        enabled: false
      },
      exporting: {
        enabled: false
      },
      series: [{
        name: '<?php echo $plans[0]['user_name']?>',
        data: [
          <?php echo $acheivement->att_ratio?>,
          <?php echo $acheivement->write_ratio?>,
          <?php echo $acheivement->reply_ratio?>,
          <?php echo $acheivement->achv_today_ratio?>,
          <?php echo $acheivement->achv_avg_ratio?>
        ],
        pointPlacement: 'on'
    }],
    plotOptions: {
        size: "100%",
        overflow: "none",
        series: {
            overflow: 'none'
        }
    },

    });
  })();
  </script>
  <script>
  $(function() {
    $("#chart-trend").hide();
    $("")
      $(".scrum-items__chart-lists li").click(function() {
          let checkChart = $(this).text();
          $(".scrum-items__chart-lists li").removeClass('is-actived');
          $(this).addClass('is-actived');
          console.log(checkChart);
          if (checkChart == "acheivement") {
              $("#chart-trend").hide();
              $("#chart-acheivement").fadeIn();
          } else if (checkChart == "trend") {
              $("#chart-acheivement").hide();
              $("#chart-trend").fadeIn();
          }
      })
  })
  </script>
  <nav class="navbar navbar-fixed-bottom navbar-light bg-faded" align="right">
    <?php
    if($user_id == $this->session->userdata('user_id')){
      ?>
      <a class="btn btn-primary" href="<?=base_url('Plan/myPlan/'.$plan_date)?>">내 일정관리</a>
      <?php
    }
    ?>
    <a class="btn btn-secondary" href="<?=base_url('Dashboard/'.$plan_date)?>">모두의일정</a>
  </nav>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('.r-of-r').hide();
});
$('.btn-reply-of-reply').click(function() {
  if($(this).parent().parent().siblings('.r-of-r').is(':visible')) {
    $(this).parent().parent().siblings('.r-of-r').hide();
    $(this).html('댓글');
  }else {
    $(this).parent().parent().siblings('.r-of-r').show();
    $(this).html('닫기');
  }
});
</script>
