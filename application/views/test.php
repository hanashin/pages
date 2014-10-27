<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <!-- 兼容IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 支持国产浏览器高速模式 -->
    <meta name="renderer" content="webkit">
    <!-- 响应式布局 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <title>Altenergy Power Control Software</title>
    <link type="image/x-icon" href="http://127.0.0.1:8080/pages/images/logo-icon.png" rel="shortcut icon">
    <!-- Bootstrap -->
    <link href="http://127.0.0.1:8080/pages/css/bootstrap.min.css" rel="stylesheet">
<!--     <link href="http://127.0.0.1:8080/pages/css/docs.min.css" rel="stylesheet"> -->
    <link href="http://127.0.0.1:8080/pages/css/ecu-style.css" rel="stylesheet">  
    <link href="http://127.0.0.1:8080/pages/css/bootstrapValidator.css" rel="stylesheet">
    <link href="http://127.0.0.1:8080/pages/css/bootstrapSwitch.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->    
    <script src="http://127.0.0.1:8080/pages/js/jquery-1.8.2.min.js"></script>
    <script src="http://127.0.0.1:8080/pages/js/bootstrap.min.js"></script>
    <script src="http://127.0.0.1:8080/pages/js/bootstrapValidator.min.js"></script>
  </head>
  <body>
    <header>
      <div class="navbar navbar-default navbar-top">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" data-target="#navbar-header" data-toggle="collapse" type="button">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.altenergy-power.com">
              <img src="http://127.0.0.1:8080/pages/images/logo.png">
            </a>
          </div>

          <div class="navbar-collapse collapse" id="navbar-header">
            <ul class="nav navbar-nav navbar-title">
              <li><a>ENERGY CONTROL UNIT</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-home"></span>dashboard</a></li>
              <li><a href="#" class="active"><span class="glyphicon glyphicon-cog"></span>Configure</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-user"></span>Management</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-list"></span>实时数据</a></li>
            </ul>
          </div>
        </div>
      </div>     
    </header>

    <nav>
      <div class="navbar navbar-default navbar-orange">
        <div class="container">
          <p>RealTime 数据</p>          
          <div class="navbar-header">            
            <button class="navbar-toggle" data-target="#navbar-middle" data-toggle="collapse" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          </div>

          <div class="navbar-collapse collapse" id="navbar-middle">
            <ul class="nav navbar-nav ">
              <li><a href="#">Data</a></li>
              <li><a href="#">Power</a><span> </span></li>
              <li><a href="#" class="active">Energy</a><span> </span></li>
              <li><a href="#">能量</a><span> </span></li>
              <li><a href="#">功率</a><span> </span></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <section>
      <div class="container container-main">

      <article>
        <div class="panel panel-default">
            <div class="panel-heading">
              <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">LibraryLibrary</a></li>
        <li class="active">DataLibrary</li>
        <li><a href="#">实时数据</a></li>
      </ol>
            </div>
            <div class="panel-body mainbody">

<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>
           
<div>
    <form action="http://127.0.0.1:8080/pages/index.php/realtimedata/power_graph" method="post" accept-charset="utf-8">    <center>
        <input class="Wdate" type="text" name="date" value="2014-09-18" onClick="WdatePicker({maxDate:'%y-%M-%d', lang:'en'})">
        <button type="submit" class="btn btn-default btn-sm">Query</button>
        <span class="label label-warning">Energy: 0.392347 kWh</span>
    </center>
    </center>
    </from>
    <center>
    <div id="myChart" width="800" height="400"></div>
</center>
</div>
            </div><!-- end of panel-body -->
            </div><!-- end of panel -->
      </article>
    </div>
    
    </section>

    <footer class="footer">
      &copy2014 Altenergy Power System Inc.
    </footer>


<script src="http://127.0.0.1:8080/pages/js/datepicker/WdatePicker.js"></script>
<script src="http://127.0.0.1:8080/pages/js/highcharts.js"></script>
<script src="http://127.0.0.1:8080/pages/js/modules/exporting.js"></script>
<script>
//准备数据
    $(function () {
    Highcharts.setOptions({
        global: {
            useUTC: false 
        }
    });
$('#myChart').highcharts({
    chart: {
        zoomType: 'x'
    },
    title: {
        text: 'Power Generation'
    },
    // subtitle: {
    //     text: document.ontouchstart === undefined ?
    //         'Click and drag in the plot area to zoom in' :
    //         'Pinch the chart to zoom in'
    // },
    xAxis: {
        type: 'datetime',
        //minRange: 5 * 60 * 1000 // five minites
    },
    yAxis: {
        title: {
            text: 'Power(W)'
        },
        min:0
    },
    legend: {
        enabled: false
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        line: {
            fillColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                stops: [
                    [0, Highcharts.getOptions().colors[0]],
                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                ]
            },
            marker: {
                radius: 1
            },
            lineWidth: 2.5,
            states: {
                hover: {
                    lineWidth: 3.5
                }
            },
            threshold: null
        }
    },
    series:[{
        type: 'line',
        name: 'Power',    
        data: [[1411020799000,0],[1411020859000,188],[1411020919000,185],[1411021147000,188],[1411021213000,188],[1411021284000,185],[1411021467000,185],[1411021537000,184],[1411021603000,185],[1411021746000,185],[1411021861000,317],[1411021921000,322],[1411021981000,322],[1411022041000,322],[1411022101000,322],[1411022161000,322],[1411022221000,322],[1411022281000,322],[1411022341000,322],[1411022401000,322],[1411022461000,322],[1411022521000,322],[1411022831000,322],[1411022891000,185],[1411023270000,322],[1411026670000,133],[1411027126000,427],[1411027357000,428],[1411027417000,428],[1411027477000,427],[1411027537000,428],[1411027597000,427],[1411027934000,184],[1411028330000,427],[1411028630000,427],[1411028930000,427],[1411029230000,243],[1411029530000,427],[1411029830000,427],]
    }]
});
});
</script> 
  </body>
</html>
