
        </div>             
        
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/table-data.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
        <!-- model pop-up Script for all pages with bootstrap js -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".click_view").click(function(){
                    var modalId = $(this).attr('data-modalId');
                    $("#myModal_"+modalId).modal('show');  
               });                  
           });
        </script>
        <!--Script For Image preview-->
        <script type="text/javascript">
            function imgPreview(name) {
                if (name.files && name.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img-preview')
                            .attr('src', e.target.result)
                            .width(150)
                            .height(150);
                    };
                    reader.readAsDataURL(name.files[0]);
                }
            }
        </script>
        
    </body>
</html>