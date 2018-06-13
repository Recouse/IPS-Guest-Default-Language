//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

class hook71 extends _HOOK_CLASS_
{
	/**
	 * Return the language object to use for this member - returns default if member has not selected a language
	 *
	 * @param	bool	$frontOnly	If TRUE, will only look at the the langauge for the front-end, not the AdminCP
	 * @return	\IPS\Lang
	 */
	public function language($frontOnly = false)
	{
		if (static::loggedIn()->member_group_id != \IPS\Settings::i()->guest_group) {
			return parent::language($frontOnly);
		}

		/* Get guest default language */
		$this->calculatedLanguageId = \IPS\Settings::i()->guestDefaultLanguage ?: \IPS\Lang::defaultLanguage();

		/* Set it */
		$this->_lang = \IPS\Lang::load( $this->calculatedLanguageId );

		return $this->_lang;
	}
}
