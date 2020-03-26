<style>
p{
    padding: 0.5em;
}
figure{
    padding: 0.7em;
    text-align : center;
}
h1{
    padding: 1em;
    text-align: center;
}
</style>
<section>
  <div class="container">
    <div class="column" id="post">
      
    </div>
  </div>
  <div style="padding:2em"></div>
</section>

<script>
    function loadPost() {
    const HTTPRequest = new XMLHttpRequest();
    var post;
    HTTPRequest.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        post = HTTPRequest.response
        putContent(post)
      }
    }
    HTTPRequest.open('GET', 'https://public-api.wordpress.com/rest/v1.1/sites/learnatintellify.wordpress.com/posts/<?php echo $postId?>', true);
    HTTPRequest.responseType = "json"
    HTTPRequest.send();
  }
  function putContent(post){
      var html = `
                    <h1>${post.title}</h1>
                    <div>${post.content}</div>
                `
    document.getElementById("post").innerHTML = html;
  }
  window.onload = loadPost
</script>