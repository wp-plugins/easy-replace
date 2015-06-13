<?php 
namespace er;

function erGetCheckBoxVal($Value)
{
	if($Value == 'on')
	{
		return 1;
	}
	
	return 0;
}

function erExplodeFields($Data)
{
    $Data = preg_replace('/\W/',' ', $Data);
    $Data = preg_replace('/\s+/', ' ', $Data);
    $Data = trim($Data);

    $Data = explode(' ', $Data);
    $Data = array_unique($Data);      

    return $Data;
}

function erGetFormFieldsData($Data)
{
    $FieldData = array();
    $FieldInnData = array();

    foreach ($Data['name'] as $key => $value) 
    {
       $FieldInnData['name'] = $value;
       array_push($FieldData, $FieldInnData);
    }

    return json_encode($FieldData);
}

function erGetInputFields($Fields)
{
    foreach ($Fields as $value) 
    {
        $field .= $value;
    }

    return $field;
}

function erGetCheckBox($Value)
{
    if($Value == '1')
    {
        echo 'checked';
    }
    else
    {
        echo '';
    }
}

function erRedirectTo($url)
{
    if (headers_sent())
    {
      die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
    }
    else
    {
      header('Location: ' . $url);
      die();
    }    
}

?>