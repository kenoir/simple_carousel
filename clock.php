<html>
<head>
<script src="countdown/countdown.js"></script>
<script>
function today(endHour) {
    var now = new Date();
    if (now.getHours() >= endHour) {
        now = new Date(now.getTime() + 24 * 60 * 60 * 1000);
    }
    new Countdown({year: 1900+now.getYear(), month: 1+now.getMonth(), day: now.getDate(), hour: endHour, rangeHi:'month'});
}
</script>
<style>
    body { zoom: 2.5; font-family: sans-serif; font-weight: bold; background: #657b83; color: #eee8d5 }
    td,th { text-align: center; padding: 0.5em }
</style>
</head>
<body>
<table style="width: 100%; heigh: 100%">
<!--<tr><td>RedBee Switchoff</td><td><script>new Countdown({year: 2013, month: 9, day: 29, hour: 18, rangeHi:'month'});</script></td></tr>-->
<tr><td>Hermes</td><td><script>new Countdown({year: 2013, month: 4, day: 26, hour: 12, rangeHi:'month'});</script></td></tr>
<tr><td>Sanity Returns</td><td><script>new Countdown({year: 2013, month: 4, day: 29, hour: 16, rangeHi:'month'});</script></td></tr>
<tr><td>Scorpio</td><td><script>new Countdown({year: 2013, month: 6, day: 17, hour: 12, rangeHi:'month'});</script></td></tr>
<!--
<tr><td>Lunch</td><td><script>today(12);</script></td></tr>
-->
</table>

