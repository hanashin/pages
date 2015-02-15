            </div>
          </div>
    	</article>
      </div>    
    </section>
    
    <footer class="footer">
      &copy; 2014 Altenergy Power System Inc.
    <!-- 基准测试benchmark -->
    <!--       【Debug： -->
    <!--       <small> -->
      <!-- 计算出从CodeIgniter启动到浏览器最终输出的时间消耗，或使用伪变量{elapsed_time} 
      <?php echo "总计用时 ".$this->benchmark->elapsed_time()." 秒";?> -->
      <!-- 计算出从CodeIgniter启动到浏览器最终输出的内存消耗，或使用伪变量{memory_usage}
      <?php echo "内存消耗 ".$this->benchmark->memory_usage();?>  -->
    <!--       </small> -->
    <!--       】   -->
    </footer>
    

    <script>   
    $(document).ready(function() {
     	
      //切换语言
      $(".chlang").click(function(){
          $.ajax({
    		  url : "<?php echo base_url('index.php/management/set_language');?>",
    		  type : "post",
              dataType : "json",
    		  data: "language=" + $(this).attr("id"),
        	  success : function(Results){	    	
    		  },
        	  error : function(){
        		  //alert("Error");
        	  }
          })
          setTimeout("location.reload();",500);//刷新页面
      });
    });
    </script>
    </body>
</html>