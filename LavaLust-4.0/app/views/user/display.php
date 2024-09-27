<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display User</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row mt-3 ">
            <div class="col-lg-8 mx-auto">
                <table class="table table-bordered table-stripped">
                
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($user as $p): ?>
                    <tr>
                        <td><?php echo $p['id']; ?></td>
                        <td><?php echo $p['rsm_last_name']; ?></td>
                        <td><?php echo $p['rsm_first_name']; ?></td>
                        <td><?php echo $p['rsm_email']; ?></td>
                        <td><?php echo $p['rsm_gender']; ?></td>
                        <td><?php echo $p['rsm_address']; ?></td>
                        <td>
                            <a href=<?= site_url('user/update/'.$p['id']);?>>Edit</a>
                            <a href=<?= site_url('user/delete/'.$p['id']);?>>Delete</a>
                        </td>
                        
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>