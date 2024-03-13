<?php
if(isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    echo "Kết quả tìm kiếm cho từ khóa: " . $keyword;
} else {
    echo "Vui lòng nhập từ khóa tìm kiếm.";
}
?>
