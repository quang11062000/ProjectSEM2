<script language="JavaScript" type="text/javascript">
    function checkUpdate() {
        return confirm("Bạn Có Chắc Muốn Thay Đổi Trạng Thái");
    }
</script>

<div class="form-container">
    <h2>Cập nhật trạng thái</h2>
    <form action="<?php echo base_url("comment/update&id={$comment['id']}") ?>" method="post" enctype="multipart/form-data">
        <form>
            <?php
            session_start();
            $_SESSION['product'] = $comment['product_id'];
            ?>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputActive"></label>
                    <h4>Trạng Thái Hiện Tại: <?php echo $comment['active'] ?></h4>
                    <select name="active" id="inputActive" class="form-control">
                        <option selected>Bật</option>
                        <option selected>Tắt</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bt2" onclick="return checkUpdate()">Cập nhật</button>
        </form>
    </form>