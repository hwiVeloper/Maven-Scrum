<!--
#################### SOURCE CODE INFORMATION ####################
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
#################################################################
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
    margin-top: 0em;
  }

  .container-fluid {
    padding-top: 3em;
  }
  @media (max-width:576px){
    .page-header {
      width: 85%;
    }
  }

  .st-red {
    color: #d9534f;
  }

  .timeline > li > .timeline-badge {
      padding-top: 1rem;
  }
</style>
<div class="container">
  <!-- PAGE TITLE AREA -->
  <div class="page-header">
    <i class="fa fa-github" aria-hidden="true"></i><a href="https://www.github.com/devhwi/Maven-Scrum" target="_blank"> Go to github repository</a>
    <h2 id="dev-note">개발자 노트</h2>
    <div class="content-divider"></div>
  </div>
  <!-- TIMELINE AREA -->
  <ul class="timeline" style="padding-top:6em;">
    <li id="20170401">
      <div class="timeline-badge danger"><i class="fa fa-microphone" aria-hidden="true"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">출석체크 및 포인트 구현</h4>
          <p><small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; 2017. 04. 01</small></p>
        </div>
        <div class="timeline-body">
          <p style="text-align:justify;">안녕하세요. 이종휘입니다.</p>
          <p style="text-align:justify;">
            - 시작일 : 2017년 04월 01일 <br>
            - 목적 : 데일리 스크럼 활성화 <br>
            - 내용 일 1회 데일리 스크럼 접속 및 로그인 시 포인트 획득(알림창으로 확인) <br>
            &nbsp;&nbsp;포인트 산정 기준 월 단위로 산정이 되며, 실시간 확인 가능하고 월말에는 합산하여 순위가 나눠집니다.<br> 
            &nbsp;&nbsp;출석 (10) | 스크럼 작성 (10) | 댓글(1) - 랭킹 기준 출석, 스크럼 작성, 댓글 기준 포인트를 모두 종합하여 월말마다 산정합니다. <br>
            &nbsp;&nbsp;누적(연도별)랭킹 역시 연말에 산정하겠습니다. <br>
            - 보상 세 가지 부문으로 나누어 보상을 드리겠습니다. <br>
            &nbsp;&nbsp;월말 종합 포인트<br>
            &nbsp;&nbsp;&nbsp;&nbsp;* 1위: (가까운 나눔의 장 회비 면제)<br>
            &nbsp;&nbsp;&nbsp;&nbsp;* 2위: (가까운 나눔의 장 회비 50% 면제)<br>
            &nbsp;&nbsp;월말 스크럼 작성<br>
            &nbsp;&nbsp;&nbsp;&nbsp;* 1위: (가까운 나눔의 장 회비 면제) <br>
            &nbsp;&nbsp;월말 댓글 작성(자기글 댓글은 포인트 제외입니다.)<br>
            &nbsp;&nbsp;&nbsp;&nbsp;* 1위 (가까운 나눔의 장 회비 50% 면제)  <br>
            &nbsp;&nbsp;스크럼, 댓글 순위가 동률인 경우 (출석률, 월플랜완료율) 등으로 산정하겠습니다.
          </p>
        </div>
      </div>
    </li>
    <li id="20170309" class="timeline-inverted">
      <div class="timeline-badge info"><i class="fa fa-commenting" aria-hidden="true"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">건의사항 반영</h4>
          <p><small class="text-muted"><i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp; 2017. 03. 20</small></p>
        </div>
        <div class="timeline-body">
          <p style="text-align:justify">
            건의사항 3건이 반영되었습니다.
          </p>
          <p style="text-align:justify">
            - 일정 상세보기 -> 대댓글 구현<br>
            - 내정보 -> 프로필 사진 수정 (정방형으로 업로드 권장)<br>
            - 알림 클릭 시, 관련 알림 모두 체크.
          </p>
          <p>
            사용 중 오류가 있다면 언제든 말씀해주세요 :)
          </p>
        </div>
      </div>
    </li>
    <li id="20170119">
      <div class="timeline-badge danger"><i class="fa fa-microphone" aria-hidden="true"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">건의사항 업데이트 예정일</h4>
          <p><small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; 2017. 01. 19</small></p>
        </div>
        <div class="timeline-body">
          <p style="text-align:justify;">안녕하세요. 이종휘입니다.</p>
          <p style="text-align:justify;">
            계속해서 남겨주시는 건의사항은 잘 보고 있습니다.<br>
            건의사항들은 한 번에 검토 후에 봄꽃이 나올 준비를 하는 3월에 일괄 개발하겠습니다.<br>
            그 때까지 알찬 의견들 지속적으로 남겨주시면 감사하겠습니다.
          </p>
        </div>
      </div>
    </li>
    <li id="20170109" class="timeline-inverted">
      <div class="timeline-badge danger"><i class="fa fa-microphone" aria-hidden="true"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">달력보기 - 월별 일정 리스트</h4>
          <p><small class="text-muted"><i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp; 2017. 01. 09</small></p>
        </div>
        <div class="timeline-body">
          <p style="text-align:justify">달력보기 메뉴에 탭이 추가되었습니다. 기존의 달력형식 view와 목록형의 view로 자신의 일정을 관리하는 것이 더 편해졌습니다.</p>
          <p>감사합니다.</p>
        </div>
      </div>
    </li>
    <li id="20170106">
      <div class="timeline-badge info"><i class="fa fa-commenting" aria-hidden="true"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">댓글 알림 기능 추가 및 UI 유지 보수</h4>
          <p><small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; 2017. 01. 06</small></p>
        </div>
        <div class="timeline-body">
          <p style="text-align:justify;">댓글 알림 기능이 추가 되었습니다. 우측 상단 로그인 정보 옆에서 확인 가능하고, 알림 클릭 시에는 해당 일정 뷰로 넘어가게 됩니다. 알림 기능은 추후 계속 추가하도록 노력하겠습니다.</p>
          <p style="text-align:justify;">UI 유지보수는 <a href="https://www.github.com/ruden91" target="_blank">박경두</a>가 조금씩 수정해나가고 있습니다. 앞으로 수고해 줄 경두에게 응원 부탁드립니다.</p>
        </div>
      </div>
    </li>
    <li id="20170102" class="timeline-inverted">
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
