<?php

namespace Mitul\Generator\Generators\Common;

use Config;
use Mitul\Generator\CommandData;
use Mitul\Generator\Generators\GeneratorProvider;
use Mitul\Generator\Utils\GeneratorUtils;

class RoutesGenerator implements GeneratorProvider
{
    /** @var  CommandData */
    private $commandData;

    /** @var string */
    private $path;

    /** @var string */
    private $apiPath;

    private $menuPath;

    private $adminMenuPath;

    /** @var string */
    private $livePath;

    private $adminPath;

    /** @var bool */
    private $useDingo;

    public function __construct($commandData)
    {
        $this->commandData = $commandData;
        $this->path = Config::get('generator.path_admin_routes', app_path('Http/admin_routes.php'));
        $this->adminMenuPath = Config::get('generator.path_admin_menu', app_path('Http/AdminMenu.php'));
        $this->apiPath = Config::get('generator.path_api_routes', app_path('Http/api_routes.php'));
        $this->livePath = Config::get('generator.path_live_routes', app_path('Http/live_routes.php'));
        $this->useDingo = Config::get('generator.use_dingo_api', false);
    }

    public function generate()
    {
        if ($this->commandData->commandType == CommandData::$COMMAND_TYPE_API) {
            $this->generateAPIRoutes();
        } elseif ($this->commandData->commandType == CommandData::$COMMAND_TYPE_SCAFFOLD) {
            $this->generateScaffoldRoutes();
            $this->generateLiveRoutes();

        } elseif ($this->commandData->commandType == CommandData::$COMMAND_TYPE_SCAFFOLD_API) {
            $this->generateAPIRoutes();
            $this->generateLiveRoutes();
            $this->generateScaffoldRoutes();
            $this->generateAdminMenu();
         //   $this->generateMenu();

        }
    }

    private function generateAdminMenu()
    {
        $routeContents = $this->commandData->fileHelper->getFileContents($this->adminMenuPath);
      //  $menu->add('$MODEL_NAME_PLURAL_CAMEL$', (['class' => 'treeview', 'itemprop' => 'url']), '/$MODEL_NAME$');
        $routeContents .= "\n\n".'$menu->add("'.$this->commandData->modelNamePluralCamel.'", (["class" => "treeview", "itemprop" => "url"]), "/'.$this->commandData->modelName.'");';
        $routeContents .= "\n\n".'$menu->add("'.$this->commandData->modelNamePluralCamel.'", (["class" => "treeview", "itemprop" => "url"]), "/'.$this->commandData->modelName.'");';
        $routeContents .= "\n\n".'$menu->add("'.$this->commandData->modelNamePluralCamel.'", (["class" => "treeview", "itemprop" => "url"]), "/'.$this->commandData->modelName.'");';
        $routeContents .= "\n\n".'$menu->add("'.$this->commandData->modelNamePluralCamel.'", (["class" => "treeview", "itemprop" => "url"]), "/'.$this->commandData->modelName.'");';

        $this->commandData->fileHelper->writeFile($this->adminMenuPath, $routeContents);
        $this->commandData->commandObj->comment("\nAdminMenu.php modified:");
        \Log::info('Admin Menu Link Was Generated');
        $this->commandData->commandObj->info('"'.$this->commandData->modelNamePluralCamel.'" Link added.');
    }

    private function generateAPIRoutes()
    {
        $routeContents = $this->commandData->fileHelper->getFileContents($this->apiPath);

        if ($this->useDingo) {
            $routeContents .= "\n\n".'$api->resource("'.$this->commandData->modelNamePluralCamel.'", "'.$this->commandData->modelName.'APIController");';
        } else {
            $routeContents .= "\n\n".'Route::resource("'.$this->commandData->modelNamePluralCamel.'", "'.$this->commandData->modelName.'APIController");';
        }

        $this->commandData->fileHelper->writeFile($this->apiPath, $routeContents);
        $this->commandData->commandObj->comment("\napi_routes.php modified:");
        \Log::info('Admin Api Routes Was Generated');
        $this->commandData->commandObj->info('"'.$this->commandData->modelNamePluralCamel.'" route added.');
    }

    private function generateScaffoldRoutes()
    {
        $routeContents = $this->commandData->fileHelper->getFileContents($this->path);

        $templateData = $this->commandData->templatesHelper->getTemplate('scaffold_routes', 'routes');

        $templateData = GeneratorUtils::fillTemplate($this->commandData->dynamicVars, $templateData);

        $routeContents .= "\n\n".$templateData;

        $this->commandData->fileHelper->writeFile($this->path, $routeContents);
        $this->commandData->commandObj->comment("\nroutes.php modified:");
        \Log::info('Crud Routes Was Generated');
        $this->commandData->commandObj->info('"'.$this->commandData->modelNamePluralCamel.'" route added.');
    }

    private function generateLiveRoutes()
    {
        $routeContents = $this->commandData->fileHelper->getFileContents($this->livePath);

        $routeContents .= "\n\n".'Route::get("'.$this->commandData->modelNamePluralCamel.'", "'.$this->commandData->modelName.'Controller@live");';


        $this->commandData->fileHelper->writeFile($this->livePath, $routeContents);
        $this->commandData->commandObj->comment("\nlive_routes.php modified:");
        \Log::info('Live Route Was Generated');
        $this->commandData->commandObj->info('"'.$this->commandData->modelNamePluralCamel.'" route added.');
    }
}
