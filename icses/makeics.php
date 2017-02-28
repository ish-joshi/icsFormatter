<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-91540034-1', 'auto');
    ga('send', 'pageview');

</script>

<?php
/**
 * Created by PhpStorm.
 * User: Ishan
 * Date: 28/02/2017
 * Time: 7:23 AM
 */
function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//$ics =

if (isset($_POST['ics'])) {
    $ics = $_POST['ics'];
} else {
    $ics = 'NONGENERATE';
}
if (strlen($ics) < 100) {
    $ics = "NONGENERATE";
}
$my_file = generateRandomString(7) . ".ics";
//if(file_exists($my_file)){
while (file_exists($my_file)) {
    $my_file = generateRandomString(9) . ".ics";
}
//}

$handle = fopen($my_file, 'w') or die('NONGENERATE');

fwrite($handle, $ics);

fclose($handle);

if ($ics == 'NONGENERATE') {
    echo $ics;
} else {
    echo $my_file;
}
?>