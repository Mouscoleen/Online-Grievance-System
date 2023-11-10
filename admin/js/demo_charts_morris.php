<?php
include("./config/dbconnect.php");
include("./dashboard_slider.php");
if($_SESSION['dms_username'])
{
	
?>
<script type="text/javascript">
var morrisCharts = function() {

    Morris.Line({
      element: 'morris-line-example',
      data: [
        { y: 'Direct Mail', a: 100, b: 90 },
        { y: 'Telefacing', a: 75,  b: 65 },
        { y: 'Face 2 Face', a: 50,  b: 40 },
        { y: 'New Media', a: 75,  b: 65 },
        { y: 'PayRoll Giving', a: 50,  b: 40 },
        { y: 'Solicited', a: 75,  b: 65 },
        { y: 'Walk In', a: 100, b: 90 },
		{ y: 'Others', a: 75,  b: 65 }
      ],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['<?=(date('Y')-1)?>', '<?=date('Y')?>'],
      resize: true,
      lineColors: ['#33414E', '#95B75D']
    });


    Morris.Area({
        element: 'morris-area-example',
        data: [
            { y: '2006', a: 100, b: 90 },
            { y: '2007', a: 75,  b: 65 },
            { y: '2008', a: 50,  b: 40 },
            { y: '2009', a: 75,  b: 65 },
            { y: '2010', a: 50,  b: 40 },
            { y: '2011', a: 75,  b: 65 },
            { y: '2012', a: 100, b: 90 }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        resize: true,
        lineColors: ['#3FBAE4', '#FEA223']
    });


    Morris.Bar({
        element: 'morris-bar-example',
        data: [
            { y: '2006', a: 100, b: 90 },
            { y: '2007', a: 75,  b: 65 },
            { y: '2008', a: 50,  b: 40 },
            { y: '2009', a: 75,  b: 65 },
            { y: '2010', a: 50,  b: 40 },
            { y: '2011', a: 75,  b: 65 },
            { y: '2012', a: 100, b: 90 }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['<?=(date('Y')-1)?>', '<?=date('Y')?>'],
        barColors: ['#B64645', '#33414E']
    });


    Morris.Donut({
        element: 'morris-donut-example',
        data: [
            {label: "Download Sales", value: 12},
            {label: "In-Store Sales", value: 30},
            {label: "Mail-Order Sales", value: 20}
        ],
        colors: ['#95B75D', '#3FBAE4', '#FEA223']
    });

}();
</script>
<?php
}
?>