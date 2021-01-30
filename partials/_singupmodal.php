<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#singupModal">
  Launch demo modal
</button> -->

<!-- Modal -->



<div class="modal fade" id="singupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Singup to iForum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="partials/_handelSigup.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="signupname" class="form-label">Your name</label>
                        <input required type="name" name="name" class="form-control" placeholder="examl name" id="signupname"
                            aria-describedby="nameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="signupemail" class="form-label">Email address</label>
                        <input required type="email" class="form-control" placeholder="examl123@gmail.com" name="email"
                            id="signupemail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="signuppassword" class="form-label">Password</label>
                        <input required type="password" name="password" placeholder="*******" class="form-control" id="signuppassword">
                    </div>
                    <div class="mb-3">
                        <label for="signupcPassword" class="form-label">Cunfirme Password</label>
                        <input required type="password" name="cPassword" placeholder="*******" class="form-control"
                            id="signupcPassword">
                    </div>
                    <div class="mb-3 form-check">
                        <input required type="checkbox" name="check" class="form-check-input" id="sgnupExampleCheck1" checked>
                        <label class="form-check-label" for="sgnupExampleCheck1">Check me out</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Singup</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>