// JavaScript Document

(function($){
    $.fn.extend({
	     timeShow:function(options){
		      var defaults ={
				  txtColor:'',     //显示颜色,只控制时间；
				  YMColor:'',     //显示颜色,只控制年月；
				  DColor:'',     //显示颜色,只控制日；
				  WColor:'',     //显示颜色,只控制时期；
				  yearMoon:'#yearMoon',  //显示年月;
				  dayShow:'#dayShow',  //显示日;
				  weekShow:'#weekShow' //显示星期;
			  }
			
			  options = $.extend(defaults,options);
			  return this.each(function(){
				    var o =options;
                    var timeShowTxt= $(this).attr("id");
					$("#" + timeShowTxt).css({
					   color:o.txtColor
					});
					$(o.yearMoon).css({
					   color:o.YMColor
					});
					
					$(o.dayShow).css({
					   color:o.DColor
					});
					
					$(o.weekShow).css({
					   color:o.WColor
					});

			        startTime();
					
					function startTime(){
						var today=new Date();
						var w;
						 switch (today.getDay()){
						 case 1: w="星期一"; break;
						 case 2: w="星期二"; break;
						 case 3: w="星期三"; break;
						 case 4: w="星期四"; break;
						 case 5: w="星期五"; break;
						 case 6: w="星期六"; break;
						 default: w="星期日";
						}

						var y=today.getFullYear();
						var _m=today.getMonth()+1;
						var d=today.getDate();
						var h=today.getHours();
						var m=today.getMinutes();
						var s=today.getSeconds();
						// add a zero in front of numbers<10;
						m=checkTime(m);
						s=checkTime(s);
						
						$("#" + timeShowTxt).html(h+":"+m+":"+s);
						$(o.weekShow).append(w);						
						$(o.dayShow).prepend(d+"日");
						$(o.yearMoon).prepend(y+"年"+ _m+"月");
						t=setTimeout(startTime,1000);
					}
					
					function checkTime(i){
						if (i<10) 
						  {i="0" + i}
						  return i
					}
			  });
		 }

    });
}(jQuery));