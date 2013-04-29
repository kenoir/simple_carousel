<html>
<head>
<style>
    body {
        background: #002b36;
        color: #eee8d5;
        zoom: 2.2;
    }
    td,th { border: 1px solid #586e75; text-align: center }
</style>
</head>
<body>
<table style="width:100%; height:100%">
<tr><th></th><th>CI</th>
<?
require_once('inc.php');

$envs = array('int', 'test', 'stage', 'live');
foreach ($envs as $env) {
    echo "<th>$env</th>";
}

function disp($prod) {
    if ($prod == 'ondemandmanager') {
        return "odm";
    }
    if ($prod == 'rkt-sky') {
        return "skyrocket";
    }
    return $prod;
}

function vers($str) {
    if (!$str) {
        $str = "FAILED";
    }
    $str = preg_replace(array(',<title>.*</title>,', '/<[^>]+>/'), '', $str);
    $str = preg_replace(',-SNAPSHOT,', '-S', $str);
    $str = substr(trim($str), 0, strlen('12.34.56-SNAPSHOT'));
    $str = preg_replace(',\s.*$,', '', $str);
    if (!preg_match('/^\d+(?:\.\d+(?:\.\d+)?)?(?:-S)?$/', $str))
        $str = "<span style='color: #dc322f'>$str</span>";
    return $str;
}

echo "</tr>";

foreach (array('ace', 'adie', 'fuel', 'hermes', 'ondemandmanager', 'picr', 'rocket', 'rkt-sky') as $product) {
    echo "<tr><td>" . disp($product) . "</td><td>";
    if (strstr(Utility::fetch("-I https://ci-app.int.bbc.co.uk/hudson/job/psi-" . disp($product) . "-snapshot-deploy/lastBuild/buildStatus"), "blue.gif")) {
        echo "<span style='color: #2aa198'>&#10004;</span>"; // tick
    } else {
        echo "<span style='zoom: 1.5; color: #dc322f'>&#10008;</span>"; // cross
    }
    echo "</td>";
    foreach ($envs as $env) {
        echo "<td>";
        echo vers(Utility::fetch("https://admin.$env.bbc.co.uk/$product/admin/version/"));
        echo "</td>";
    }
    echo "</tr>";
}

echo "<tr><td>PIPS</td><td></td>";
foreach ($envs as $env) {
    echo "<td>";
    echo vers(Utility::fetch("https://api.$env.bbc.co.uk/pips/health/serverinfo/release/"));
    echo "</td>";
}

?>
</table>
