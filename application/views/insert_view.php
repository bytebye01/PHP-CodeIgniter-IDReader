    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <h4>Form Add Data</h4>
                <form action="<?php echo site_url('Insertdata/adding');?>" method="post" class="form-horizontal">


                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Name</div>
                        <div class="col-sm-5">
                            <input type="text" name="m_name" required class="form-control" placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Lastname</div>
                        <div class="col-sm-5">
                            <input type="text" name="m_lname" required class="form-control" placeholder="Lastname">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-2 control-label"></div>
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>