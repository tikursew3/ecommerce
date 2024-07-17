<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<h3 class="text-center">All Users</h3>

<table class="table table-bordered mt-5 text-center">
  <thead class="bg-info">
    <?php
    $get_users = "SELECT * from `user_table`";
    $result_users = mysqli_query($conn, $get_users);
    $row_count = mysqli_num_rows($result_users);

    if ($row_count == 0) {
      echo "<h2 class='text-danger text-center mt-5'> No Users</h2>";
    } else {
      echo "
                <th> User ID </th>
                <th> First Name </th>
                <th> Last Name</th>
                <th> User Image </th>
                <th> Email </th>
                <th> User Address </th>
                <th> User Contact</th>
                <th> User Name  </th>
                <th> Delete </th> ";
    }
    ?>
  </thead>
  <tbody class='bg-secondary text-light'>
    <?php
    while ($row_users = mysqli_fetch_assoc($result_users)) {
      $user_id = $row_users['user_id'];
      $first_name = $row_users['first_name'];
      $last_name = $row_users['last_name'];
      $user_image = $row_users['user_image'];
      $email = $row_users['email'];
      $user_address = $row_users['user_address'];
      $user_contact = $row_users['user_contact'];
      $username = $row_users['username'];

      echo "
                <tr>
                <td>$user_id  </td>
                <td>$first_name  </td>
                <td>$last_name  </td>
                <td><img src='../images/$user_image' alt'user image' class='product_img' </td>
                <td>$email  </td>
                <td>$user_address  </td>
                <td>$user_contact  </td>
                <td>$username  </td>
                <td><a href='index.php?delete_users=$user_id' 
                    type='button' class='text-light' data-toggle='modal' data-target='#exampleModal' >
                    <i class='fa-solid fa-trash'> </i></a>
                    </td>

                </tr>
                ";
    }

    ?>


  </tbody>
</table>


<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
 -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <h4>are you sure you want delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?view_users' class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a <a href='index.php?delete_users=<?php echo $user_id ?>' class="text-light  text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>