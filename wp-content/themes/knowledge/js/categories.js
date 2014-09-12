jQuery(document).ready(function() 
{
	// Strip out any empty sub-categories
	jQuery('.subcategory').each(function(i, obj) 
	{
		//console.log(jQuery(obj));
		if ( jQuery(obj).children('ul').children().length == 0 )
		{
			jQuery(obj).remove();
		}
	});
	
	// Strip out any empty categories
	jQuery('.category.section').each(function(i, obj) 
	{
		console.log(jQuery(obj));
		if ( jQuery(obj).children('.subcategory').length == 0 )
		{
			console.log(jQuery(obj).children('.subcategory').length);
			if ( jQuery(obj).children('ul').children().length == 0 )
			{
				console.log(jQuery(obj).children('ul').children().length);
				jQuery(obj).remove();
			}
		}
	});
});