<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" > -->
  <!-- Launch demo modal
</button> -->

<!-- Modal -->



<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">login to Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="partials/_handelLogin.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="loginemail" class="form-label">Email address</label>
                        <input required type="email" class="form-control" placeholder="examl123@gmail.com" name="email"
                            id="loginemail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="loginpassword" class="form-label">Password</label>
                        <input required type="password" name="password" placeholder="*******" class="form-control" id="loginpassword">
                    </div>
                    <div class="mb-3 form-check">
                        <input checked type="checkbox" class="form-check-input" id="loginexampleCheck1">
                        <label class="form-check-label" for="loginexampleCheck1">Check me out</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>




