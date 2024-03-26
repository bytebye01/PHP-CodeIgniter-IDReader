<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Show Member</h4>
            <hr>
            <?php if (!empty($query1)): ?>
                <input type="text" id="searchInput" class="form-control mb-2" placeholder="ค้นหา..." style="width: 200px;">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>เลขบัตรประชาชน</th>
                                <th>ชื่อไทย</th>
                                <th>รูปภาพ</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query1 as $rs) { ?>
                                <tr>
                                    <td><?php echo $rs->c_id; ?></td>
                                    <td><?php echo $rs->c_idnumber; ?></td>
                                    <td><?php echo $rs->c_thname; ?></td>
                                    <td>
                                        <img src="data:image/jpeg;base64,<?php echo $rs->c_photo_base64; ?>" alt="Photo" style="max-width: 100px; max-height: 100px;">
                                    </td>


                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo site_url('insertdata/edit/' . $rs->c_id); ?>" class="btn btn-info rounded">
                                                <i class="fas fa-pencil-alt" style="font-size: 13px;"></i>
                                            </a>
                                            <a class="btn btn-danger delete-member rounded" data-id="<?php echo $rs->c_id; ?>">
                                                <i class="fas fa-trash-alt" style="font-size: 14px;"></i>
                                            </a>
                                            <a class="btn btn-primary rounded" onclick="showPopupMember(<?php echo $rs->c_id; ?>)">
                                                <i class="fas fa-eye" style="font-size: 13px;"></i>
                                            </a>
                                        </div>
                                    </td>



                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p>ไม่มีข้อมูลที่จะแสดง</p>
            <?php endif; ?>
            
        </div>
    </div>
</div>
