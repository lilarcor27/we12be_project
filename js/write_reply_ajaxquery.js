(function() {

  const replySubmitButtonElem = document.querySelector("#reply_submit");
  const replyNicknameElem = document.querySelector("#reply_nickname");
  const replyPasswordElem = document.querySelector("#reply_password");
  const replyContentElem = document.querySelector("#reply_content");


  replySubmitButtonElem.onclick = function() {
    if(
      !replyNicknameElem.value ||
      !replyPasswordElem.value ||
      !replyContentElem.value
    ) return alert("you need to fill all of them.");

    replySubmitButtonElem.disabled = true;
    let httpRequest = new XMLHttpRequest();

    httpRequest.onreadystatechange = function() {
      if(httpRequest.readyState !== XMLHttpRequest.DONE) return;
      if(httpRequest.status !== 200) return;

      let response = JSON.parse(httpRequest.responseText);

      if(response.result === "100") {
        makeReplyWrapper(replyNicknameElem.value, replyContentElem.value, response.date, response.replynum);
      } else {
        alert("failed to write reply.");
      }

      replyNicknameElem.value = "";
      replyPasswordElem.value = "";
      replyContentElem.value = "";
      replySubmitButtonElem.disabled = false;
    };

    httpRequest.open("post", "php/reply_write.php");
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send(
      "nickname=" + encodeURIComponent(replyNicknameElem.value) +
      "&password=" + encodeURIComponent(replyPasswordElem.value) +
      "&content=" + encodeURIComponent(replyContentElem.value) +
      "&pname=" + document.querySelector(".board").getAttribute("id")
    );
  }


function makeReplyWrapper(nickname, content, date, replynum) {
  const div_container = document.querySelector(".reply_container");
  let div_wrapper = document.createElement("div");
  let div_nickname = document.createElement("div");
  let div_content = document.createElement("div");
  let div_date = document.createElement("div");
  let div_delete = document.createElement("div");

  div_wrapper.classList.add("reply_wrapper");
  div_nickname.classList.add("reply_nickname");
  div_content.classList.add("reply_content");
  div_date.classList.add("reply_date");
  div_delete.classList.add("reply_delete");

  div_wrapper.dataset.replynum = replynum;
  div_nickname.innerText = nickname;
  div_content.innerHTML = "<h1>" + content + "</h1>";
  div_date.innerHTML = "<h1>" + new Date(1000*date) + "</h1>";
  div_delete.innerText = "X";

  div_wrapper.appendChild(div_nickname);
  div_wrapper.appendChild(div_content);
  div_wrapper.appendChild(div_date);
  div_wrapper.appendChild(div_delete);

  div_container.prepend(div_wrapper);

  div_wrapper.offsetWidth = div_wrapper.offsetWidth;
  div_wrapper.style.opacity = "1";
}

})();

// <input type="hidden" id="pname_reply" name="pname" value="something">
// 얘를 반드시 보내줘야 함
// 요구하는 자료
// $nickname = (isset($_POST["nickname"])) ? $_POST["nickname"] : null;
// $password = (isset($_POST["password"])) ? $_POST["password"] : null;
// $content = (isset($_POST["content"])) ? $_POST["content"] : null;
// $pname = (isset($_POST["pname"])) ? $_POST["pname"] : null;
