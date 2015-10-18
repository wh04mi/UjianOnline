tinyMCE.init({
mode : "exact",
elements : "elm4",
theme : "advanced",
skin : "o2k7",
skin_variant : "silver",
plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,insertdatetime,preview,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave,print,media",

// Theme options
theme_advanced_buttons1 : "save,|,newdocument,|,bold,|,italic,|,underline,|,strikethrough,|,blockquote,|,justifyleft,|,justifycenter,|,justifyright,|,justifyfull,|,bullist,|,numlist,|,link,|,unlink,|,image,|,insertdate,|,inserttime,|,media,|,ltr,|,rtl,|,template,|,code",

theme_advanced_buttons2 : "tablecontrols,|,charmap,|,hr,|,undo,|,redo,|,preview,|,sub,|,sup,|,help,preview,|,removeformat,|,visualaid,|,print,|,nonbreaking,|,fullscreen",

theme_advanced_buttons3 : "forecolor,|,backcolor,formatselect,fontselect,fontsizeselect,styleselect,|,search,|,replace,|,insertlayer,|,cut,|,copy,|,paste",

theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,

template_replace_values : {
username : "Some User",
staffid : "991234"
}
});