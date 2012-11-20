<?php
class DbController extends Controller
{
	protected function afterAction($action)
	{
		$time = sprintf('%0.5f', Yii::getLogger()->getExecutionTime());
		$memory = round(memory_get_peak_usage()/(1024*1024),2)."MB";
		echo "Time: $time, memory: $memory";
		parent::afterAction($action);
	}


	public function actionAr()
	{
		$actors = Actor::model()->findAll(array('with' => 'films', 'order' => 't.first_name, t.last_name, films.title'));
		echo "<ol>";
		foreach($actors as $actor)
		{
			echo "<li>";
			echo $actor->first_name.' '.$actor->last_name;
			echo "<ol>";
			foreach($actor->films as $film)
			{
				echo "<li>";
				echo $film->title;
				echo "</li>";
			}
			echo "</ol>";
			echo "</li>";
		}
		echo "</ol>";
	}

	public function actionQueryBuilder()
	{
		$rows = Yii::app()->db->createCommand()
		->from('actor')
		->join('film_actor', 'actor.actor_id=film_actor.actor_id')
		->leftJoin('film', 'film.film_id=film_actor.film_id')
		->order('actor.first_name, actor.last_name, film.title')
		->queryAll();

		$this->renderRows($rows);
	}

	public function actionSql()
	{
		$sql = "SELECT *
		FROM actor a
		JOIN film_actor fa ON fa.actor_id = a.actor_id
		JOIN film f ON fa.film_id = f.film_id
		ORDER BY a.first_name, a.last_name, f.title";

		$rows = Yii::app()->db->createCommand($sql)->queryAll();

		$this->renderRows($rows);
	}

	public function renderRows($rows)
	{
		$lastActorName = null;

		echo "<ol>";
		foreach($rows as $row)
		{
			$actorName = $row['first_name'].' '.$row['last_name'];
			if($actorName!=$lastActorName){
				if($lastActorName!==null){
					echo "</ol>";
					echo "</li>";
				}

				$lastActorName = $actorName;
				echo "<li>";
				echo $actorName;
				echo "<ol>";
			}
			echo "<li>";
			echo $row['title'];
			echo "</li>";
		}
		echo "</ol>";
	}
}
