<?php


/**
* Initialize routes group based on route integration.
*/
private function initLiveRoutes()
{
	$path = Config::get('generator.path_live_routes', app_path('Http/live_routes.php'));
	$fileHelper = new FileHelper();
	$routeContents = $fileHelper->getFileContents($path);

	 $template = 'live_routes_group';

	$templateHelper = new TemplatesHelper();
	$templateData = $templateHelper->getTemplate($template, 'routes');
	$templateData = $this->fillTemplate($templateData);
	$fileHelper->writeFile($path, $routeContents."\n\n".$templateData);
	$this->comment("\n LIVE group added to routes.php");
}

private function initAdminRoutes()
{
	$path = Config::get('generator.path_admin_routes', app_path('Http/admin_routes.php'));
	$fileHelper = new FileHelper();
	$routeContents = $fileHelper->getFileContents($path);
	$useDingo = Config::get('generator.use_dingo_api', false);

	$template = 'admin_routes_group';

	$templateHelper = new TemplatesHelper();
	$templateData = $templateHelper->getTemplate($template, 'routes');
	$templateData = $this->fillTemplate($templateData);
	$fileHelper->writeFile($path, $routeContents."\n\n".$templateData);
	$this->comment("\n ADMIN group added to routes.php");
}
