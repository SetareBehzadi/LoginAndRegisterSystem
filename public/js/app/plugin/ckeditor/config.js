/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    /* config.removePlugins = 'templates,about,maximize,bgimage,image,language';
     config.removeButtons = 'Underline,Source,Templates,JustifyCenter,Form,' +
         'Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Replace,SelectAll,Scayt,'+
         'Checkbox,Radio,TextField,Textarea,HiddenField,Select,ImageButton,Button,'+
         'NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Language,'+
     'Strike,Subscript,Superscript,RemoveFormat,CopyFormatting,Link,Unlink,Anchor,MediaEmbed,Flash,Html5video,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,InsertPre,CreatePlaceholder'+
     ',NewPage,Preview,Save,Print,Preview,Find,About,Maximize,ShowBlocks,Image';
 */
    config.toolbarGroups = [
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'styles' },
        { name: 'colors' },
    ];
    config.removeButtons = 'Strike,Subscript,Superscript,RemoveFormat,CopyFormatting,Font';
    config.removeDialogTabs = 'link:advanced';
    config.contentsCss = '/css/app/plugin/IRANSans/fontiran.css';
    config.font_names = 'iranFont/IRANSans;' + config.font_names;

};
