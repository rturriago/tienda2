/**
 * Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

/* exported initSample */

if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
	CKEDITOR.tools.enableHtml5Elements( document );

// The trick to keep the editor in the sample quite small
// unless user specified own height.

CKEDITOR.config.height = 150;
CKEDITOR.config.width = 'auto';
CKEDITOR.config.toolbar = [
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList'] },
		{ name: 'insert', items: [ 'SpecialChar' ] }
];


CKEDITOR.config.removeButtons = 'Source,Save,Templates,Find,SelectAll,Scayt,Form,Image,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,NewPage,ExportPdf,Preview,Print,Paste,PasteText,PasteFromWord,Replace';
var initWYSWYG = ( function() {
	var wysiwygareaAvailable = isWysiwygareaAvailable(),
		isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

	return function() {
		var editorElement = CKEDITOR.document.getById( 'editor' );

		// :(((
		if ( isBBCodeBuiltIn ) {
			editorElement.setHtml(
				'Hello world!\n\n' +
				'I\'m an instance of [url=https://ckeditor.com]CKEditor[/url].'
			);
		}

		if ( wysiwygareaAvailable ) {
			CKEDITOR.replace( 'resIntro' , { 
				extraPlugins: 'wordcount', 
					 wordcount: {
							showParagraphs: false,
							showWordCount: true,
							countSpacesAsChars:true,
							countHTML:false,
							maxWordCount: 40,
							maxCharCount: -1  //word limit
						}
					});
			CKEDITOR.replace( 'resObjetivo' , { 
				extraPlugins: 'wordcount', 
					 wordcount: {
							showParagraphs: false,
							showWordCount: true,
							countSpacesAsChars:true,
							countHTML:false,
							maxWordCount: 30,
							maxCharCount: -1  //word limit
						}
					} );
			CKEDITOR.replace( 'resMetodologia', { 
				extraPlugins: 'wordcount', 
					 wordcount: {
							showParagraphs: false,
							showWordCount: true,
							countSpacesAsChars:true,
							countHTML:false,
							maxWordCount: 80,
							maxCharCount: -1  //word limit
						}
					} );
			CKEDITOR.replace( 'resResultados' , { 
				extraPlugins: 'wordcount', 
					 wordcount: {
							showParagraphs: false,
							showWordCount: true,
							countSpacesAsChars:true,
							countHTML:false,
							maxWordCount: 130,
							maxCharCount: -1  //word limit
						}
					});
			CKEDITOR.replace( 'resConclusiones', { 
				extraPlugins: 'wordcount', 
					 wordcount: {
							showParagraphs: false,
							showWordCount: true,
							countSpacesAsChars:true,
							countHTML:false,
							maxWordCount: 40,
							maxCharCount: -1  //word limit
						}
					} );
			CKEDITOR.replace( 'regTitulo' , { 
				extraPlugins: 'wordcount', 
					 wordcount: {
							showParagraphs: false,
							showWordCount: true,
							countSpacesAsChars:true,
							countHTML:false,
							maxWordCount: 20,
							maxCharCount: -1  //word limit
						}
					} );
			
		} else {
			editorElement.setAttribute( 'contenteditable', 'true' );
			CKEDITOR.inline( 'editor' );

			// TODO we can consider displaying some info box that
			// without wysiwygarea the classic editor may not work.
		}
	};

	function isWysiwygareaAvailable() {
		// If in development mode, then the wysiwygarea must be available.
		// Split REV into two strings so builder does not replace it :D.
		if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
			return true;
		}

		return !!CKEDITOR.plugins.get( 'wysiwygarea' );
	}
} )();

