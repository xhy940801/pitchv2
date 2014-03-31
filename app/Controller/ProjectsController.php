<?php

App::uses('AppController', 'Controller');

class ProjectsController extends AppController
{
	public $layout = "project";
	public function addProject()
	{
		if($this->request->is('post'))
		{
			$data['Project'] = $this->request->data;
			$this->setErrorInformation($this->Project->save($data),'Unknow Error. Add project fail!');
			$this->redirect(array('controller' => 'Assignments','action' => 'addAssignment',$this->Project->id));
		}
	}

	public function showProject($id = null)
	{
		if($id)
		{
			$project = $this->Project->findById($id);
			$this->setErrorInformation(!empty($project),'Don\'t exist this project!');
			$this->set('project',$project);
		}
	}

	public function showAllProjects($offset = 0, $limit = 5)
	{
		$projects = $this->Project->find('all', array('order' => 'Project.created DESC', 'limit' => $limit, 'offset' => $offset));
		$this->set('projects',$projects);
		debug($projects);
	}

	public function deleteProject($id = null)
	{
		if($id)
		{
			$this->setErrorInformation($this->Project->delete($id),'Deleting data error');
		}
	}
}
?>