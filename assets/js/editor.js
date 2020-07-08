// add styling for custom blocks
wp.domReady(() => {
	wp.blocks.registerBlockStyle('gccustom/quote-box',[
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'gray',
			label: 'Gray',
		}
	]);
	wp.blocks.registerBlockStyle('gccustom/fancy-quote-box',[
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'alert',
			label: 'Alert',
		}
	]);
});
