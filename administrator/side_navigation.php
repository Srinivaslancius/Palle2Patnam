
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <?php $getLoginData = getIndividualDetails( $_SESSION['admin_user_id'],"admin_users","id");?>
                        <div class="sidebar-profile-info">
                            <a href="javascript:void(0);" class="account-settings-link">
                                <p><?php echo $getLoginData['admin_name']; ?></p>
                                <span><?php echo $getLoginData['admin_email']; ?><i class="material-icons right">arrow_drop_down</i></span>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-account-settings">
                        <ul>                            
                            <li class="divider"></li>
                            <li class="no-padding">
                                <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>
                        </ul>
                    </div>
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding "><a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>                    
                    
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">mode_edit</i>Users<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                               <li class="no-padding "><a class="waves-effect waves-grey" href="admin_users.php"><i class="material-icons">settings_input_svideo</i>Admin Users</a></li>
                               <li class="no-padding "><a class="waves-effect waves-grey" href="users.php"><i class="material-icons">settings_input_svideo</i>Users</a></li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="no-padding "><a class="waves-effect waves-grey" href="banners.php"><i class="material-icons">settings_input_svideo</i>Banners</a></li>

                    <li class="no-padding "><a class="waves-effect waves-grey" href="categories.php"><i class="material-icons">settings_input_svideo</i>Categories</a></li>
                    
                </ul>
                
                </div>
            </aside>