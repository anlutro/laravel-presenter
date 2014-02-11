<?php
/**
 * Example presenter for projects.
 * 
 * Presenters are made via Presenter::make(), which works on collections and
 * single objects. Wrap your object in a presenter right before passing it to
 * a view.
 * 
 * $projects = ProjectModel::all();
 * $projects = ProjectPresenter::make($projects);
 * $project = ProjectModel::find(5);
 * $project = ProjectPresenter::make($project);
 */
class ProjectPresenter extends \c\Presenter
{
	/**
	 * Our underlying 'start' attribute is a Carbon object. We don't want to
	 * call ->format(..) on it in every view, we make a presenter. A presenter
	 * is like an accessor/getter, but only applies once you've wrapped the
	 * object in the presenter.
	 * 
	 * If your present method matches the name of the underlying object atriubte,
	 * a parameter is passed to the method which is the underlying attribute.
	 * You can also access the underlying object via $this->object. You can make
	 * presenters for non-existing attributes.
	 */
	public function presentStart($start)
	{
		return $start->format('m\d\Y');
	}

	/**
	 * We do the same for our deadline presenter, but add some extra logic -
	 * add a colour to it depending on how far away the deadline is.
	 */
	public function presentDeadline($deadline)
	{
		$now = Carbon\Carbon::now();
		$diffDays = $deadline->diff($now)->days;

		if ($diffDays > 30) {
			$color = '#090'; // green
		} elseif ($diffDays < 14) {
			$color = '#fc0'; // orange
		} else {
			$color = '#c00'; //red
		}

		return sprintf('<span style="color:%s;>%s</span>',
			$color, $deadline->format('d\m\Y'));
	}
}
