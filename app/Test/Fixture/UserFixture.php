<?php
/**
 * User Fixture
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sum_answer' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'sum_correct' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'rate' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'sum_score' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'gold_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'silver_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'blonze_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'sum_answer' => 1,
			'sum_correct' => 1,
			'rate' => 1,
			'sum_score' => 1,
			'gold_count' => 1,
			'silver_count' => 1,
			'blonze_count' => 1,
			'created' => 1475635616,
			'modified' => 1475635616
		),
	);

}
