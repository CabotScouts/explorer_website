function tinymce_setup_callback(editor)
{
	editor.settings['paste_as_text'] = true;
	editor.settings['non_empty_elements'] += "svg,defs,pattern,desc,metadata,g,mask,path,line,marker,rect,circle,ellipse,polygon,polyline,linearGradient,radialGradient,stop,image,view,text,textPath,title,tspan,glyph,symbol,switch,use";
	editor.settings['table_default_attibutes'] = {
		border: '0',
		class: 'table'
	};
	editor.settings['table_default_styles'] = {};
	editor.settings['table_appearance_options'] = false;
	editor.settings['table_responsive_width'] = true;
	editor.settings['invalid_styles'] = {
		'th' : 'height width border padding margin',
		'td' : 'height width border padding margin',
		'tr' : 'height width border padding margin',
		'table' : 'height width border padding margin'
	};
	editor.settings['extended_valid_elements'] = 'table[class=table|class=table-striped],*[*]';
	editor.settings['table_resize_bars'] = false;
	editor.settings['table_class_list'] = [
		{ title: 'Normal', value: 'table' },
		{ title: 'Striped', value: 'table table-striped'}
	];
}
