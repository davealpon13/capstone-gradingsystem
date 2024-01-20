<!DOCTYPE html>
<html lang="en">

<!-- Include your PHP session and database connection logic here -->

<head>
    <!-- Include your meta tags, stylesheets, and other head elements here -->
</head>

<body>
    <!-- Your HTML content for the homepage goes here -->

    <!-- Teacher Login Modal -->
    <div class="modal fade" id="teacherLoginModal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Teacher Result</h5>
                </div>
                <div class="modal-body">
                    <form id="vtr-frm">
                        <div class="form-group">
                            <label for="teacher_code" class="control-label">Teacher ID #:</label>
                            <input type="text" id="teacher_code" name="teacher_code" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='submit_teacher'>Login</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include your JavaScript libraries and scripts here -->

    <script>
        $(document).ready(function () {
            $('#submit_teacher').click(function () {
                var teacherCode = $('#teacher_code').val();

                $.ajax({
                    type: 'POST',
                    url: 'teacher_login.php', // Replace with the actual PHP file to handle teacher login
                    data: {
                        teacher_code: teacherCode
                    },
                    success: function (response) {
                        if (response.trim() === 'success') {
                            // Redirect to the teacher's specific home page based on their role or ID
                            // For example, you can have a switch statement to handle different teacher IDs
                            // and redirect them accordingly
                            switch (teacherCode) {
                                case 'teacher1':
                                    window.location.href = 'teacher1_dashboard.php';
                                    break;
                                case 'teacher2':
                                    window.location.href = 'teacher2_dashboard.php';
                                    break;
                                default:
                                    // Redirect to a default home page if the teacher code is not recognized
                                    window.location.href = 'default_teacher_dashboard.php';
                                    break;
                            }
                        } else {
                            alert('Teacher login failed. Please check your ID and try again.');
                        }
                    },
                    error: function (error) {
                        console.log(error);
                        alert('Error occurred during teacher login.');
                    }
                });
            });
        });
    </script>
</body>

</html>
