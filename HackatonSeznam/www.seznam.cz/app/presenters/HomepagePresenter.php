<?php

namespace App\Presenters;

use Nette\Application\UI;


final class HomepagePresenter extends BasePresenter
{
	/** @persistent */
	public $jsonn=null;

	/** @var \Nette\Http\SessionSection */
	private $session;

	/** @var Nette\Http\SessionSection */
    private $sessionSection;

	public function renderDefault()
	{
		$j = json_decode("{
			\"data\": {
			  \"organic\": [
				{
					\"snippet\": {
					\"title\": \"<b class=pri>PHP</b>: <b class=pri>error</b>_reporting - Manual\",
					\"url\": \"http://php.net/manual/en/function.error-reporting.php\",
					\"description\": \"<b class=sec>error</b>_reporting — Sets which <b class=sec>PHP</b> <b class=sec>errors</b> are reported\",
					\"urlHighlighted\": \"<b class=sec>php</b>.net/manual/en/function.<b class=sec>error</b>-reporting.php\"
				  },
				  \"attributes\": {
					\"lastChangeDate\": 1517227439
				  }
				},
				{
					\"snippet\": {
					\"title\": \"<b class=pri>PHP</b>: <b class=pri>error</b>_reporting - Manual\",
					\"url\": \"http://php.net/manual/en/function.error-reporting.php\",
					\"description\": \"<b class=sec>error</b>_reporting — Sets which <b class=sec>PHP</b> <b class=sec>errors</b> are reported\",
					\"urlHighlighted\": \"<b class=sec>php</b>.net/manual/en/function.<b class=sec>error</b>-reporting.php\"
				  },
				  \"attributes\": {
					\"lastChangeDate\": 1517227439
				  }
				}
			  ]
			}
		  }");
		
		  $this->template->mujJSON = $j;
		
		// $answerUrl = $this->queryStackOverflow('database exception', 'mysql');
	}
	
	public function createComponentSearch()
	{
		$form = New UI\Form();
		$form->addText('query', 'Query:')->setRequired(true);
		$form->addSubmit('search', 'Find');
		$form->onSuccess[] = [$this, 'searchSucceeded'];
		return $form;
	}

	public function searchSucceeded(UI\Form $form, $values)
	{
		$this->flashmessage($this->queryStackOverflow($values->query, ''));
		$this->redirect('Homepage:');
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
		$q = file_get_contents('https://api.stackexchange.com/2.2/search?tagged=' . urlencode($tag) . '&intitle=' . urlencode($query) . '&site=stackoverflow&sort=votes&access_token=RFADpi(YJYsYGVWUu5HZFA))&key=lx3)M1EQI0UayNcV29hE8Q((');
		$q = json_decode(gzinflate(substr($q, 10)));
		return $q;
	}

	private function getAnswer($questionID)
	{
		$answers = file_get_contents('https://api.stackexchange.com/2.2/questions/' . $questionID . '/answers?order=desc&sort=votes&site=stackoverflow&access_token=RFADpi(YJYsYGVWUu5HZFA))&key=lx3)M1EQI0UayNcV29hE8Q((');
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
		$url1 = 'http://midaga.eu:9999';

		$myJSON = $this->sessionSection;

		//headry
		$header = array();
		$header[] = 'Content-length: 0';
		$header[] = 'Content-type: application/json';
		$header[] = 'Authorization: OAuth aGFja2F0aG9uOkFoSjR4aWU2bGllME9wYXU';
		
		// zmente podle potreby 
		$query = '{"query": "{ live_queries }"}';
		$query1 = '{"query":"{organic(query:\"zeman\"){docId snippet{url description title urlHighlighted}}}"}';
		$query2 = '{"query":"{organic(query:\"php error\"){snippet{title url description urlHighlighted}attributes{lastChangeDate}}}"}';
		//   echo "<pre>";
		//   echo $query2;
		//   echo "</pre>";

		// pripoji se k seznamu a vrati JSON dat
		$data = array("username" => "test");                                                                    
		$data_string =$query2;                                                                                   
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
		// echo $returnCode;
		// var_dump($errors);
		// print_r($result);
		$json = json_decode($result);
		$this->jsonn = $json;
		// print_r($json->data->organic[0]->snippet->title);

		//$myJSON-> $json;
		//echo $myJSON;
		$this->template->mujJSON = $json;


		return $request;
	}

	/**funkce k nicemu zatim */
	protected function createComponentArticle()
	{
		$control = new \ArticleControl;
		return $control;
	}

}

class MyService
{
    /** @var Nette\Http\Session */
    private $session;

    /** @var Nette\Http\SessionSection */
    private $sessionSection;

    public function __construct(Nette\Http\Session $session)
    {
        $this->session = $session;

        // a získáme přístup do sekce 'mySection':
        $this->sessionSection = $session->getSection('mySection');
    }
}



