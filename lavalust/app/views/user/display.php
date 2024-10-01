<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <!-- Search Form -->
            <form action="<?= site_url('/user/search') ?>" method="GET">
                <input type="text" name="query" placeholder="Search..." value="<?= isset($_GET['query']) ? $_GET['query'] : '' ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            
            <a class="btn btn-primary mb-2" role="button" href="<?= site_url('/user/add') ?>">Add User</a>
            <?php flash_alert(); ?>
            
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>

                <?php if (!empty($user)): ?>
                    <?php foreach($user as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= $p['rsm_last_name'] ?></td>
                        <td><?= $p['rsm_first_name'] ?></td>
                        <td><?= $p['rsm_email'] ?></td>
                        <td><?= $p['rsm_gender'] ?></td>
                        <td><?= $p['rsm_address'] ?></td>
                        <td>
                            <a href="<?= site_url('/user/update/'.$p['id']) ?>">Update</a> |
                            <a href="<?= site_url('/user/delete/'.$p['id']) ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No users found</td>
                    </tr>
                <?php endif; ?>
            </table>
            
            <!-- Pagination Links -->
            <!-- Pagination Links -->
        <?php if (isset($total_pages) && $total_pages > 1): ?>
            <nav>
                <ul class="pagination">
                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                            <a class="page-link" href="<?= site_url('/user/display?page=' . $i) ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>

        </div>
    </div>
</div>
</body>
</html>