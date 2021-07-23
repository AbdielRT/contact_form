<?php
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if($status == 'success'){ ?>
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Well done!</strong> Your message was sent.
        </div>

<?php
    }
}
?>

<div class="row justify-content-center">
    <div class="col-sm-8 col-md-6 col-lg-6">
        <form action="mailSender.php" method="post" data-bitwarden-watching="1">
            <fieldset>
                <legend>Send us a message</legend>
                
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
                    <input type="text" class="form-control" name="lastName" id="inputLastName" placeholder="Last Name">
                </div>

                <div class="form-group has-success has-danger">
                    <label for="InputEmail1" class="form-label mt-4">Your email address</label>
                    <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="mail@example.com" name="email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    <div class="invalid-feedback">Oh snap! Verify your email address.</div>
                </div>
                <div class="form-group has-success has-danger">
                    <label for="InputEmail2" class="form-label mt-4">Confirm email address</label>
                    <input type="email" class="form-control" id="email2" aria-describedby="emailHelp" placeholder="mail@example.com" name="emailConfirmation" required>
                    <div class="invalid-feedback">Heads up! Email addresses do not match.</div>
                </div>

                <div class="form-group">
                    <label for="msg" class="form-label mt-4">Message</label>
                    <textarea class="form-control" id="msg" rows="4" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>    
            </fieldset>
        </form>
    </div>
</div>



<div class="modal" id='modalBox'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>We'll get back in touch soon.</p>
      </div>
    </div>
  </div>
</div>


