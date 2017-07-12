 <?php include_once 'main_header.php'; ?>
           
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