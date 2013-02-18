<?php defined('SYSPATH') or die('No Direct Script Access');

Class Controller_Workers extends Controller_Template
{
	public $template = 'mysite';
        
        public function before() 
        {
            parent::before();

                $this->run_mysql_script('/home/mryohan/creation.sql');
        }


        public function action_index()
	{
                $member = ORM::factory('Member');
                
                $view = View::factory('table');
                
                $this->fill_member($member);
                
		if ($member->id != '')
		{
                        $member->where('id', '=', $member->id)->find();
                        $member->delete();
		}
                
                $result = $member->find_all()->as_array();
                
                $view->set('result', $result);
                
		$this->template->result = $view->render();
                $this->template->result .= View::factory('new')->render();
                
	}
        
        public function action_edit()
        {
            $member = ORM::factory('Member');
            
            $temp = Arr::get($_POST, 'unluckyguy');
            
            $member->where('id', '=', $temp)->find();
            
            $form = View::factory('form')->set('foobar', $member->as_array());
            
            $this->template->result = $form->render();
            
        }
        
        public function action_update()
        {            
            $member = ORM::factory('Member', Arr::get($_POST, 'unluckyguy', ''));
            
            $this->fill_member($member);
            
            if ($this->checkdata()) $member->update();
            
            $this->redirect();
        }
        
        public function action_save()
        {
            $member = ORM::factory('Member');
            
            $this->fill_member($member);
            
            if ($this->checkdata()) $member->save();
            
            $this->redirect();
        }
        
        public function action_cancel()
        {
            $this->redirect();
        }
	
	private function checkdata()
	{
		if (
                        (Arr::get($_POST, 'firstname', '')=='') || 
                        (Arr::get($_POST, 'lastname', '')=='') || 
                        (Arr::get($_POST, 'job', '')=='') || 
                        (strlen(Arr::get($_POST, 'pesel', ''))!=11) || 
                        (is_numeric(Arr::get($_POST, 'pesel', ''))!=TRUE) 
                        ) return FALSE;
                
		return TRUE;
	}
        
        private function fill_member($member)
        {
            $member->name =     Arr::get($_POST, 'firstname', '');
            $member->surname =  Arr::get($_POST, 'lastname', '');
            $member->job =      Arr::get($_POST, 'job', '');
            $member->pesel =    Arr::get($_POST, 'pesel', '');
            $member->id =       Arr::get($_POST, 'unluckyguy', '');
        }
        
        private function run_mysql_script($script_name)
	{
                $username = 'mryohan';
		$command = 'mysql'
				. ' --user=' . $username
				. ' --execute="SOURCE ' . $script_name . '"';
                        shell_exec($command);
	}
}
