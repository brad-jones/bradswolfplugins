jQuery.IsEmpty = function(mixed_var){switch(mixed_var){case undefined:return true;break;case '':return true;break;case 0:return true;break;case '0':return true;break;case null:return true;break;case false:return true;break;}return false;};