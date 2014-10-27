<div>
    <center>
    <canvas id="myChart" width="600" height="400">
         [您的浏览器不支持canvas元素]
    </canvas>
</center>
</div>
    <script src="<?php echo base_url('js/Chart.js');?>"></script>
    <script>

        var ctx = document.getElementById("myChart").getContext("2d");
        var data = {
            /// 表现在X轴上的数据，数组形式
            labels : ["January","February","March","April","May","June","July"],
            /// 第一条线
            datasets : [
            {
                /// 曲线的填充颜色
                fillColor : "rgba(220,220,220,0.5)",
                /// 填充块的边框线的颜色
                strokeColor : "rgba(220,220,220,1)",
                /// 表示数据的圆圈的颜色
                pointColor : "rgba(220,220,220,1)",
                /// 表示数据的圆圈的边的颜色
                pointStrokeColor : "#fff",
                data : [65,59,90,81,56,55,40]
            },
            /// 第二条线
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                pointColor : "rgba(151,187,205,1)",
                pointStrokeColor : "#fff",
                data : [28,48,40,19,96,27,100]
            }
            ]
        }
        /// 动画效果
        var options = {
            
            //Boolean - If we show the scale above the chart data            
            scaleOverlay : false,

            //Boolean - If we want to override with a hard coded scale
            scaleOverride : false,

            //** Required if scaleOverride is true **
            //Number - The number of steps in a hard coded scale
            scaleSteps : null,
            //Number - The value jump in the hard coded scale
            scaleStepWidth : null,
            //Number - The scale starting value
            scaleStartValue : null,

            //String - Colour of the scale line    
            scaleLineColor : "rgba(0,0,0,.1)",

            //Number - Pixel width of the scale line    
            scaleLineWidth : 1,

            //Boolean - Whether to show labels on the scale    
            scaleShowLabels : true,

            //Interpolated JS string - can access value
            scaleLabel : "<%=value%>",

            //String - Scale label font declaration for the scale label
            scaleFontFamily : "'Arial'",

            //Number - Scale label font size in pixels    
            scaleFontSize : 12,

            //String - Scale label font weight style    
            scaleFontStyle : "normal",

            //String - Scale label font colour    
            scaleFontColor : "#666",    

            ///Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines : true,
            
            //String - Colour of the grid lines
            scaleGridLineColor : "rgba(0,0,0,.05)",

            //Number - Width of the grid lines
            scaleGridLineWidth : 1,    

            //Boolean - Whether the line is curved between points
            bezierCurve : true,

            //Boolean - Whether to show a dot for each point
            pointDot : true,

            //Number - Radius of each point dot in pixels
            pointDotRadius : 3,

            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth : 1,

            //Boolean - Whether to show a stroke for datasets
            datasetStroke : true,

            //Number - Pixel width of dataset stroke
            datasetStrokeWidth : 2,

            //Boolean - Whether to fill the dataset with a colour
            datasetFill : true,

            //Boolean - Whether to animate the chart
            animation : true,

            //Number - Number of animation steps
            animationSteps : 60,

            //String - Animation easing effect
            animationEasing : "easeOutQuart",

            //Function - Fires when the animation is complete
            onAnimationComplete : null

        }
        /// 创建对象，生成图表
        new Chart(ctx).Line(data,options);

    </script>