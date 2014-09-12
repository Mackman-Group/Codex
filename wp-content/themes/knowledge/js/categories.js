jQuery(document).ready(function() 
{
	// Strip out any empty categories
	jQuery('.category.section, .subcategory').each(function(i, obj) 
	{
		if ( jQuery(obj).children('.subcategory').length == 0 )
		{
			if ( jQuery(obj).children('ul').children().length == 0 )
			{
				jQuery(obj).css('display', 'none');
			}
		}
	});
});