<div class="container" style="margin-top: 100px; padding-bottom: 50px;">
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a href="#" class="list-group-item list-group-item-action active" id="profile_link">Profile</a>
              <a href="#" class="list-group-item list-group-item-action" id="order_link">Orders</a>
            </div> 
		</div>
		<div class="col-md-9">
		    <div class="card" id="profile">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Your Profile</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form method="POST">
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Name</label> 
                                    <div class="col-8">
                                        <input id="name" name="name" placeholder="Name" class="form-control here" required="required" type="text" value="<?php echo $customer['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input id="originalEmail" name="originalEmail" type="text" value="<?php echo $customer["email"]; ?>" hidden>
                                    <label for="email" class="col-4 col-form-label">Email</label> 
                                    <div class="col-8">
                                        <input id="email" name="email" placeholder="Email" class="form-control here" type="email" value="<?php echo $customer['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-4 col-form-label">Phone</label> 
                                    <div class="col-8">
                                        <input id="phone" name="phone" placeholder="Phone" class="form-control here" type="text"  value="<?php echo $customer['phone']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birthday" class="col-4 col-form-label">Birthday</label> 
                                    <div class="col-8">
                                        <input id="birthday" name="birthday" placeholder="Birthday" class="form-control here" required="required" type="date"  value="<?php echo $customer['birthdate']; ?>">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="btnUpdate" type="button" class="btn btn-primary" onclick="updateInfor(<?php echo $_SESSION['id']; ?>)">Update My Profile</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <button name="btnChangePassword" type="button" class="btn btn-warning" data-toggle="modal" data-target="#changePasswordModal">
                                            Change Password
                                        </button>
                                    </div>
                                    <div class="offset-4 col-4">
                                        <button name="btnLogout" type="button" class="btn btn-danger float-right" onclick="window.location.href='../authenticate/logout.php'">Logout</button>
                                    </div>
                                </div>
                            </form>
		                </div>
		            </div>
		        </div>
		    </div>
            <div class="row" id="orders">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 id="titleTable">
                                Your Orders
                            </h3>
                        </div>
                        <div class="card-content">

                            <table class="table table-striped table-hover table-responsive-lg">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">OrderID</th>
                                        <th class="font-weight-bold">Total Price</th>
                                        <th class="font-weight-bold">Order Time</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "select * from shopping_log where customer_id={$customer['id']}";
                                    $result = $mysql_db->query($sql);
                                    if ($result) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <tr id=<?php echo $row['id']; ?>>
                                                <td>#<?php echo $row['id']; ?></td>
                                                <td>$<?php echo $row['total_price']; ?></td>
                                                <td><?php echo $row['created_at']; ?></td>

                                                <th><button class="btn btn-info" data-toggle="collapse" data-target=<?php echo "#detail" . $row['id']; ?> aria-expanded="false" aria-controls=<?php echo "detail" . $row['id']; ?>>View
                                                        detail</button>
                                                </th>
                                            </tr>

                                            <tr id=<?php echo $row['id'] . "collapse"; ?>>
                                                <th colspan="9">
                                                    <div class="card collapse" id=<?php echo "detail" . $row['id']; ?>>
                                                        <div class="card-header">
                                                            <h6 id="titleTable">
                                                                Order Detail
                                                            </h6>
                                                        </div>
                                                        <div class="card-content p-3">
                                                            <table class="table table-striped table-hover table-responsive-lg">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="font-weight-bold">Name</th>
                                                                        <th class="font-weight-bold">Category</th>
                                                                        <th class="font-weight-bold">Image</th>
                                                                        <th class="font-weight-bold">Unit Price</th>
                                                                        <th class="font-weight-bold">Quantity</th>
                                                                        <th class="font-weight-bold">Total Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $sql = "select * from shopping_log_entry where log_id = '" . $row['id'] . "'";
                                                                    $result2 = $mysql_db->query($sql);
                                                                    if ($result2) {
                                                                        while ($row2 = $result2->fetch_assoc()) {
                                                                    ?>
                                                                            <tr>
                                                                                <td>

                                                                                    <?php
                                                                                    $sql = "select name, link_image, price, category from book where id = '" . $row2['book_id'] . "'";
                                                                                    $result3 = $mysql_db->query($sql);
                                                                                    if ($result3) {
                                                                                        $row3 = $result3->fetch_assoc();
                                                                                    }
                                                                                    echo $row3['name'];
                                                                                    ?>
                                                                                </td>
                                                                                <td><?php echo ucwords($row3['category']) ?></td>
                                                                                <td>
                                                                                    <img src="<?php echo $row3['link_image']; ?>" alt="" width="50" height="50">
                                                                                </td>
                                                                                <td>$<?php echo $row3['price']; ?></td>
                                                                                <td><?php echo $row2['quantity'] ?></td>
                                                                                <td>$<?php echo $row3['price'] * $row2['quantity']; ?>
                                                                                </td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                    
                                                                </tbody>
                                                            </table>
                                                            <p class="ml-3"><strong>Shipping Cost:</strong> $2</p>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <th colspan="10" class="text-center">
                                            ---End---
                                        </th>
                                    </tr>
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>
            </div>
		</div>
	</div>
</div>
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog"
    aria-labelledby="customerModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="changePassForm">
                    <div class="form-group row align-items-center justify-content-center">
                        <label for="oldPassword"
                            class="col-3 col-form-label"><strong>Current Password</strong></label>
                        <div class="col-9">
                            <input class="form-control" type="password" value="" placeholder="Current Password"
                                id="oldPassword">
                            <input class="form-control" type="password" value="<?php echo $customer["password"]; ?>"
                                id="oldHashPassword" hidden>
                        </div>
                        <span class="text-danger" id="oldPassErr"></span>
                    </div>
                    <div class="form-group row align-items-center justify-content-center">
                        <label for="newPassword"
                            class="col-3 col-form-label"><strong>New Password</strong></label>
                        <div class="col-9">
                            <input class="form-control" type="password" value="" placeholder="New Password"
                                id="newPassword">
                        </div>
                        <span class="text-danger" id="newPassErr"></span>
                    </div>
                    <div class="form-group row align-items-center justify-content-center">
                        <label for="confirmNewPassword"
                            class="col-3 col-form-label"><strong>Confirm Password</strong></label>
                        <div class="col-9">
                            <input class="form-control" type="password" value="" placeholder="Confirm Password"
                                id="confirmNewPassword">
                        </div>
                        <span class="text-danger" id="newPassConfErr"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"
                    onclick="changePassword(<?php echo $customer['id']; ?>)">Save changes</button>
            </div>
        </div>
    </div>
</div>