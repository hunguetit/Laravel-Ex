<script src="{{ asset("admin/assets/global/plugins/jquery.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/jquery-migrate.min.js") }}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ asset("admin/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/jquery.blockui.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/jquery.cokie.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/uniform/jquery.uniform.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="{{ asset("admin/assets/global/plugins/flot/jquery.flot.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/flot/jquery.flot.resize.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/flot/jquery.flot.categories.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/jquery.pulsate.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/bootstrap-daterangepicker/moment.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js") }}" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="{{ asset("admin/assets/global/plugins/fullcalendar/fullcalendar.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/global/plugins/jquery.sparkline.min.js") }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset("admin/assets/global/scripts/metronic.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/admin/layout/scripts/layout.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/admin/layout/scripts/quick-sidebar.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/admin/layout/scripts/demo.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/admin/pages/scripts/index.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/assets/admin/pages/scripts/tasks.js") }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset("admin/assets/global/plugins/select2/select2.min.js") }}" ></script>
<script type="text/javascript" src="{{ asset("admin/assets/global/plugins/datatables/media/js/jquery.dataTables.js") }}" ></script>
<script type="text/javascript" src="{{ asset("admin/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js") }}" ></script>

<script src="{{ asset("admin/assets/admin/pages/scripts/table-managed.js") }}"></script>
<script src="{{ asset("admin/assets/admin/pages/scripts/table-editable.js") }}"></script>

<script type="text/javascript" src="{{ asset("/assets/bootstrap/js/bootbox.min.js" )}}"></script>

<script src="{{ asset("assets/js/jquery.shorten.1.0.js") }}" type="text/javascript"></script>
<script src="{{ asset("assets/js/jquery.bpopup.min.js") }}" type="text/javascript"></script>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{ asset("frontend/js/jquery.easydropdown.js") }}"></script>
<script src="{{ asset("frontend/js/responsiveslides.min.js") }}"></script>
<script src="{{ asset("tinymce/tinymce.min.js") }}" type="text/javascript"></script>

<script src="{{ asset("fileinput/js/fileinput.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("fileinput/js/fileinput_locale_es.js") }}" type="text/javascript"></script>
<script src="{{ asset("fileinput/js/fileinput_locale_fr.js") }}" type="text/javascript"></script>
<script type="text/javascript">
  tinymce.init({
    selector: "textarea",
    relative_urls: false,
    remove_script_host: false,
    height: '300px',
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
    ],
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
    image_advtab: true,
    external_filemanager_path: <?php $chuoi1= url()."/filemanager/"; echo '"'.$chuoi1.'"'; ?>,
    filemanager_title:"Responsive Filemanager",
    external_plugins: { "filemanager" : <?php $chuoi2= url()."/filemanager/plugin.min.js"; echo '"'.$chuoi2.'"'; ?>}
  });

</script>
<script>
    $("#file-1").fileinput({
        uploadUrl: '{{asset('admin/product_add')}}', // you must set a valid URL here else you will get an error
        allowedFileExtensions : ['jpg', 'png','gif', 'jpeg'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
  });
    $(document).ready(function() {
        $("#test-upload").fileinput({
            'showPreview' : false,
            'allowedFileExtensions' : ['jpg', 'png','gif'],
            'elErrorContainer': '#errorBlock'
        });
    });
</script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
         auto: false,
         nav: true,
         speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
  <script src="{{ asset("frontend/js/jquery.etalage.min.js") }}"></script>
            <script>
         jQuery(document).ready(function($){

            $('#etalage').etalage({
               thumb_image_width: 400,
               thumb_image_height: 400,
               source_image_width: 800,
               source_image_height: 1000,
               show_hint: true,
               click_callback: function(image_anchor, instance_id){
                  alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
               }
            });

         });
      </script>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
       $(window).load(function() {      
        $("#flexiselDemo1").flexisel({
        visibleItems: 3,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,        
        pauseOnHover:true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
          portrait: { 
            changePoint:480,
            visibleItems: 1
          }, 
          landscape: { 
            changePoint:640,
            visibleItems: 2
          },
          tablet: { 
            changePoint:768,
            visibleItems: 3
          }
        }
      });
      });
      </script>
      <script type="text/javascript" src="{{ asset("/frontend/js/jquery.flexisel.js" )}}"></script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features 
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
   TableManaged.init();
});
</script>
@yield('script')