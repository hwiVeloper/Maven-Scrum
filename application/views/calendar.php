<style>
  th {
    text-align: center;
  }
  .table td {
    padding-top: 2em;
    padding-bottom: 2em;
  }
  .table th {
    padding-top: 2em;
    padding-bottom: 2em;
  }
</style>

<!-- SIMPLE INFORMATION -->
<div class="row" style="margin-bottom:1em;">
<!-- ATTENDANCE : <?=$month_info->is_content_days?><br> -->
<!-- TOTAL : <?=$month_info->current_days?><br> -->
<!-- PERCENTAGE : <?=round($month_info->percentage, 2).' %'?> -->
</div>
<!-- VIEW CALENDAR -->
<?=$cal_view?>

<script type="text/javascript">
$(".is-content").parent("td").addClass("bg-success");
</script>
