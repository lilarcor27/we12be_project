<!DOCTYPE html>
<?php

  $content = (isset($_POST["content"])) ? $_POST["content"] . " / success" : "fail";
  $myarray = ["content" => $content];
  echo json_encode($myarray);
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JYK ReplyTest</title>
  </head>
  <body>

    <textarea id="reply_elem" name="reply" rows="8" cols="80"></textarea>
    <button id="reply_button_elem"></button>

    <script>
      const trElem = document.querySelector("#reply_elem");
      const btElem = document.querySelector("#reply_button_elem");

      btElem.onclick = function() {
        let httpRequest = new XMLHttpRequest();
        let inputText = trElem.innerText;
        httpRequest.onreadystatechange = function() {
          if(httpRequest.readyState !== XMLHttpRequest.DONE) return;
          if(httpRequest.status !== 200) return;

          let response = JSON.parse(httpRequest.responseText);

          if(response.content === "fail") {
            alert("fail")
          } else {
            alert(response.content);
          }

        };
        httpRequest.open("post", "replytest.php");
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send("content=" + encodeURIComponent(inputText));
      }
    </script>
  </body>
</html>
