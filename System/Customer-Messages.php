<?php include 'db_connect.php';
?>
<div class="col-md-12">
  <div class="card card-outline card-danger">
    <div class="card-header">
      <b>Messages</b>
      <div class="card-tools">
        <button class="btn btn-flat btn-sm bg-gradient-success btn-success" id="print"><i class="fa fa-print"></i>
          Print</button>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive" id="printable">
        <table class="table m-0 table-bordered">
          <thead>
            <th>#</th>
            <th>Name</th>
            <th>Company</th>
            <th>Status</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php
            $i = 1;
            $stat = array("Pending", "Started", "On-Progress", "On-Hold", "Over Due", "Done");
            $query = "Select * from messages";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)):
              ?>
              <tr>
                <td>
                  <?php echo $i++ ?>
                </td>
                <td>
                  <?php echo ucwords($row['full_name']) ?>
                </td>
                <td class="text-center">
                  <?php echo $row['Company']; ?>
                </td>
                <td class="project-state">
                  <?php
                  if ($row['REMARKS'] == 0) {
                    echo "<span class='badge badge-danger'>Unreadable</span>";
                  } else {
                    echo "<span class='badge badge-secondary'>Read</span>";

                  }
                  ?>
                </td>
                <td class="d-flex">
                  <a style="padding-left:5px;" href="./index.php?page=View Messages&id=<?php echo $row['id'] ?>"
                    class="btn btn-info text-bg-info  px-3 mb-0"><i class="bi bi-info"></i> </a>
                  <form style="margin-left:5px;" action="function.php" method="POST">
                    <input type="hidden" name="delete_ID" value="<?php echo $row['id'] ?>">
                    <button type="submit" name="btn_delete" class="btn btn-danger text-bg-danger px-3 mb-0"><i
                        class="bi bi-file-earmark-minus-fill"></i></button>
                  </form>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<script>
  $('#print').click(function () {
    start_load()
    var _h = $('head').clone()
    var _p = $('#printable').clone()
    var _d = "<p class='text-center'><b>Project Progress Report as of (<?php echo date("F d, Y") ?>)</b></p>"
    _p.prepend(_d)
    _p.prepend(_h)
    var nw = window.open("", "", "width=900,height=600")
    nw.document.write(_p.html())
    nw.document.close()
    nw.print()
    setTimeout(function () {
      nw.close()
      end_load()
    }, 750)
  })
</script>