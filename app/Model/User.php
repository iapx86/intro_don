<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 * @property Log $Log
 * @property Ranking $Ranking
 */
class User extends AppModel {

public $displayField = 'username';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	'username' => array(
		'rule1' => array(
			'rule' => 'notBlank',
			'message' => 'ユーザー名は必須で入力してください'
			),
		'rule2' => array(
			'rule' => 'isUnique',
			'message' => '違うユーザー名でお願いします。すでに登録があります。'
			)
		),

		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'パスワードは必須で入力してください',
				// 'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sum_answer' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				// 'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sum_correct' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rate' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sum_score' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gold_count' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'silver_count' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blonze_count' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Log' => array(
			'className' => 'Log',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Ranking' => array(
			'className' => 'Ranking',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

// 認証用パスワード作成・保存
public function beforeSave($options = array()) {
	if (isset($this->data[$this->alias]['password'])) {
		$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
		$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
		);
	}
	return true;
}

	// ユーザー情報登録変更
	// public function reNew(){
	// 	$data = null;
	// 	$users = $this->find('all');
	// 	if(isset($users)){

	// 	for ($i=0; $i < count($users); $i++) { 

	// 	//合計の回答回数：sum_answer
	// 	$log_sum_count = $this->Log->find('count' , 
	// 		array(
	// 			'conditions'=>array( 
	// 					'Log.user_id'=> $users[$i]['User']['id'])
	// 		)
	// 	);

	// 	$users[$i]['User']['sum_answer'] = $log_sum_count;

	// 	//合計の正解回数：sum_correct
	// 	$log_sum_correct = $this->Log->find('count' , 
	// 		array(
	// 			'conditions'=>array(
	// 				'and' =>array(
	// 					'Log.user_id'=> $users[$i]['User']['id'],
	// 					'Log.result' => true))
	// 		)
	// 	);

	// 	$users[$i]['User']['sum_correct'] = $log_sum_correct;

	// 	//正解率：rate
	// 	if($log_sum_correct != 0 && $log_sum_count != 0 ){
	// 	$users[$i]['User']['rate'] = round($log_sum_correct / $log_sum_count , 2);
	// 	}

	// 	//合計点:sum_score
	// 	$log_sum_score = $this->Log->find('first' , 
	// 		array(
	// 			'fields' =>array(
	// 				'sum(Log.score) as log_sum_score'),
	// 			'conditions'=>array(
	// 				'Log.user_id'=> $users[$i]['User']['id'])
	// 		)
	// 	);
	// 	$users[$i]['User']['sum_score'] = $log_sum_score[0]['log_sum_score'];

	// 		// 配列の構造変換
	// 		$data['User'][$i] = $users[$i]['User'];
	// 	}
	// }
	// 	// debug($users);
	// 	return $data;
	// }

}