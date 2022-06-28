            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#select_all').click(function(){
                if(this.checked){
                    $('.multi_check').each(function(){
                        this.checked=true;
                    })
                }else{
                    $('.multi_check').each(function(){
                        this.checked=false;
                    })
                }

            })
        })
    </script>

</body>

</html>