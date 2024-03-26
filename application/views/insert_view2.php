<div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-7">
                <br>
                <h4>Form Add Data</h4>
                <hr>
                <form id='addmember_form01'action="<?php echo site_url('Insertdata/addmember_ajax');?>" method="post" class="form-horizontal" enctype="multipart/form-data" >
                <!-- insertdata/adding -->


                    <div class="form-group row">
                        <div class="col-sm-2 control-label">ID Number</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_idnumber" required class="form-control" placeholder="ID Number" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">TH Name</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_thname" required class="form-control" placeholder="TH Name" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">EN Name</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_enname" required class="form-control" placeholder="EN Name" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Gender</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_gender" required class="form-control" placeholder="Gender" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Date of Birth</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_dob" required class="form-control" placeholder="Date of Birth">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Religion</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_religion" required class="form-control" placeholder="Religion">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Address</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_address" required class="form-control" placeholder="Address" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Issuer</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_issuer" required class="form-control" placeholder="Issuer" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Date of Issue</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_doi" required class="form-control" placeholder="Date of Issue" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Date of Expiry</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_doe" required class="form-control" placeholder="Date of Expiry">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">Photo(base64)</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_photo_base64" required class="form-control" placeholder="Photo(base64)" >
                        </div>
                    </div>
                    <!-- ซ่อน base64 เพื่อกันการบันทึกโดย user -->


                    <div class="form-group row">
                        <div class="col-sm-2 control-label"></div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-Success" onclick="getData()">Get Data</button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label"></div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary" onclick="addMember()">SAVE</button>
                        </div>
                    </div>
                    <script>
                        
                    </script>

                </form>
            </div>
        </div>
    </div>
    

    
