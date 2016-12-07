<?php
  class Email extends CI_Controller {
    function __construct() {
      // 부모 클래스의 모든 서비스를 상속받기 위해 부모의 생성자 호출(CI_Controller)
      parent::__construct();
      // CI 이메일 라이브러리를 로딩한 후 객체를 생성
      // $this->mail->메서드명
      // 의 방법으로 호출한다.
      $this->load->library('email');
    }

    // 기본 메서드 index()
    function index() {
      // 라이브러리가 UTF-8 다중 언어 문자열을 처리할 수 있게 하고 HTML 메일 본문 지원
      $config['charset'] = 'utf-8';
      $config['mailtype'] = 'html';

      // initialize 메서드를 호출하여 초기 설정 값을 로딩
      $this->email->initialize($config);

      // 메일 본문을 HTML로 작성하므로 CR/LF를 HTML의 <br>로 치환
      $this->email->set_newline("<br/>");

      // 메일의 요소들을 정의한다.
      $this->email->from('zziller03@gmail.com', 'hwi');
      $this->email->to  (array('"이름1" <richboy817@naver.com>', '"이름2" <zziller03@gmail.com>'));
      $this->email->subject("This is the Subject (UTF-8)");
      $this->email->message('
        <h1>Hello Email!</h1>
        <p>This Email is Test Email</p>
      ');

      // 첨부파일 로드
      $path = $this->doc_root_path();

      $attachment_path1 = $path."/attachments/file1.jpg";
      $attachment_path2 = $path."/attachments/file2.jpg";
      $this->email->attach($attachment_path1);
      $this->email->attach($attachment_path2);

      if($this->email->send()) {
        //성공!
        echo "Your email was sent!";
      }else {
        //에러!
        echo $this->email->print_debugger();
      }
    }
    function doc_root_path() {
      return $doc_root = $_SERVER["DOCUMENT_ROOT"];
    }
  }
 ?>
