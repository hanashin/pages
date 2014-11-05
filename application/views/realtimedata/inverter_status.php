<div class="table-responsive">
  <table class="table table-condensed table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">逆变器ID</th>
        <th scope="col">通道</th>
        <th scope="col">工作情况</th>
        <th scope="col">当天发电量</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($ids as $value){
        echo "<tr>
                <td>$value</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>";
      }
    ?>
    </tbody>
  </table>
</div>

<script>
function myrefresh(){
   window.location.reload();
}
setTimeout('myrefresh()',300000); //指定5分钟刷新一次
</script>