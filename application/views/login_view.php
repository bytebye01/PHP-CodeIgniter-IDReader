    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <h4>Form Login</h4>
                <form action="<?php echo site_url('register/showlogin');?>" method="post" class="form-horizontal">

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Username</div>
                        <div class="col-sm-5">
                            <input type="text" name="username" required class="form-control" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Password</div>
                        <div class="col-sm-5">
                            <input type="password" name="password" required class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label"></div>
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>