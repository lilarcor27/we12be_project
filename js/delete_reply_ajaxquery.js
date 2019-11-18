(function (){

  const pwinputElem = document.querySelector("#reply_delete_pwcheck");
  const submitButtonElem = document.querySelector("#reply_delete_button");
  let replyNum = null;

  submitButtonElem.onclick = function() {
    document.querySelector(".form_delete_container").classList.remove("appear");
    if(!pwinputElem.value)
      return alert("you need to fill your form.");

    let httpRequest = new XMLHttpRequest();
    replyNum = document.querySelector(".form_delete_container").dataset.replynum;
    httpRequest.onreadystatechange = function() {
      if(httpRequest.readyState !== XMLHttpRequest.DONE) return;
      if(httpRequest.status !== 200) return;

      let response = JSON.parse(httpRequest.responseText);

      if(response.result !== 100)
        return alert("failed to delete reply.");

      const allReplyElem = document.querySelectorAll(".reply_wrapper");
      let targetElem = null;
      for(let i = 0; i < allReplyElem.length; i++) {
        if(allReplyElem[i].dataset.replynum == replyNum) {
          targetElem = allReplyElem[i];
          break;
        }
      }

      targetElem.remove();
    };

    httpRequest.open("post", "php/reply_delete.php");
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send(
      "pname=" + document.querySelector(".board").getAttribute("id") +
      "&reply_num=" + replyNum +
      "&pw_check=" + pwinputElem.value
    );
  };





})();

// <input type="hidden" id="pname_delete" name="pname" value="something">
// <input type="hidden" id="form_replyid" name="reply_id" value="0">
// pw-CHECK 이렇게 총 4개가필요한것같다.

// 1. page.js에서 input value 채워주는거 주석처리
// 2. page.js에서 삭제 누르면 replyid value 채워주는거 바꿔주기 - dataset으로 처리
// 3.
