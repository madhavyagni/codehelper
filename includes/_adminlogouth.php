<?php


echo '<div class="modal fade" id="logoutModaladmin" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5>Are you sure?</h5>
      </div>
      <div class="modal-footer">
      <form action="/forum/includes/_adminlogout.php" method="POST">
              <button type="submit" class="btn mb-4 lgnb btn-success">Yes</button>
      </form>
        
      </div>
    </div>
  </div>
</div>';

