<?php 

	use Illuminate\Foundation\Testing\WithoutMiddleware;
	use Illuminate\Foundation\Testing\DatabaseMigrations;
	use Illuminate\Foundation\Testing\DatabaseTransactions;

	class FeatureTestCase extends TestCase{

		use DatabaseTransactions;

		/*
		/------------------------------------------------------------
		/ Custom error validation
		/------------------------------------------------------------
		/
		/ The following function validate if a field has error messages.
		/ This validation only works with Styde html component.
		/ For more information about this component, please refers to official documentation
		/ https://github.com/StydeNet/html
		/
		*/
		public function seeErrors(array $fields)
		{
			foreach ($fields as $name => $errors) {
				foreach ((array) $errors as $message) {
					$this->seeInElement("#field_{$name}.has-error .help-block", $message);
				}
			}
			
		}

	}
?>