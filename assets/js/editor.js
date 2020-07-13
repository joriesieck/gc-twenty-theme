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
		},
		{
			name: 'no-title',
			label: 'Default (No Title)',
		},
		{
			name: 'gray-no-title',
			label: 'Gray (No Title)',
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
		},
		{
			name: 'no-title',
			label: 'Default (No Title)',
		},
		{
			name: 'alert-no-title',
			label: 'Alert (No Title)',
		}
	]);
});
