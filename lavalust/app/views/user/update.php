<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container{
        height: 800px;
        width: 600px;
      }
    </style>
</head>
</head>
<body>
<div class="container mt-3">
  <h2>Update User</h2>
  <?php flash_alert(); ?>
  <form action="<?=site_url('/user/update/'.segment(4));?>" method="POST">
    <div class="mb-3 mt-3">
      <label for="rsm_last_name">LastName:</label>
      <input type="text" class="form-control" id="rsm_last_name" name="rsm_last_name" value="<?=$user['rsm_last_name'];?>">
    </div>
    <div class="mb-3">
    <label for="rsm_first_name">FirstName:</label>
    <input type="text" class="form-control" id="rsm_first_name" name="rsm_first_name" value="<?=$user['rsm_first_name'];?>">
    </div>
    <div class="mb-3">
    <label for="rsm_email">Email:</label>
    <input type="text" class="form-control" id="rsm_email" name="rsm_email" value="<?=$user['rsm_email'];?>">
    </div>
    <div class="mb-3">
    <label for="rsm_gender">Gender:</label>
    <input type="text" class="form-control" id="rsm_gender" name="rsm_gender" value="<?=$user['rsm_gender'];?>">
    </div>
    <div class="mb-3">
    <label for="rsm_address">Address:</label>
    <input type="text" class="form-control" id="rsm_address" name="rsm_address" value="<?=$user['rsm_address'];?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a class="btn btn-primary mt-1" role="button" href="<?=site_url('/user/display')?>">Show Users</a>
  </form>
</div>
</body>
</html>