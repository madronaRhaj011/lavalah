<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD with AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <h2>User Management</h2>
  
  <!-- User Form -->
  <form id="userForm">
    <input type="hidden" id="userId">
    <div class="mb-3">
      <label for="last_name" class="form-label">Last Name:</label>
      <input type="text" class="form-control"  id="last_name" required>
    </div>
    <div class="mb-3">
      <label for="first_name" class="form-label">First Name:</label>
      <input type="text" class="form-control" id="first_name" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" required>
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">Gender:</label>
      <select class="form-control" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Address:</label>
      <input type="text" class="form-control" id="address" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>

  <!-- User Table -->
  <table class="table mt-3">
    <thead>
      <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="userTableBody"></tbody>
  </table>
</div>

<script>
  $(document).ready(function() {
    // Load Users
    function loadUsers() {
      $.get('<?= site_url('/user/read') ?>', function(data) {
        const users = JSON.parse(data);
        let rows = '';
        users.forEach(user => {
          rows += `
            <tr>
              <td>${user.rsm_last_name}</td>
              <td>${user.rsm_first_name}</td>
              <td>${user.rsm_email}</td>
              <td>${user.rsm_gender}</td>
              <td>${user.rsm_address}</td>
              <td>
                <button class="btn btn-warning btn-sm editBtn" data-id="${user.id}">Edit</button>
                <button class="btn btn-danger btn-sm deleteBtn" data-id="${user.id}">Delete</button>
              </td>
            </tr>
          `;
        });
        $('#userTableBody').html(rows);
      });
    }
    loadUsers();

    // Create or Update User
    $('#userForm').submit(function(e) {
      e.preventDefault();
      const id = $('#userId').val();
      const url = id ? '<?= site_url('/user/update') ?>' : '<?= site_url('/user/create') ?>';
      const user = {
        id: id,
        last_name: $('#last_name').val(),
        first_name: $('#first_name').val(),
        email: $('#email').val(),
        gender: $('#gender').val(),
        address: $('#address').val()
      };
      $.post(url, user, function(response) {
        const result = JSON.parse(response);
        alert(result.success ? 'Operation Successful' : 'Operation Failed');
        $('#userForm')[0].reset();
        $('#userId').val('');
        loadUsers();
      });
    });

    // Edit User
    $(document).on('click', '.editBtn', function() {
      const id = $(this).data('id');
      $.get('<?= site_url('/user/readone') ?>', { id: id }, function(data) {
        const user = JSON.parse(data);
        $('#userId').val(user.id);
        $('#last_name').val(user.rsm_last_name);
        $('#first_name').val(user.rsm_first_name);
        $('#email').val(user.rsm_email);
        $('#gender').val(user.rsm_gender);
        $('#address').val(user.rsm_address);
      });
    });

        // Delete User
    $(document).on('click', '.deleteBtn', function() {
        const id = $(this).data('id');
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: '<?= site_url('/user/delete') ?>',
                method: 'POST',
                data: { id: id },
                success: function(response) {
                    try {
                        const result = JSON.parse(response);
                        alert(result.success ? 'User Deleted' : 'Deletion Failed');
                        loadUsers();
                    } catch (e) {
                        console.error('Error parsing response:', e);
                        alert('An error occurred while processing the response');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    alert('An error occurred while deleting the user');
                }
            });
        }
    });
  });
</script>
</body>
</html>
