<?php

/**
 * Implements the default behaviour for authentication.
 *
 * This class contains an implementation for default behaviour when authenticating. It will
 * save the session information it got from the authentication client in the users session.
 *
 * @author Olav Morken, UNINETT AS.
 * @package simpleSAMLphp
 *
 * @deprecated This class will be removed in SSP 2.0.
 */
class SimpleSAML_Auth_Default {


	/**
	 * @deprecated This method will be removed in SSP 2.0. Use SimpleSAML_Auth_Source::initLogin() instead.
	 */
	public static function initLogin($authId, $return, $errorURL = NULL,
		array $params = array()) {

		$as = self::getAuthSource($authId);
		$as->initLogin($return, $errorURL, $params);
	}


	/**
	 * @deprecated This method will be removed in SSP 2.0. Please use
	 * SimpleSAML_Auth_State::getPersistentAuthData() instead.
	 */
	public static function extractPersistentAuthState(array &$state) {

		return SimpleSAML_Auth_State::getPersistentAuthData($state);
	}


	/**
	 * @deprecated This method will be removed in SSP 2.0. Please use SimpleSAML_Auth_Source::loginCompleted() instead.
	 */
	public static function loginCompleted($state) {
		SimpleSAML_Auth_Source::loginCompleted($state);
	}


	/**
	 * @deprecated This method will be removed in SSP 2.0.
	 */
	public static function initLogoutReturn($returnURL, $authority) {
		$as = self::getAuthSource($authority);
		$as->initLogoutReturn($returnURL);
	}


	/**
	 * @deprecated This method will be removed in SSP 2.0. Please use SimpleSAML_Auth_Source::initLogout() instead.
	 */
	public static function initLogout($returnURL, $authority) {
		$as = self::getAuthSource($authority);
		$as->initLogout($returnURL);
	}


	/**
	 * @deprecated This method will be removed in SSP 2.0. Please use SimpleSAML_Auth_Source::logoutCompleted() instead.
	 */
	public static function logoutCompleted($state) {
		SimpleSAML_Auth_Source::logoutCompleted($state);
	}


	/**
	 * @deprecated This method will be removed in SSP 2.0. Please use SimpleSAML_Auth_Source::logoutCallback() instead.
	 */
	public static function logoutCallback($state) {
		SimpleSAML_Auth_Source::logoutCallback($state);
	}


	/**
	 * @deprecated This method will be removed in SSP 2.0. Please use
	 * sspmod_saml_Auth_Source_SP::handleUnsolicitedAuth() instead.
	 */
	public static function handleUnsolicitedAuth($authId, array $state, $redirectTo) {
		sspmod_saml_Auth_Source_SP::handleUnsolicitedAuth($authId, $state, $redirectTo);
	}


	/**
	 * Return an authentication source by ID.
	 *
	 * @param string $id The id of the authentication source.
	 * @return SimpleSAML_Auth_Source The authentication source.
	 * @throws Exception If the $id does not correspond with an authentication source.
	 */
	private static function getAuthSource($id) {
		$as = SimpleSAML_Auth_Source::getById($id);
		if ($as === null) {
			throw new Exception('Invalid authentication source: ' . $id);
		}
		return $as;
	}
}
