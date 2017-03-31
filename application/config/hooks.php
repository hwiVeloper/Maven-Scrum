<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

/*
| -------------------------------------------------------------------------
| Hook point 정의
| -------------------------------------------------------------------------
| pre_system 시스템 작동초기입니다.벤치마크와 후킹클래스들만 로드된 상태로서, 라우팅을 비롯한 어떤 다른 프로세스도 진행되지않은 상태입니다.
| pre_controller 컨트롤러가 호출되기 직전입니다. 모든 기반클래스(base classes), 라우팅 그리고 보안점검이 완료된 상태입니다.
| post_controller_constructor 컨트롤러가 인스턴스화 된 직후입니다.즉 사용준비가 완료된 상태가 되겠죠. 하지만, 인스턴스화 된 후 메소드들이 호출되기 직전입니다.
| post_controller 컨트롤러가 완전히 수행된 직후입니다.
| display_override _display() 함수를 재정의 합니다.최종적으로 브라우저에 페이지를 전송할 때 사용됩니다. 이로서 당신만의 표시 방법( display methodology)을사용할 수 있습니다. 주의 : CI 부모객체(superobject)를 $this->CI =& get_instance() 로 호출하여 사용한 후에 최종데이터 작성은 $this->CI->output->get_output() 함수를 호출하여 할 수 있습니다.
| cache_override 출력라이브러리(Output Library) 에 있는 _display_cache() 함수 대신 당신의 스크립트를 호출할 수 있도록 해줍니다. 이로서 당신만의 캐시 표시 메커니즘(cache display mechanism)을 적용할 수 있습니다.
| post_system 최종 렌더링 페이지가 브라우저로 보내진후에 호출됩니다.
*/

$hook['post_controller_constructor'] = array(
  'class'    => 'Point',
  'function' => 'index',
  'filename' => 'Point.php',
  'filepath' => 'hooks',
  'params'   => ''
);

$hook['post_controller'] = array(
  'class'    => 'Attendance',
  'function' => 'index',
  'filename' => 'Attendance.php',
  'filepath' => 'hooks',
  'params'   => ''
);