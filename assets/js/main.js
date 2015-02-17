



//


(function() {
	tinymce.PluginManager.add('tmrd_mce_button', function( editor, url ) {
		editor.addButton( 'tmrd_mce_button', {
			text: 'Google Map',
			icon: false,
			type: 'menubutton',
			menu: [
				{
				
							text: 'Click For Enter Value',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Shortcode value',
									body: [
										{
											type: 'textbox',
											name: 'price_plan',
											label: 'Your Embed link'
											
										},
														{
											type: 'textbox',
											name: 'textboxName',
											label: 'Width'
											
										},
																{
											type: 'textbox',
											name: 'info_one_box',
											label: 'Height'
											
										}
										
									],
									onsubmit: function( e ) {
										editor.insertContent( '[map src="' + e.data.price_plan + '" width="' + e.data.textboxName + '" height="' + e.data.info_one_box + '"]');
									}
								});
							}
						
					
				}
			]
		});
	});
})();

