<?php

$actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

echo '<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action="/forum/includes/_signuphandle.php?c='.$actual_link.'" method="POST">
                <div class="form-group">
                    <label for="Email1">Email address</label>
                    <input type="email" class="form-control" id="Email" name="email" aria-describedby="emailHelp">
                   
                </div>
                <div class="form-group">
                <label for="Email1">user name</label>
                <input type="text" class="form-control" id="username" name="username">
               
            </div>
                <div class="form-group">
                    <label for="Password1">Password</label>
                    <input type="password" class="form-control" name="password1" id="Password1">
                </div>
                <div class="form-group">
                    <label for="Password2">Confirm Password</label>
                    <input type="password" class="form-control" name="password2" id="Password2">
                </div>
                
                <button type="submit" class="btn mb-4 lgnb btn-success">Signup</button>
            </form>


        </div>
        <div class="modal-footer">
        <button type="button" class="btn lgnb btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
</div>';



