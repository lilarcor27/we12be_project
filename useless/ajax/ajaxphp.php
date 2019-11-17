<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<button id="asdf">asdf</button>

<script>
const asdfElem = document.querySelector("#asdf");

asdfElem.addEventListener("click", function() {
	let httpRequest = new XMLHttpRequest();

	httpRequest.onreadystatechange = function() {
		try {
			if(httpRequest.readyState === XMLHttpRequest.DONE) {
				if(httpRequest.status === 200)
					alert(httpRequest.responseText);
				else
					alert(httpRequest.status);
			}
		} catch(e) {
			console.log(e);
		}
	}
	httpRequest.open("post", "test.php", true);
	httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	//httpRequest.send("name=" + encodeURIComponent("junyeongko"));
	httpRequest.send("name=" + "junyeongko");
});
</script>

</body>
</html>
