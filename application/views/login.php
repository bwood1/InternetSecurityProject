<br><br>
<div class="center-block">
    <form id="form_id" action="index.html" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">Username</span>
                        <input class="form-control" type="text" name="username" value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">Password</span>
                        <input class="form-control" type="password" name="password" value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1">
                    <a href="#">Register</a>
                </div>
                <div class="col-md-2 col-md-offset-1">
                    <button class="btn btn-success" name="submitButton" value="Submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script charset="utf-8">
    $.post('welcome/submit', function(data) {
        
    });
</script>
