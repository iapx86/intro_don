<?php
/**
 * Score Fixture
 */
class ScoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'first_score' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'second_score' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'third_score' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fourth_score' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fifth_score' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'timestamp', 'null' => false, 'default' => null),
		'modified' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'first_score' => 1,
			'second_score' => 1,
			'third_score' => 1,
			'fourth_score' => 1,
			'fifth_score' => 1,
			'created' => 1475635237,
			'modified' => 1475635237
		),
	);

}
