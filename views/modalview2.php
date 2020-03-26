<!-- Trigger the modal with a button -->

<?php $img = is_null($popup['image']) ? 'style="display:none;" ' : ''; ?>

<style>
  #popupimg {
    width: 100%;
    <?php echo $img ?>
  }

  @media screen and (max-width : 481px) {
    #popupimg {
      width: 88vw;
      <?php echo $img ?>
    }
  }
</style>

<?php $dis = is_null($popup) ? "disabled" : ""; ?>

<button <?php echo $dis ?> type="button" style="display:none;" id="myButton" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="text-transform:uppercase" class="modal-title"><?php echo $popup['heading'] ?></h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <img id="popupimg" style="width:100%" src="<?php echo $popup['image'] ?>" />
      </div>
      <div class="modal-body">
        <p><?php echo $popup['text'] ?> </p>
      </div>
      <div class="modal-header">
        <button id="close" type="button" style="display:none" class="btn btn-default" data-dismiss="modal">Close</button>
        <a class="btn btn-info" onclick="closemodal()">Mark as read</a>
        <a href="<?php echo $popup['hyperlink'] ?>" onclick="closemodal();" target="_blank" class="btn btn-info"><?php echo $popup['action'] ?></a>
      </div>
    </div>

  </div>
</div>

<script>
  

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return false;
  }

  
function showModal(){
  console.log("show modal calleed");
  console.log( "cookie is  " + getCookie("MarkAsRead"));
 
    if (!getCookie("MarkAsRead")) {
        document.getElementById('myButton').click();
        console.log("loaded modal");
      } else {
        console.log(3);
        console.log("loading skipped cz cookie exists");
      }
  }

  function closemodal() {

    var path = window.location.pathname + "";
    console.log(path);
    if (!getCookie("MarkAsRead")) {
      document.cookie = "MarkAsRead=true; expires=Fri, 31 Dec 2100; path=" + path + ";";

    }
    document.getElementById('close').click();
    console.log("cliicked close;");
  }

  window.onload = function() {
    
    console.log("loaded");

    console.log("OnLoad");
    var path = window.location.pathname + "";
    console.log(path);

    var currentID = <?php echo $popup['id'] ?>;
    var last = getCookie("LastId");
    console.log(last);
    console.log(currentID);


    if (last == false){
      console.log("Inside false if");
      document.cookie = "MarkAsRead=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=" + path + ";";
      
      console.log( "cookie after deleting 1   " + getCookie("MarkAsRead"));

      showModal();
      document.cookie = "LastId=<?php echo $popup['id']?>; expires=Fri, 31 Dec 2100; path=" + path + ";";
      }

    else if (last == currentID) {
      showModal();
    } 
    
    else
      {
        document.cookie = "MarkAsRead=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=" + path + ";";
      console.log( "cookie after deleting 2   " + getCookie("MarkAsRead"));

        showModal();
      }

  };

</script>
