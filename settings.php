//<?php

$languages = [];
foreach (\IPS\Lang::getEnabledLanguages() as $id => $lang) {
	$languages[$id] = $lang->title;
}

$form->add( new \IPS\Helpers\Form\Select( 'guestDefaultLanguage', \IPS\Settings::i()->guestDefaultLanguage, TRUE, array(
	'options' => $languages,
	'parse' => 'normal'
) ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	return TRUE;
}

return $form;