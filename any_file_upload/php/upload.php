<?php
// 上传目录
$uploadDirectory = "uploads/";

// 检查上传目录是否存在，不存在则创建
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// 检查是否有文件上传
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileToUpload'])) {
    $uploadFile = $uploadDirectory . basename($_FILES['fileToUpload']['name']);
    // 移动上传的文件到目标目录
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadFile)) {
        echo "文件上传成功: " . htmlspecialchars(basename($_FILES['fileToUpload']['name']));
    } else {
        echo "文件上传失败.";
    }
} else {
    echo "没有文件上传.";
}
?>