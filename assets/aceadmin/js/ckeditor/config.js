/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	// 
	// 

	config.height = '500px';
	// Toolbar configuration generated automatically by the editor based on config.toolbarGroups.

	config.extraPlugins               = 'youtube,image';
	/*config.filebrowserUploadUrl     = window.location.host+'ckupload.php';
	config.image_removeLinkByEmptyURL = true;
	config.image_previewText          = CKEDITOR.tools.repeat( 'ตัวอย่างรูปภาพ ', 100 );*/
	config.filebrowserBrowseUrl       = 'http://'+window.location.host+'/assets/aceadmin/js/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl  = 'http://'+window.location.host+'/assets/aceadmin/js/ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl  = 'http://'+window.location.host+'/assets/aceadmin/js/ckfinder/ckfinder.html?Type=Images';
	config.filebrowserUploadUrl       = 'http://'+window.location.host+'/assets/aceadmin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl  = 'http://'+window.location.host+'/assets/aceadmin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl  = 'http://'+window.location.host+'/assets/aceadmin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};

 