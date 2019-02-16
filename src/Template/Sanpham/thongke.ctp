<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>

<?php 
$i='0';
$z='0';
foreach($sanpham as $sp){
$dg[$i]= array('ten'=>$sp->ten, 'diemtb'=>$sp->diemtb,'id'=>$sp->id);
$i =$i+1;
}
foreach($sanpham1 as $sp1){
$lx[$z]= array('ten'=>$sp1->ten, 'luotxem'=>$sp1->luotxem);
$z =$z+1;
}
?>
<h2> Thống Kê</h2>
<div id="luotxem" style="width: 900px; height: 350px;margin-left: 20px"></div>
<div id="danhgia" style="width: 900px; height: 350px;margin-left: 20px"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<!-- luot xem -->
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
var y = <?php echo json_encode($lx) ;?>
// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Task','Hours per Day'],
[y['0'].ten,Number(y['0'].luotxem)],
[y['1'].ten,Number(y['1'].luotxem)],
[y['2'].ten,Number(y['2'].luotxem)],
[y['3'].ten,Number(y['3'].luotxem)],
[y['4'].ten,Number(y['4'].luotxem)],

]);
// Optional; add a title and set the width and height of the chart
var options = {'title':'5 Sản phẩm được đánh giá cao', 'width':550, 'height':300};

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('luotxem'));
chart.draw(data, options);
}
</script>

<script type="text/javascript">
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawStuff);

function drawStuff() {
var data = new google.visualization.arrayToDataTable([
['', 'Lượt Xem'],
[y['0'].ten,Number(y['0'].luotxem)],
[y['1'].ten,Number(y['1'].luotxem)],
[y['2'].ten,Number(y['2'].luotxem)],
[y['3'].ten,Number(y['3'].luotxem)],
[y['4'].ten,Number(y['4'].luotxem)],
]);

var options = {
title: 'Chess opening moves',
width: 900,
height:300,
legend: { position: 'none' },
bars: 'horizontal', // Required for Material Bar Charts.
axes: {
x: {
0: { side: 'top', label: ' TOP 5 Sản Phẩm Có Lượt Xem Cao Nhất'} // Top x-axis.
}
},
bar: { groupWidth: "90%" }
};

var chart = new google.charts.Bar(document.getElementById('luotxem'));
chart.draw(data, options);
};
</script>







<!-- đánh giá -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
var x = <?php echo json_encode($dg) ;?>
// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Task','Hours per Day'],
[x['0'].ten,Number(x['0'].diemtb)],
[x['1'].ten,Number(x['1'].diemtb)],
[x['2'].ten,Number(x['2'].diemtb)],
[x['3'].ten,Number(x['3'].diemtb)],
[x['4'].ten,Number(x['4'].diemtb)],

]);
// Optional; add a title and set the width and height of the chart
var options = {'title':'5 Sản phẩm được đánh giá cao', 'width':550, 'height':400};

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('danhgia'));
chart.draw(data, options);
}
</script>

<script type="text/javascript">
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawStuff);

function drawStuff() {
var data = new google.visualization.arrayToDataTable([
['', 'Điểm Trung Bình'],
[x['0'].ten,Number(x['0'].diemtb)],
[x['1'].ten,Number(x['1'].diemtb)],
[x['2'].ten,Number(x['2'].diemtb)],
[x['3'].ten,Number(x['3'].diemtb)],
[x['4'].ten,Number(x['4'].diemtb)],
]);

var options = {
title: 'Chess opening moves',
width: 900,
height:300,
legend: { position: 'none' },
// chart: { title: '5 sản phẩm được đánh giá cao',
//          subtitle: 'dựa trên điểm đánh giá trung bình' },
bars: 'horizontal', // Required for Material Bar Charts.
axes: {
x: {
0: { side: 'top', label: 'TOP 5 Sản Phẩm Được Đánh Giá Cao'} // Top x-axis.
}
},
bar: { groupWidth: "90%" }
};

var chart = new google.charts.Bar(document.getElementById('danhgia'));
chart.draw(data, options);
};
</script>

