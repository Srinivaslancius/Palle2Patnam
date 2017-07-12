
<!DOCTYPE html>
<html lang="en">
<head>
        
        <!-- Title -->
        <title>Property Nidhi</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
       
        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
        
        <div class="mn-content fixed-sidebar">
             <header class="mn-header navbar-fixed">
                <?php include_once'header.php';?>
            </header>
            <div class="search-results">
                <div class="container search-container">
                    <div class="row">
                        <div class="col s12 search-head">
                            <div class="row">
                                <div class="col s12">
                                    <div class="left">
                                        <p class="search-results-title">Quick search results</p>
                                        <p class="search-filter left">
                                            <input type="checkbox" class="filled-in" id="filled-in-box" checked/>
                                            <label for="filled-in-box">Google search</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="res-not-found">No results found</div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <?php include_once 'side_navigation.php';?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Form Elements</div>
                    </div>
                    <div class="col s12 m12 l2"></div>
                    <div class="col s12 m12 l8">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Input fields</span><br>
                                <div class="row">
                                    <form class="col s12">
                                        <div class="row">
                                            
                                            <div class="input-field col s6">
                                                <input id="last_name" type="text" class="validate">
                                                <label for="last_name">Last Name</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select>
                                                    <option value="" selected>Choose your option</option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                </select>
                                                <label>Materialize Select</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <form class="col s12" action="#">
                                                <p class="p-v-xs col s4">
                                                    <input type="checkbox" id="test5" />
                                                    <label for="test5">Option 1</label>
                                                </p>
                                                <p class="p-v-xs col s4">
                                                    <input type="checkbox" id="test6" />
                                                    <label for="test6">Option 2</label>
                                                </p>
                                                <p class="p-v-xs col s4">
                                                    <input type="checkbox" id="test7" />
                                                    <label for="test7">Option 3</label>
                                                </p>
                                                
                                            </form>
                                        </div>
                                        <div class="row">
                                             <div class="input-field col s12">
                                                <textarea id="textarea1" class="materialize-textarea" length="120"></textarea>
                                                <label for="textarea1">Textarea</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <label for="birthdate">Birthdate</label>
                                                <input id="birthdate" type="text" class="datepicker">
                                            </div>
                                        </div>
                                         <div class="row">
                                            <form class="col s12">
                                                <p class="p-v-xs col s4">
                                                    <input  class="with-gap" name="group1" type="radio" id="test1" />
                                                    <label for="test1">Red</label>
                                                </p>
                                                <p class="p-v-xs col s4">
                                                    <input  class="with-gap" name="group1" type="radio" id="test2" />
                                                    <label for="test2">Yellow</label>
                                                </p>
                                                <p class="p-v-xs col s4">
                                                    <input class="with-gap" name="group1" type="radio" id="test3"  />
                                                    <label for="test3">Green</label>
                                                </p>
                                                
                                            </form>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <form action="#" class="p-v-xs">
                                                    <div class="file-field input-field">
                                                        <div class="btn teal lighten-1">
                                                            <span>File</span>
                                                            <input type="file">
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate" type="text">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m-b-xs">
                                                <small>For example, type 'Goog'</small>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">textsms</i>
                                                <input type="text" id="autocomplete-input" class="autocomplete">
                                                <label for="autocomplete-input">Autocomplete</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 l3">
                                                <a class="waves-effect waves-grey btn white m-b-xs">White</a>
                                            </div>
                                            <div class="col s12 l3">
                                                <a class="waves-effect waves-light btn blue m-b-xs">Blue</a>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col s12 m12 l2"></div>
                </div>
            </main>
            <div class="page-footer">
                <div class="footer-grid container">
                    <div class="footer-l white">&nbsp;</div>
                    <div class="footer-grid-l white">
                        <a class="footer-text" href="layout-right-sidebar.html">
                            <i class="material-icons arrow-l">arrow_back</i>
                            <span class="direction">Previous</span>
                            <div>
                                Right Sidebar
                            </div>
                        </a>
                    </div>
                    <div class="footer-r white">&nbsp;</div>
                    <div class="footer-grid-r white">
                        <a class="footer-text" href="form-wizard.html">
                            <i class="material-icons arrow-r">arrow_forward</i>
                            <span class="direction">Next</span>
                            <div>
                                Form Wizard
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
        
    </body>

</html>