/**
 * Plugin: IsEmpty
 * =============================================================================
 * This will tell us if the passed in element is empty or not.
 * Alot of the time something may be set to "0" or "undefined" but doesn't
 * actully evaluate to false.
 * 
 * Parameters:
 * -----------------------------------------------------------------------------
 * mixed_var - Anything that you want to check to see if it's empty or not.
 * 
 * Returns:
 * -----------------------------------------------------------------------------
 * boolean
 */
jQuery.IsEmpty = function(mixed_var)
{
	switch(mixed_var)
	{
		case undefined: return true; break;
		case '': return true; break;
		case 0: return true; break;
		case '0': return true; break;
		case null: return true; break;
		case false: return true; break;
	}
	
	return false;
};