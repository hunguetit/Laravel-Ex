<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: "textarea",
		relative_urls: false,
		remove_script_host: false,
		plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
		],
		toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
		toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
		image_advtab: true,
		external_filemanager_path:"http://localhost/codeDemo/demo/filemanager/",
		filemanager_title:"Responsive Filemanager",
		external_plugins: { "filemanager" : "http://localhost/codeDEMO/demo/filemanager/plugin.min.js"}
	});
</script>

<textarea></textarea>

