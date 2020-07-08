// add styling for custom blocks
wp.domReady(() => {
	wp.blocks.registerBlockStyle('gccustom/quote-box',[
		{
			name: 'white',
			label: 'White',
			isDefault: true,
		},
		{
			name: 'gray',
			label: 'Gray',
		}
	]);
	wp.blocks.registerBlockStyle('gccustom/fancy-quote-box',[
		{
			name: 'blue',
			label: 'Blue',
			isDefault: true,
		},
		{
			name: 'red',
			label: 'Red',
		}
	]);
});
