<?php

$servername = "	sql213.infinityfree.com"; // هذا هو المضيف الافتراضي في 000webhost
$username = "if0_36654963"; // استبدله باسم المستخدم الخاص بقاعدة البيانات
$password = "ZT9no8tpmXE9"; // استبدلها بكلمة المرور الخاصة بقاعدة البيانات
$dbname = "if0_36654963_testdb"; // استبدله بالاسم الخاص بقاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
echo "تم الاتصال بنجاح";
