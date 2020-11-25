<!-- Login / Register Modal-->
                        <div class="modal fade login-register-form" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#login-form"> Login <span class="glyphicon glyphicon-user"></span></a></li>
                                            <li><a data-toggle="tab" href="#registration-form"> Register <span class="glyphicon glyphicon-pencil"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="modal-body">
                                        <div class="tab-content">
                                            <div id="login-form" class="tab-pane fade in active">
                                                <form id="form" action="main_file/login.php" method="post">
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pwd">Password:</label>
                                                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="remember"> Remember me</label>
                                                    </div>
                                                    <button type="submit" class="btn btn-default">Login</button>
                                                </form>
                                            </div>
                                            <div id="registration-form" class="tab-pane fade">
                                                <form id="form" action="main_file/register.php" method="post">
                                                    <div class="form-group">
                                                        <label for="newemail">Email:</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Enter new email" name="email" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newpwd">Password:</label>
                                                        <input type="password" name="password" id="password" tabindex="6" class="form-control" minlength="6" maxlength="100" placeholder="Please Input Your Password" required=" ">
                                                    </div>
													<div class="form-group">
                                                        <label for="newpwd">New Password:</label>
                                                        <input type="password" name="con_password" id="con_password" tabindex="7" class="form-control" placeholder="Please Input Your Confirm Password" oninput="check(this)" required=" ">
                                                    </div>
													<div class="form-group">
                                                        <label for="newpwd">Role:</label>
                                                        <select name="role" class="form-control" id="role" required>
														  <option value="">Please Select</option>
														  <option value="1">User</option>
														</select>
													</div>
                                                    <button type="submit" class="btn btn-default">Register</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
<!--                                    <div class="modal-footer">-->
<!--                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>