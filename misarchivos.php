<script type="text/javascript" src="js/fileinput.min.js"></script>
 <style>
    .file-thumbnail-footer{
		display:none;
		visibility: hidden !important;
		}
		.file-preview-frame {
    display: table;
    margin: 8px;
    height: 160px;
    border: 1px solid #ddd;
    box-shadow: 1px 1px 5px 0 #a2958a;
    padding: 6px;
    float: left;
    text-align: center;
    vertical-align: middle;
}
 file-preview-image {
    height: 160px;
   width:160px;
}
    </style>
    <input id="archivo" name="imagenes[]" type="file" multiple=true class="file-loading">
	<?php 	
	$directory = "imagenes_/";      
	$images = glob($directory . "*.*");
	?>
	
<script>
	$("#archivo").fileinput({
	uploadUrl: "upload_arch.php", 
    uploadAsync: false,
    minFileCount: 1,
    maxFileCount: 20,
	showUpload: false, 
	showRemove: false,
	initialPreview: [
	<?php foreach($images as $image){?>
		<?php if(end(explode(".", $image))=="jpg" || end(explode(".", $image))=="png"){?>
  "<img src='<?php echo $image; ?>' width='160px' height='160px' class='file-preview-image'>",
    <?php }else if(end(explode(".", $image))=="mp3"){?>
 "<audio src='<?php echo $image; ?>' style='width: 160px;height: 160px;' class='file-preview-image' controls='controls'>",
  <?php }else if(end(explode(".", $image))=="mp4"){?>
 "<video src='<?php echo $image; ?>' style='width: 160px;height: 160px;' class='file-preview-image' controls='controls'>",
 <?php } ?>
	<?php } ?>],
    initialPreviewConfig: [<?php foreach($images as $image){ $infoImagenes=explode("/",$image);?>
	{caption: "<?php echo $infoImagenes[1];?>", width:"160px",  height: "160px", url: "borrar.php", key:"<?php echo $infoImagenes[1];?>"},
	<?php } ?>]
	}).on("filebatchselected", function(event, files) {
	
	$("#archivo").fileinput("upload");
	
	});
	
	</script>