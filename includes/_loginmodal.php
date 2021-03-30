<?php

$actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

echo '<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/forum/includes/_loginhandle.php?c='.$actual_link.'" method="POST">
      <div class="form-group">
          <label for="Email1">Email address</label>
          <input type="email" class="form-control" id="Email" name="email" aria-describedby="emailHelp">
         
      </div>
      <div class="form-group">
          <label for="Password1">Password</label>
          <input type="password" class="form-control" name="password" id="Password">
      </div>
      
      <button type="submit" name="lgsub" class="btn mb-4 lgnb btn-success">Login</button>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn lgnb btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>';

