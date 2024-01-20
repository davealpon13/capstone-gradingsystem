
<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
include('./db_connect.php');
ob_start();

$system = $conn->query("SELECT * FROM system_settings")->fetch_array();
foreach($system as $k => $v){
  $_SESSION['system'][$k] = $v;
}

ob_end_flush();
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login | <?php echo $_SESSION['system']['name'] ?></title>

  <?php include('./header.php'); ?>

  <style>
    body {
      width: 100%;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #343a40;
      color: #ffffff;
    }

    .card {
      background-color: #212529;
      border: none;
    }

    .card-header {
      border-bottom: none;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .btn-primary,
    .btn-success,
    .btn-info {
      width: 100%;
      margin-bottom: 10px;
    }

    .modal-content {
      background-color: #212529;
      color: #ffffff;
    }

    .modal-header,
    .modal-footer {
      border: none;
    }

    .modal-title {
      color: #ffffff;
    }
  </style>
</head>

<body>
  <main class="container">
    <div class="text-center mb-4">
      <h2><?php echo $_SESSION['system']['name'] ?> - Admin</h2>
    </div>

    <div class="row justify-content-center">
      <div class="card col-md-4">
        <div class="card-body">
        <form id="login-form" action="login_process.php" method="post">
  <div class="form-group">
    <label for="username" class="control-label">Username</label>
    <input type="text" id="username" name="username" class="form-control">
  </div>
  <div class="form-group">
    <label for="password" class="control-label">Password</label>
    <input type="password" id="password" name="password" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>

            <button class="btn btn-primary" type="button" id="view_result">View Student Result</button>
            <button class="btn btn-success" type="button" id="view_teacher_result" onclick="window.location.href='/capstone/osrs/login system with avatar/login.php'">Teacher login</button>

          
          </form>
        </div>
      </div>
    </div>
  </main>

  <div class="modal fade" id="view_student_results" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Student Result</h5>
        </div>
        <div class="modal-body">
          <form id="vsr-frm">
            <div class="form-group">
              <label for="student_code" class="control-label">Student ID #:</label>
              <input type="text" id="student_code" name="student_code" class="form-control">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit'>View</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</form>

                </div>
            </div>
        </div>
    </div>


  <?php include 'footer.php' ?>

  <script>
    $('#view_result').click(function() {
      $('#view_student_results').modal('show');
    });

    $('#view_teacher_result').click(function() {
      $('#view_teacher_results').modal('show');
    });

    $('#login-form').submit(function(e) {
      e.preventDefault();
      // Your login form submission logic here
    });

    $('#vsr-frm').submit(function(e) {
      e.preventDefault();
      // Your student result submission logic here
    });

    $('#vtr-frm').submit(function(e) {
      e.preventDefault();
      // Your teacher result submission logic here
    });
  </script>
</body>

</html>


</body>
<?php include 'footer.php' ?>
<script>
  $('#view_result').click(function(){
    $('#view_student_results').modal('show')
  })
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
  $('#vsr-frm').submit(function(e){
    e.preventDefault()
   start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login2',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load()
      },
      success:function(resp){
        if(resp == 1){
          location.href ='student_results.php';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Student ID # is incorrect.</div>')
           end_load()
        }
      }
    })
  })
	$('.number').on('input keyup keypress',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9 \,]/, '');
        val = val.toLocaleString('en-US')
        $(this).val(val)
    })
    


    $('#submit_teacher').click(function(){
    $('#view_teacher_results').modal('show');
});

$('#view_teacher_results form').submit(function(e){
    e.preventDefault();
    start_load();

    if($(this).find('.alert-danger').length > 0 )
        $(this).find('.alert-danger').remove();
    
    $.ajax({
        url: 'ajax.php?action=login_teacher',
        method: 'POST',
        data: $(this).serialize(),
        error: err => {
            console.log(err);
            end_load();
        },
        success: function(resp){
            if(resp == 1){
                location.href = 'teacher_results.php';
            } else {
                $('#view_teacher_results form').prepend('<div class="alert alert-danger">Teacher ID # is incorrect.</div>');
                end_load();
            }
        }
    });
});

</script>	
</html>