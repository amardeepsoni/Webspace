<style>
  .know {
    margin: 5%;
  }

  li {
    font-size: 15px;
  }
</style>
<section class="know">
  <div class="container">
    <div class="column">
      <div class="row-sm-5">
        <div class="video-block">

          <h1>Coming soon </h1>
          <br>

          <form action = "<?php echo base_url().'Mail/send'?>" >
            <div class="form-group">
              <label for="To">To</label>
              <input type="email" class="form-control" id="To" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">

              <label for="Subject">Subject</label>
              <input type="text" class="form-control" id="Subject" placeholder="Subject">
            </div>
            <div class="form-group">
              <textarea class="form-control" id = "message" placeholder="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
      <div class="row-sm-7" style='padding-top: 5%'>
      </div>

    </div>
  </div>
</section>