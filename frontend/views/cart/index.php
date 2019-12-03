<?php
session_start();
$itemcart = array();
array_push($itemcart, $_SESSION['product_images'], $_SESSION['product_name'], $_SESSION['size'], $_SESSION['product_price'],  $_POST['vl']);
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
    $_SESSION['cart'][$_SESSION['product_id']] = $itemcart;
} else {
    if (array_key_exists($_SESSION['product_id'], $_SESSION['cart'])) {
        $_SESSION['cart'][$_SESSION['product_id']][4] = $_SESSION['cart'][$_SESSION['product_id']][4] + $_POST['quantity'];
    } else {
        $_SESSION['cart'][$_SESSION['product_id']] = $itemcart;
    }
}
// unset($_SESSION['cart']);
// unset($itemcart);
var_dump($_SESSION['cart']);
?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?php echo base_url('home/index') ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Giỏ hàng</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Ảnh sản phẩm</th>
                                <th class="product-name">Tên sản phẩm</th>
                                <th class="product-size">Kích thước</th>
                                <th class="product-price">Giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-total">Tổng giá</th>
                                <th class="product-remove">Xóa</th>
                            </tr>
                        </thead>
                        <?php foreach ($_SESSION['cart'] as $key => $value) : ?>
                            <tbody>
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="<?php echo PRODUCT_URL . $_SESSION['cart'][$key][0] ?>" alt="Image" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black"><?php echo $_SESSION['cart'][$key][1] ?></h2>
                                    </td>
                                    <td><?php echo $_SESSION['cart'][$key][2] ?></td>
                                    <td><?php echo $_SESSION['cart'][$key][3] ?></td>
                                    <td>
                                        <div class="input-group" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                            </div>
                                            <input type="text" class="form-control text-center" value="<?php echo $_SESSION['cart'][$key][4] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                            </div>
                                        </div>
                                    </td>
                                    <?php $total =((double)$_SESSION['cart'][$key][3]) * $_SESSION['cart'][$key][4] ?>
                                    <td><?php echo $total ?></td>
                                    <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button class="btn btn-primary btn-sm btn-block">Cập nhật</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-outline-primary btn-sm btn-block">Tiếp tục mua hàng</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Khuyến mại</label>
                        <p>Nhập phiếu giảm giá nếu có.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Mã giảm giá">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-sm px-4">Xác nhận</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Tổng giỏ hàng</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Giá tạm tính</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">$230.00</strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Thành tiền</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">$230.00</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.html'">Xác nhận đơn hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>