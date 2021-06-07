<div class="container" style="margin-top: 100px; padding-bottom: 50px;">
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a href="#" class="list-group-item list-group-item-action active">Profile</a>
              <a href="#" class="list-group-item list-group-item-action">Orders</a>
            </div> 
		</div>
		<div class="col-md-9">
		    <div class="card">
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