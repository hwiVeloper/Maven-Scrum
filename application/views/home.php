<!--
############# SOURCE CODE INFORMATION #############
.timeline-badge
  primary - blue
  success - green
  warning - yellow
  info    - skyblue
  danger  - red
  nothing - gray

.timeline                    => left side
.timeline .timeline-inverted => right side

fa icon
calendar - <i class="fa fa-calendar" aria-hidden="true"></i>
microphone - <i class="fa fa-microphone" aria-hidden="true"></i>
code - <i class="fa fa-code" aria-hidden="true"></i>
commenting - <i class="fa fa-commenting" aria-hidden="true"></i>
###################################################
-->
<style media="screen">
  .content-divider {
    border: 1px solid #eee;
  }

  h2 {
    margin-top: 0.25em;
    margin-bottom: 0.25em;
  }

  .page-header {
    position: fixed;
    box-sizing: inherit;
    width: inherit;
    display: inline-block;
    z-index: 1000;
    background-color: #fff;
    padding-right: 0;
    padding-left: 0;
    margin-top: -0.3rem;
  }
  @media (max-width:576px){
    .page-header {
      width: 85%;
    }
  }

  .st-red {
    color: #d9534f;
  }
</style>
<div class="container">
  <!-- PAGE TITLE AREA -->
  <div class="page-header">
    <i class="fa fa-github" aria-hidden="true"></i><a href="https://www.github.com/devhwi/Maven-Scrum"> Go to github repository</a>
    <h2 id="dev-note">개발자 노트</h2>
    <div class="content-divider"></div>
  </div>
  <!-- TIMELINE AREA -->
  <ul class="timeline" style="padding-top:6em;">
    <li class="timeline-inverted">
      <div class="timeline-badge danger"><i class="fa fa-microphone" aria-hidden="true"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">건의사항 한줄메모 신설</h4>
          <p><small class="text-muted"><i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp; 2017. 01. 02</small></p>
        </div>
        <div class="timeline-body">
          <p style="text-align:justify">건의사항 한줄메모 게시판이 생성되었습니다. 불편한 점과 개선하면 좋겠다 라는 점을 언제든지 적어주시면 검토 후 반영하도록 노력하겠습니다.</p>
          <p>감사합니다.</p>
          <p><a href="<?php echo base_url('Suggestions')?>">건의하러 가기</a></p>
        </div>
      </div>
    </li>
    <li id="20161230">
      <div class="timeline-badge danger"><i class="fa fa-microphone" aria-hidden="true"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">새로운 데일리 스크럼 구축</h4>
          <p><small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; 2016. 12. 30</small></p>
        </div>
        <div class="timeline-body">
          <p>안녕하세요? 이번에 데일리 스크럼 구축을 맡은 이종휘입니다.</p>
          <p style="text-align:justify;">구글 스프레드시트를 벗어나 웹으로 구현한 데일리 스크럼입니다.
             모바일에서 구글 문서 사용이 다소 불편하다고 생각되어 만들게 되었는데요, php의 프레임워크를 이번에 처음 사용하면서 배운 것이 많고 재밌는 프로젝트가 되었습니다.
             앞으로 모두의 제안으로 다양한 기능이 추가될 예정이니, <strong class="st-red">불편한 점</strong>이나 <strong class="st-red">추가되었으면 하는 기능</strong>을 말씀해 주신다면 적극 검토 후 반영하도록 노력하겠습니다.</p>
          <p>감사합니다 :)</p>
        </div>
      </div>
    </li>
  </ul>
</div>
