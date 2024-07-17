
<?php
     include('../includes/connect.php');
     include('../functions/common_function.php');
     
    ?>

<h3 class="text-center">All Categories</h3>

<table class="table table-bordered mt-5 text-center">
        <thead class="bg-info">
            <tr>
                <th>Category Id</th>
                <th>Category Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_category = "SELECT * from `categories`";
            $result_category = mysqli_query($conn,$get_category);
            while($row_category = mysqli_fetch_assoc($result_category)) {
                $category_id = $row_category['category_id'];  
                $category_title = $row_category['category_title'];
                
                ?>               
                <tr class='text-center '>
                    <td><?php echo $category_id; ?></td>
                    <td><?php echo $category_title; ?></td>
                   
    
                    <td><a href='index.php?edit_category=<?php echo $category_id?>' class='nav-link text-light '><i class='fa-solid
                    fa-pen-to-square'> </i></a>
                    </td>
                   

                    <td><a href='index.php?delete_category=<?php echo $category_id?>' 
                    type="button" class="text-light" data-toggle="modal" data-target="#exampleModal" >
                    <i class='fa-solid fa-trash'> </i></a>
                    </td>
                </tr>
            <?php                    
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='./index.php?view_category' 
        class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a <a href='index.php?delete_category=<?php echo $category_id?>' 
                    class="text-light  text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>