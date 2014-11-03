<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 background rounded">
            <div class="row">
                <div class="col-md-12 highlight-background rounded-top">
                    <center>
                        <h3>Login</h1>
                    </center>
                </div>
            </div>
            <form id="login" action="" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="input-sm" for="username">
                                Username
                            </label>
                            <input class="form-control" type="text" name="username" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="input-sm" for="password">
                                Password
                            </label>
                            <input class="form-control" type="password" name="password" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#registerModal">
                                Register
                            </a>
                        </div>
                        <div id="errorMessage" class="col-md-4">

                        </div>
                        <div class="col-md-2 col-md-offset-">
                            <button id="submit" name="submit" type="submit" class="btn btn-default">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="registerUserSuccess"></div>
</div>
