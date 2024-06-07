<?php
  session_start();
  $name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/x-icon" href="../ASSETS/cat.png" />
  <link rel="stylesheet" href="../CSS/socket.css">
  <title>Chating</title>
</head>
<body>
<div class="box">
  <div class="container">
    <div class="title">
      <h1>CHATTING</h1>
    </div>
    <div class="chat-box" id="chatBox"></div>
      <div class="input-container">
        <input type="text" id="messageInput" placeholder="메세지를 입력하세요">
        <button id="sendButton">SEND</button>
      </div>
  </div>
  <div class="tab-container">
    <div class="tab">
      <a href="#" onclick="changeServer('ws://121.139.20.242:4441')">main1-1</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4441')">main1-2</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4442')">main2-1</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4442')">main2-2</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4443')">main3-1</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4443')">main3-2</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4445')">main5-1</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4445')">main5-2</a>
    </div>
    <div class="tab">
      <a href="#" onclick="changeServer('ws://121.139.20.242:4446')">main6-1</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4446')">main6-2</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4447')">main7-1</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4447')">main7-2</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4448')">main8-1</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4448')">main8-2</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4449')">main9-1</a>
      <a href="#" onclick="changeServer('ws://121.139.20.242:4449')">main9-2</a>
    </div>
  </div>
</div>
<script>
  const username = "<?php echo $name;?>";
  let serverid = "socket1";
  let socket = new WebSocket('ws://121.139.20.242:4441');

  socket.addEventListener('open', (event) => {
    console.log('WebSocket 연결 성공');
    const data = {
      message: `${serverid} 서버에 ${username}님 연결됨`
    };  
    const jsonData = JSON.stringify(data.message);
    socket.send(jsonData);
  });

  socket.addEventListener('close', (event) => {
    console.log('WebSocket 연결 종료');
  });

  window.addEventListener('beforeunload', () => {
    const data = {
      message: `${serverid} 서버에 ${username}님 연결 끊김.`
    };
    const jsonData = JSON.stringify(data.message);
    socket.send(jsonData);
    socket.close();
  });

  socket.addEventListener('message', (event) => { // 메시지 수신 시 트리거
    // console.log('메시지 수신:', event.data); 
    // JSON 문자열을 파싱하여 데이터 추출
    const messageData = JSON.parse(event.data);
    const senderName = messageData.name;
    const socket_serverid = messageData.sid;
    const message = messageData.message;

    if (socket_serverid == serverid) {
      // 이름과 대화 내용 출력
      if (senderName === "admin") {
      displayMessage(`[공지] ${message}`);
      } else {
        displayMessage(`${senderName} : ${message}`);
      }
    }
  });

  function sendMessage() { // 메시지 보내는 함수
    const messageInput = document.getElementById('messageInput');
    const message = messageInput.value;
    if (message) {
      const data = {
        name: username, // PHP로부터 받은 이름 사용
        sid : serverid,
        message: message
      };
      const jsonData = JSON.stringify(data);
      socket.send(jsonData);

      // 메시지 표시
      displayMessage(`${username} : ${message}`);

      // 입력 필드 초기화
      messageInput.value = '';
    }
  }

  // Enter 키로 메시지 보내기 가능하게 함
  document.getElementById('messageInput').addEventListener('keydown', function(event) {
    if (event.keyCode === 13) { // Enter 키 눌렀을 때
      sendMessage();
    }
  });

  function displayMessage(message) {
    const chatBox = document.getElementById('chatBox');
    const messageElement = document.createElement('div');
    messageElement.innerText = message;
    chatBox.appendChild(messageElement);
    chatBox.scrollTop = chatBox.scrollHeight;
  }

  if (!username) {
    window.location.replace('index.php');
  }

  if (!username) {
    alert('로그인을 해주세요');
    window.location.replace('../index.php');
  }

  function changeServer(newServerAddress) {
    socket.close();
    socket = new WebSocket(newServerAddress);
    console.log(`서버 변경: ${newServerAddress}`);
  }
</script>
</body>
</html>