<div class="modal fade" id="contact" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="contact" class="form-horizontal">
          <div class="modal-header">
            <h4>Contact Me</h4>
          </div>
          <div class="modal-body">
            <div id="sending"><img src="<?php echo BASE_URL;?>assets/img/misc/sending.gif"><br> Please Wait...</div>
            <div id="response" class="alert alert-success alert-block"></div>
            <div id="error" class="alert alert-danger alertme-block"></div>
            <div id="hideme">
            <div class="form-group">
              <label for="contact-name" class="col-lg-2">Name:</label>
              <div class="col-lg-10">
                <input name="contact-name" type="text" class="form-control" id="contact-name" placeholder="Full Name">
              </div>
            </div>

            <div class="form-group">
              <label for="contact-email" class="col-lg-2">Email:</label>
              <div class="col-lg-10">
                <input name="contact-email" type="email" class="form-control" id="contact-email" placeholder="example@email.com">
              </div>
            </div>


            <div class="form-group">
              <label for="contact-message" class="col-lg-2">Message:</label>
              <div class="col-lg-10">
                <textarea name="contact-message" id="contact-message" class="form-control" rows="8"></textarea>
              </div>
            </div>
          </div>
          </div>
          <div class="modal-footer">
        </form>
          <a class="btn btn-danger" data-dismiss ="modal">Close</a>
          <button class="btn btn-primary" type="submit" id="contact-form">
            Send Message!
          </button>
        </div>
      </div>
    </div>
  </div>