<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JYK ReplyTest</title>
    <style>
      .reply {
        background-color: red;
        opacity: 0.2;
        transition: 1s;
      }
    </style>
  </head>
  <body>

    <input id="reply_elem" type="text"></input>
    <button id="reply_button_elem"></button>

    <div class="reply_container">

    </div>

    <script>
      const trElem = document.querySelector("#reply_elem");
      const btElem = document.querySelector("#reply_button_elem");
      const replyContainerElem = document.querySelector(".reply_container");

      btElem.onclick = function() {
        let httpRequest = new XMLHttpRequest();
        let inputText = trElem.value;
        httpRequest.onreadystatechange = function() {
          if(httpRequest.readyState !== XMLHttpRequest.DONE) return;
          if(httpRequest.status !== 200) return;

          let response = JSON.parse(httpRequest.responseText);

          let replyElem = document.createElement("div");

          replyElem.innerText = response.content;
          replyElem.classList.add("reply");
          replyContainerElem.prepend(replyElem);
          replyElem.offsetWidth = replyElem.offsetWidth;
          replyElem.style.opacity = "1";

        };
        httpRequest.open("post", "replytestcontrol.php");
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send("content=" + encodeURIComponent(inputText));
      }
    </script>
  </body>
</html>
