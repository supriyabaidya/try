<?php
	/**
	 * include database settings
	 */
	require_once( 'src/_installation/db.php' );

	/**
	 * include the class
	 */
	require_once( 'src/class.visitorTracking.php' );

	/**
	 * instance the class
	 */

	new visitorTracking($_REQUEST['comment']);

    header('location:contact.php');
?>