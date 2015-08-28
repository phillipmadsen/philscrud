<?php

    namespace Mitul\Generator\Generators\Scaffold;

    use Config;
    use Mitul\Generator\CommandData;
    use Mitul\Generator\Generators\GeneratorProvider;
    use Mitul\Generator\Utils\GeneratorUtils;

    class ViewControllerGenerator implements GeneratorProvider
    {
        /** @var  CommandData */
        private $commandData;

        /** @var string */
        private $path;

        public function __construct($commandData)
        {
            $this->commandData = $commandData;
            $this->path = Config::get('generator.path_live_controller', app_path('Http/Controllers/'));
        }

        public function generate()
        {
            $templateData = $this->commandData->templatesHelper->getTemplate('Controller', 'scaffold');

            $templateData = GeneratorUtils::fillTemplate($this->commandData->dynamicVars, $templateData);


            $fileName = $this->commandData->modelName.'Controller.php';

            $path = $this->path.$fileName;

            $this->commandData->fileHelper->writeFile($path, $templateData);
            $this->commandData->commandObj->comment("\nLive Controller created: ");
            \Log::info('' . $fileName . ' Was Generated');
            $this->commandData->commandObj->info($fileName);
        }
    }
