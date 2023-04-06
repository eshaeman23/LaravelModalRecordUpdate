<!doctype html>
<html lang="en">
  <head>
    <title>Fetch</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  </head>
  <body>
      <table class="table table-hover">
      <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>PASSWORD</th>
      </tr>

      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td><?php echo e($u->id); ?></td>
        <td><?php echo e($u->name); ?></td>
        <td><?php echo e($u->email); ?></td>
        <td><?php echo e($u->password); ?></td>
        <td><button class="btn btn-info" type="button" data-id="<?php echo e($u->id); ?>" id="btnedit">Edit</button></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      
      <!-- Modal -->
      <div class="modal fade" id="btneditmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                  </div>
                  <form action="<?php echo e(URL::to('/update')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                  <div class="modal-body">
                    
                      <input type="text" name="recordid" id="recordid" class="form-control">
                      <input type="text" name="recordname" id="recordname" class="form-control">
                      <input type="text" name="recordemail" id="recordemail" class="form-control">
                      <input type="password" name="recordpassword" id="recordpassword" class="form-control">

                    
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
      </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 
 
    <script>
    $(document).ready(function(){
        $(document).on("click","#btnedit",function(){
            var id = $(this).attr("data-id");
            // console.log(id);
            // $("#btneditmodal").modal("show");
            $.ajax({
                url:"/getdata",
                type:"POST",
                data:"id="+id+
                '&_token=<?php echo e(csrf_token()); ?>',
                success:function(result){
                    // console.log(result);
                    var result = JSON.parse(result);
                    $("#btneditmodal").modal("show");
                    $("#recordid").val(result["id"]);
                    $("#recordname").val(result["name"]);
                    $("#recordemail").val(result["email"]);
                    $("#recordpassword").val(result["password"]);

                }
            });
        });
    });
    </script>
 
     </body>
</html><?php /**PATH C:\Users\Administrator\Desktop\modalupdatingrecrd\resources\views/fetch.blade.php ENDPATH**/ ?>