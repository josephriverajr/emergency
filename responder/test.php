<?php
$str = " 14.609053699999997";
echo "Without trim: " . $str;
echo "<br>";
echo "With trim: " . number_format($str,5);
echo "<br>";
$str1 = "121.02225650000001";
echo "Without trim: " . $str1;
echo "<br>";
echo "With trim: " . number_format($str1,5);
?>