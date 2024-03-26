<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-7">
            <h4>Form Edit Data</h4>
            <?php if ($rsedit): ?>
                <form action="<?php echo site_url('Insertdata/editing');?>" method="post" class="form-horizontal" enctype="multipart/form-data" onsubmit="editMember(); return false;">
                    <div class="form-group row">
                        <div class="col-sm-2 control-label">TH Name</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_thname" required class="form-control" placeholder="TH Name" value="<?php echo $rsedit->c_thname; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label">EN Name</div>
                        <div class="col-sm-6">
                            <input type="text" name="c_enname" required class="form-control" placeholder="EN Name" value="<?php echo $rsedit->c_enname; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 control-label"></div>
                        <div class="col-sm-6">
                            <input type="hidden" name="c_id" value="<?php echo $rsedit->c_id; ?>">
                            <button type="submit" class="btn btn-primary ">SAVE</button>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <script>
                    // แสดง SweetAlert2 เมื่อไม่มีข้อมูล edit_view.php
                    Swal.fire({
                        icon: 'error',
                        title: 'ไม่พบข้อมูล',
                        text: 'ไม่พบข้อมูลหรือข้อมูลนี้ถูกลบไปแล้ว',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // ทำการ redirect หรือทำอย่างอื่นตามที่ต้องการ
                            window.location.href = '<?php echo base_url(); ?>';
                        }
                    });
                </script>
            <?php endif; ?>
        </div>
    </div>
</div>


<script>
    // เมื่อมีการเลือกไฟล์
    document.querySelector('input[name="m_img"]').addEventListener('change', function(e) {
        // เลือกตำแหน่งที่ต้องการแสดงรูปภาพในฟอร์ม
        var imageContainer = document.querySelector('.col-sm-6 img');
        
        // เลือกไฟล์ที่เลือก
        var file = e.target.files[0];

        // ถ้ามีไฟล์ที่เลือก
        if (file) {
            // ใช้ FileReader เพื่ออ่านไฟล์เป็น URL
            var reader = new FileReader();
            
            reader.onload = function (e) {
                // กำหนด URL ของรูปภาพที่ได้อ่านได้
                imageContainer.src = e.target.result;
            };
            
            reader.readAsDataURL(file); // อ่านไฟล์เป็น URL
        } else {
            // ถ้าไม่มีไฟล์ที่เลือก
            imageContainer.src = ''; // ลบรูปภาพที่แสดงออก
        }
    });
</script>