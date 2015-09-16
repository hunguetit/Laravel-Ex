
<script src="{{ asset('/frontend/js/jquery.min.js' )}}"></script>
<!--js-->
<!---- start-smoth-scrolling---->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<script type="text/javascript" src="{{ asset('/frontend/js/move-top.js' )}}"></script>
		<script type="text/javascript" src="{{ asset('/frontend/js/easing.js' )}}"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script>
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{ asset("frontend/js/jquery.easydropdown.js") }}"></script>
<script src="{{ asset("frontend/js/responsiveslides.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("/assets/bootstrap/js/bootbox.min.js" )}}"></script>
<script type="text/javascript" src="{{ asset("/frontend/js/countingDown.js" )}}"></script>
<!-- <script src="{{ asset("comment/js/script.js") }}" type="text/javascript"></script> -->
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

<!---- start-smoth-scrolling---->
<script type="text/javascript">
			 $(window).load(function() {			
			  $("#bicycles").flexisel({
				visibleItems: 3,
				animationSpeed: 500,
				autoPlay: true,
				autoPlaySpeed: 1000,    		
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

	<script lang="javascript">
(function() {var _h1= document.getElementsByTagName('title')[0] || false;
var product_name = ''; if(_h1){product_name= _h1.textContent || _h1.innerText;}var ga = document.createElement('script'); ga.type = 'text/javascript';
ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=ed8baba82bc3e47c62f6e6fd4a66e5a8&data=eyJzc29faWQiOjMwMzk1MjEsImhhc2giOiJlNDY1NjU1NjljNjljMzM1MmExZTI5YWNlZDU0MGQzMyJ9&pname='+product_name;
var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
</script><noscript><a href="http://www.vatgia.com" title="vatgia.com" target="_blank">Tài trợ bởi vatgia.com</a></noscript><noscript><a href="http://vchat.vn" title="vchat.vn" target="_blank">Phát triển bởi vchat.vn</a></noscript>	