<style>
  .modal-body p {
    padding: 0.5em;
  }
  /* .card-light {
    background-color: #eeeff0;
    border-color: #f0ad4e;
  }
  .btn .btn-transparent{
    background-color: transparent;
  }
  .card-title {
    font-size: 1.5em;
    margin-bottom: 0.75rem;
  }
  .card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #f7f7f9;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
  }

  .card {
    position: relative;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    background-color: #fff;

  }
  .card-img-top {
    border-top-right-radius: calc(0.25rem - 1px);
    border-top-left-radius: calc(0.25rem - 1px);
    max-width: 100%;
    max-height: 100%;
    object-fit:contain;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  @media (min-width: 576px) {
  }
  

  @media (min-width: 576px) {
  } */
  .card {
  max-width: 300px;
  width: 20em;
  height: 15em;
  margin: 2em auto;
  display: flex;
  flex-direction: column;
}

.card .card-content {
  position: relative;
  overflow: hidden;
  width: 100%;
  height: 100%;

  background-color: #fff;
  color: #000;
}

.card .card-content img {
  height: 100%;
  width: 100%;
  object-fit: contain;

  margin : auto auto;
  z-index: 10;
}

.card-content .sub {
  position: absolute;
  bottom: 0;
  width: 100%;
  font-weight: bold;
  font-size: 1.5em;
  text-align: center;
  color: #fff;
  background: linear-gradient(transparent, #1c1c1cf0);
  padding: 1em;
  z-index: 20;
}

.card-content .sup {
  position: absolute;
  top: 0;
  width: 100%;
  text-align: center;
  background: linear-gradient(#1c1c1cf0, transparent);
  padding: 1em;
  z-index: 20;
}

.card-container{
  align-content: center;
  justify-content: center;
  display: flex;
  flex-flow: row;
  flex-wrap: wrap;
  margin-left: auto;
  margin-right: auto;
}
</style>
<section>
  <div class="container" style="padding:5em">
    <h1 class="text-center"> Blogs </h1>
    <div class="card-container" id="posts">
    </div>
</section>
<script>
  var posts

  function loadPosts() {
    const HTTPRequest = new XMLHttpRequest();
    HTTPRequest.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        posts = HTTPRequest.response.posts
        displayList()
      }
    }
    HTTPRequest.open('GET', 'https://public-api.wordpress.com/rest/v1.1/sites/learnatintellify.wordpress.com/posts/', true);
    HTTPRequest.responseType = "json"
    HTTPRequest.send();
  }

  function displayList() {
    var html = ""
    posts.forEach(post => {
      html += `
              <div style="padding:1em">
                <a href="<?php echo base_url().'blog/post/'?>${post.ID}">
                  <div class="card" id="postCard-${post.ID}">
                      <div class="card-content">
                        <div class="sub">${post.title}</div>
                        <img src="" id="postImg-${post.ID}">
                      </div>
                  </div>
                </a>
              </div>
              <div class="modal" id="post-${post.ID}">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">${post.title}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <div class="row" id="postModal-${post.ID}">
                        ${post.content}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              `
    })
    document.getElementById("posts").innerHTML += html
    putImages();
  }

  function putImages(){
    document.querySelectorAll('[id|="postModal"]').forEach(modal=>{
      if(modal.querySelectorAll(".wp-block-image").length){
        document.getElementById("postImg-"+modal.getAttribute("id").split('-')[1]).setAttribute("src",modal.querySelectorAll(".wp-block-image")[1].querySelectorAll("img")[0].getAttribute("src")); 
        // LOOOOOOOOLLLLLLLLLLLLLLLLL    
      } else {
        document.getElementById("postImg-"+modal.getAttribute("id").split('-')[1]).setAttribute("src", "http://www.intellify.in/images/logo-new.png")
      }

      })
  }

  window.onload = loadPosts
</script>