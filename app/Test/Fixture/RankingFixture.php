<?php
/**
 * Ranking Fixture
 */
class RankingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'game_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_score' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'start_event' => array('type' => 'timestamp', 'null' => false, 'default' => null),
		'end_event' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'created' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'modifid' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
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
			'game_id' => 1,
			'user_id' => 1,
			'user_score' => 1,
			'start_event' => 1475635172,
			'end_event' => 1475635172,
			'created' => 1475635172,
			'modifid' => 1475635172
		),
	);

}
