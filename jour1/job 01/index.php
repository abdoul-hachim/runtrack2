<?php
if ($salutation==true){
    echo 'hello la plateforme';
}else{
   echo 'Wesh alor la plateforme';
}
$salutation='la machine'
?>
<?php   
for ($i = 1; ; $i++){
    if ($i == 13) {
        break;
    }
    echo $i;
}
?>

<?php  
    switch ($i) {
        case 0:
            echo "i égal 0";
            break;
        case 1:
            echo "i égal 1";
            break;
        case 2:
            echo "iégal 2";
            break;
        default:
        echo "i n'est ni égal a 2, ni a 1, ni a 0.";
    }
?>
<?php
$arr = array(1, 2, 3, 4);
foreach ($arr as $key => $value) {
    echo "{$key} => {$value}";
}
$list['a faire']['aujourdhui'] = 'le taff';
echo $list ['a faire']['aujourdhui'];
//job 01
$str="la plateforme";
$str2="Vive";
$str3="!";
echo "$str2 $str $str3"; 
$val=6;
echo $val;
$val2= $val+4;
echo $val2;

$myBool= fals;
echo $myBool;
//job 02
?>

