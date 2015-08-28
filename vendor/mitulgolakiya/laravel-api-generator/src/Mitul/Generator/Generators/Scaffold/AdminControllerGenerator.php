<?php

    namespace Mitul\Generator\Generators\Scaffold;

    use Config;
    use Mitul\Generator\CommandData;
    use Mitul\Generator\Generators\GeneratorProvider;
    use Mitul\Generator\Utils\GeneratorUtils;

    class AdminControllerGenerator implements GeneratorProvider
    {
        /** @var  CommandData */
        private $commandData;

        /** @var string */
        private $path;

        public function __construct($commandData)
        {
            $this->commandData = $commandData;
            $this->path = Config::get('generator.path_admin_controller', app_path('Http/Controllers/Admin'));
        }

        public function generate()
        {
            $templateData = $this->commandData->templatesHelper->getTemplate('AdminController', 'scaffold');

            $templateData = GeneratorUtils::fillTemplate($this->commandData->dynamicVars, $templateData);

            if ($this->commandData->paginate) {
                $templateData = str_replace('$RENDER_TYPE$', 'paginate('.$this->commandData->paginate.')', $templateData);
            } else {
                $templateData = str_replace('$RENDER_TYPE$', 'all()', $templateData);
            }

            $fileName = $this->commandData->modelName.'Controller.php';

            $path = $this->path.$fileName;

            $this->commandData->fileHelper->writeFile($path, $templateData);
            $this->commandData->commandObj->comment("\nAdmin Controller created: ");
            \Log::info('Admin ' . $fileName . ' Was Generated');
            $this->commandData->commandObj->info($fileName);


        }
    }
