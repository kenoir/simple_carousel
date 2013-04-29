<style>
body {
    zoom: 2;
    background: #586e75;
    color: #eee8d5;
    font-family: sans-serif
}

</style>
<center><h1>ISSUE HOARDERS: PSI</h1></center>
<?
require_once('inc.php');
$s = fetch('https://jira.dev.bbc.co.uk/browse/PSI?selectedTab=com.atlassian.jira.plugin.system.project%3Aissues-panel&decorator=none&contentOnly=true', 10);
preg_match_all(',<tr class="assigneeRow">.*?<td class="name first"><.*?>(.*?)</a>.*?<td class="count">(\d+)</td>,s', $s, $regs);

$w = array();
for ($i = 0; $i < count($regs[1]); ++$i) {
    $w[$regs[1][$i]] = $regs[2][$i];
}
arsort($w);

unset($w['Anita Kim']);

echo "<table style='width: 100%; height: 85%'>\n";
$total = 0;
foreach ($w as $who => $count) {
    $max = $count;
    break;
}

foreach ($w as $who => $count) {
    echo "<tr><td style='white-space: nowrap'>$who</td><td style='width: 80%'>";
    echo "<span style='display:inline-block; -webkit-border-radius: 4px; padding: 2px; padding-left: 4px; width:" . (int)(100 * $count / $max) . "%; background: " .
        ($count >= 5 ? ($count >= 10 ? '#d33682' : '#cb4b16') : '#2aa198') .
    "'>$count</span>";
    echo "</td></tr>\n";
}
echo "\n</table>";
