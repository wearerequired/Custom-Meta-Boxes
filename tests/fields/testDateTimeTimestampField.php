<?php

namespace HMCMB\Tests;

use CMB_Datetime_Timestamp_Field;

/**
 * Class DateTimeTimestampFieldTestCase
 *
 * @group fields
 */
class DateTimeTimestampFieldTestCase extends TestFieldCase {
	public function setUp() {
		parent::setUp();

		$this->instance = new CMB_Datetime_Timestamp_Field( 'CMB_Datetime_Timestamp_Field', 'Field', [] );
	}

	function testAssets() {
		$this->reset_wp_scripts();

		// Register CMB-Scripts as this is a dependency.
		wp_enqueue_script( 'cmb-scripts', trailingslashit( CMB_URL ) . 'js/cmb.js', array( 'jquery' ) );

		$this->instance->enqueue_scripts();

		$scripts_output = get_echo( 'wp_print_scripts' );

		// Scripts
		$this->assertContains( CMB_URL . '/js/cmb.js', $scripts_output );
		$this->assertContains( CMB_URL . '/js/jquery.timePicker.min.js', $scripts_output );
		$this->assertContains( CMB_URL . '/js/field.datetime.js', $scripts_output );
	}
}
