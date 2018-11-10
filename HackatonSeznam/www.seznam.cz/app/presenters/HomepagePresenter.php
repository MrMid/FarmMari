<?php

namespace App\Presenters;

use Nette\Application\UI;


final class HomepagePresenter extends BasePresenter
{
	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
		$answerUrl = $this->queryStackOverflow('database exception', 'mysql');
	}
	
	public function createComponentSearch()
	{
		$form = New UI\Form();
		$form->addText('query', 'Query:');
		$form->addSubmit('search', 'Find');
		$form->onSuccess[] = [$this, 'searchSucceeded'];
		return $form;
	}

	public function searchSucceeded(UI\Form $form, $values)
	{
		$this->flashmessage($this->queryStackOverflow($values->query, ''));
	}

	private function queryStackOverflow($query, $matchedTag)
	{
		$question = $this->queryQuestions($query, $matchedTag);
		$answerID = $this->getAnswer($question->items[0]->question_id)->answer_id;
		$answerUrl = 'https://stackoverflow.com/a/' . $answerID;
		return $answerUrl;
	}

	private function queryQuestions($query, $tag)
	{
		$q = file_get_contents('https://api.stackexchange.com/2.2/search?tagged=' . urlencode($tag) . '&intitle=' . urlencode($query) . '&site=stackoverflow&sort=votes');
		$q = json_decode(gzinflate(substr($q, 10)));
		return $q;
	}

	private function getAnswer($questionID)
	{
		$answers = file_get_contents('https://api.stackexchange.com/2.2/questions/' . $questionID . '/answers?order=desc&sort=votes&site=stackoverflow');
		$answers = json_decode(gzinflate(substr($answers, 10)));
		$answer = NULL;
		foreach ($answers->items as $a) {
			if ($a->is_accepted) {
				$answer = $a;
			}
		}
		if ($answer === NULL) {
			$answer = $answers->items[0];
		}
		return $answer;
	}

	// takhle komponenta bdue vyhledavat data na zaklade vyhledavane souslovi z platformy od Seznamu
	public function createComponentSeznam()
	{
		$request = New UI\Form();
		$url = 'https://cqc.seznam.net/hackathon/graphql';

		//headry
		$header = array();
		$header[] = 'Content-length: 0';
		$header[] = 'Content-type: application/json';
		$header[] = 'Authorization: OAuth aGFja2F0aG9uOkFoSjR4aWU2bGllME9wYXU';
		
		// zmente podle potreby 
		$query = '{"query": "{ live_queries }"}';

		//nastaveni pro https
		// $options = array(
		// 	'https' => array(
		// 		'header'  => $header,
		// 		'method'  => 'POST',
		// 		'content' => $query
		// 	)
		// );

		// $context  = stream_context_create($options);
		// $result = file_get_contents($url, false, $context);
		// if ($result === FALSE) { /* Handle error */ }

		// var_dump($result);

		// echo "pokus";

		$data = array("username" => "test"); // data u want to post                                                                   
		$data_string =$query;                                                                                   
		$api_key = "hackathon";   
		$password = "AhJ4xie6lie0Opau";                                                                                                                 
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $url);    
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
		curl_setopt($ch, CURLOPT_POST, true);                                                                   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
		curl_setopt($ch, CURLOPT_USERPWD, $api_key.':'.$password);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
			'Accept: application/json',
			'Content-Type: application/json')                                                           
		);             

		if(curl_exec($ch) === false)
		{
			echo 'Curl error: ' . curl_error($ch);
		}                                                                                                      
		$errors = curl_error($ch);                                                                                                            
		$result = curl_exec($ch);
		$returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);  
		echo $returnCode;
		var_dump($errors);
		print_r(json_decode($result, true));

		return $request;
	}
}
