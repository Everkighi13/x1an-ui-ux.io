<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 이메일 설정
    $to = "everkighi13@gmail.com"; // 수신할 이메일 주소
    $subject = "New Contact Form Submission";

    // 입력값 정리
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // 이메일 본문
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // 이메일 헤더
    $headers = "From: $name <$email>\r\n";

    // 메일 전송
    if (mail($to, $subject, $body, $headers)) {
        // 성공적으로 전송된 경우
        echo "Thank you for contacting us, $name. We will get back to you soon.";
    } else {
        // 전송 실패 시
        echo "Sorry, there was an error sending your message.";
    }
} else {
    echo "Invalid request.";
}
?>
