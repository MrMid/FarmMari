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
}
