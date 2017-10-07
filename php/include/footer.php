</div>
</div>

<!--footer-->
<div class="footer">
   <p>&copy; 2016 Novus Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
</div>
<!--//footer-->
</div>
<!-- Classie -->
<script src="js/classie.js"></script>
<script>
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;

    showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
    };


    function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
            classie.toggle( showLeftPush, 'disabled' );
        }
    }
</script>
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"> </script>
<script src="js/dropzone.js"> </script>
<script type="text/javascript">
Dropzone.options.dz = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    acceptedFiles: '.jpg',
    init: function() {
        this.on("addedfile", function(file) { alert("Added file."); });
    },
    renameFile : function(file){
        var fn = file.name,
            sfn = fn.split('.'),
            ext = sfn[sfn.length - 1],
            ts = Date.now();
            file.name = ts + ext;
        console.log(fn, sfn, ext, ts, file.name);
    },
    accept: function(file, done) {
    if (file.name == "avequipmentrentalsdallas.jpg") {
      done("Naha, you don't.");
    }
    else { done(); }
    }
};
</script>
</body>
</html>
