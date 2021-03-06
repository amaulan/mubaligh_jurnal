<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2016 &copy; <b>AA-Team - Mubaligh Jurnal Apps</b> </div>
</div>


<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/js/bower_components/jquery-image-reader/jquery.imagereader-1.1.0.min.js') }}"></script>


<script src="{{ url('assets/js/jquery.ui.custom.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">
  $(function() {
    $('[data-toggle="tooltip"]').tooltip();


    $('#{{ $data['page']['active'] }}').addClass('active')

    // With config and callback
		$('#profil-img').imageReader({
		  destination: '#image-preview',
		  onload: function(img) {
		        // your callback code
		        $(img).css({
		        	'margin-top' : '20px',
              'margin-right' : '20px',
		        	'max-width'		 : '100%',
		        	"max-height"	 : '700px'
		        });
		    }
		});

  })
</script>
<script src="{{ url('assets/js/jquery.uniform.js') }}"></script>
<script src="{{ url('assets/js/select2.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/js/matrix.js') }}"></script>
<script src="{{ url('assets/js/matrix.tables.js') }}"></script>
<script src="{{ url('assets/js/matrix.interface.js') }}"></script>
<script src="{{ url('assets/js/matrix.popover.js') }}"></script>



<!--end-Footer-part-->

<!--<script src="{{ url('assets/js/excanvas.min.js') }}"></script>-->
<!--<script src="{{ url('assets/js/jquery.min.js') }}"></script>-->
<!--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>-->
<!--<script src="{{ url('assets/js/jquery.ui.custom.js') }}"></script>-->
<!--<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>-->
<!--<script src="{{ url('assets/js/jquery.uniform.js') }}"></script>-->
<!--<script src="{{ url('assets/js/select2.min.js') }}"></script>-->
<!--<script src="{{ url('assets/js/matrix.popover.js') }}"></script>-->
<!--<script src="{{ url('assets/js/matrix.tables.js') }}"></script>-->
<!--<script src="{{ url('assets/js/jquery.validate.js') }}"></script>-->
<!--<script src="{{ url('assets/js/matrix.form_validation.js') }}"></script>-->
<!--<script src="{{ url('assets/js/jquery.wizard.js') }}"></script>-->
<!--<script src="{{ url('assets/js/jquery.gritter.min.js') }}"></script>-->
<!--<script src="{{ url('assets/js/matrix.interface.js') }}"></script>-->
<!--<script src="{{ url('assets/js/matrix.chat.js') }}"></script>-->
<!--<script src="{{ url('assets/js/jquery.peity.min.js') }}"></script>-->
<!--<script src="{{ url('assets/js/fullcalendar.min.js') }}"></script>-->
<!--<script src="{{ url('assets/js/matrix.js') }}"></script>-->
<!--<script src="{{ url('assets/js/matrix.dashboard.js') }}"></script>-->

<!--<script src="{{ url('assets/js/excanvas.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.ui.custom.js') }}"></script>
<script src="{{ url('assets/js/jquery.wizard.js') }}"></script>

<script src="{{ url('assets/js/select2.min.js') }}"></script>-->

<!--<script src="{{ url('assets/js/jquery.gritter.min.js') }}"></script>-->
<!--<script src="{{ url('assets/js/jquery.peity.min.js') }}"></script>-->
<!--<script src="{{ url('assets/js/matrix.js') }}"></script>-->
<!--<script src="{{ url('assets/js/matrix.interface.js') }}"></script>-->
<!--<script src="{{ url('assets/js/matrix.popover.js') }}"></script>-->




<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:



  function goPage(newURL) {

    // if url is empty, skip the menu dividers and reset the menu selection to default
    if (newURL != "") {

      // if url is "-", it is this page -- reset the menu:
      if (newURL == "-") {
        resetMenu();
      }
      // else, send page to designated URL
      else {
        document.location.href = newURL;
      }
    }
  }

  // resets the menu selection upon entry to this page:
  function resetMenu() {
    document.gomenu.selector.selectedIndex = 2;
  }
</script>

@yield('jquery')

</body>

</html>
