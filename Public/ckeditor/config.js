//4.6.0
CKEDITOR.editorConfig = function( config ) {
	config.language = 'zh-cn';
	config.width = '99%';
  config.height = 400;
	config.toolbar = 'Basic';
	config.toolbar_Basic =[
		['Source', 'Preview', 'PageBreak', '-', 'SpecialChar', 'Bold', 'Italic', 'TextColor', 'BGColor', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'PasteText', 'Blockquote', 'Image', 'ShowBlocks'],
	];
	config.image_previewText = ' '; 
	config.removeDialogTabs = 'image:Link;image:advanced;link:advanced;link:upload';//image:info;
	//config.enterMode = CKEDITOR.ENTER_BR;
	//config.shiftEnterMode = CKEDITOR.ENTER_P;
};
