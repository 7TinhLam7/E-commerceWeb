<?php
echo $this->Html->charset();

echo $this->Html->css('dangky-dangnhap.css');
echo $this->Html->css('Loginstyle.css');

echo $this->Html->css('trangchu.css');
echo $this->Html->css('header.css');
echo $this->Html->css('style.css');
echo $this->Html->css('team.css');
echo $this->Html->css('cake1.css');
echo $this->Html->css('trangcanhan.css');
echo $this->Html->css('hinhanhsp.css');
echo $this->Html->css('timkiemnangcao.css');
echo $this->Html->css('footer.css');
echo $this->Html->css('chitietsp.css');
echo $this->Html->css('bootstrap-theme.css');
echo $this->Html->css('bootstrap.css');
echo $this->Html->css('bootstrap-theme.min.css');
echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
echo $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800');
echo $this->Html->css('https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic');


echo $this->Html->script('jquery-1.11.1.js');
echo $this->Html->script('jquery-1.11.1.min.js');
echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');
echo $this->Html->script('http://code.jquery.com/jquery-2.0.0.min.js');
echo $this->Html->script('reviews.js');
echo $this->Html->script('trangchu.js');
echo $this->Html->script('jquery.waypoints.min.js');
echo $this->Html->script('jquery.countup.js');
echo $this->Html->script('move-top.js');
echo $this->Html->script('jquery.easing.min.js');



?>
<title>Web bán hàng</title>




<script>
// kéo xuống khoảng cách 500px thì xuất hiện nút Top-up
var offset = 100;
// thời gian di trượt 0.75s ( 1000 = 1s )
var duration = 750;
$(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > offset)
            $('#top-up').fadeIn(duration);else
        $('#top-up').fadeOut(duration);
    });
    $('#top-up').click(function () {
        $('body,html').animate({scrollTop: 0}, duration);
    });
});
</script>

<div title="Về đầu trang" onmouseover="this.style.color='#590059'" onmouseout="this.style.color='#004993'" id="top-up">
    <i class="fa fa-caret-square-o-up"></i></div>
    <style>
    #top-up {
        background:none;
        font-size: 3em;
        text-shadow:0px 0px 5px #c0c0c0;
        cursor: pointer;
        position: fixed;
        z-index: 9999;
        color:#004993;
        bottom: 20px;
        right: 15px;
        display: none;
    }
</style>