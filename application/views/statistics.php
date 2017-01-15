<!-- Page Custom Style -->
<style media="screen">
/*
  #dock-container {
    text-align: center;
    background: rgba(255,255,255,0.2);
    border-radius: 10px 10px 0 0;
  }
  #dock-container li {
    list-style: none;
    display: inline-block;
    position: relative;
    text-align: center;
  }
  #dock-container li img {
    width: 64px;
    height: 64px;
    -webkit-box-reflect: below 2px
    -webkit-gradient(linear, left top, left bottom, from(transparent),
    color-stop(0.7, transparent), to(rgba(255,255,255,.5)));
    -webkit-transition: 0.22s ease-in-out;
    -webkit-transform-origin: 100% 100%;
  }
  #dock-container li:hover img {
    -webkit-transform: scale(1.4);
    margin: 0 2em;
  }
  #dock-container li:hover + li img,
  #dock-container li.prev img {
    -webkit-transform: scale(1.2);
    margin: 0 1.5em;
  }

  @media (max-width: 640px) {
    #dock-container li img {

    }
  }*/
  .table td {
    text-align: center;
  }
</style>

<!-- Load JS library -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<table class="table">
  <thead>
    <tr>
      <?php foreach($members as $k=>$row) : ?>
      <th><?=$row['user_name']?></th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach($attendance as $k=>$row) : ?>
        <?php if($members[$k]['user_id'] == $row[$k]['user_id']) : ?>
          <?php if($members[$k]['user_name'] == '날짜') : ?>
            <td><?=$row[$k]['date_list']?></td>
          <?php else : ?>
            <td>O</td>
          <?php endif; ?>
        <?php else: ?>
          <td>&nbsp;</td>
        <?php endif; ?>
      <?php endforeach; ?>
    </tr>
  </tbody>
</table>
