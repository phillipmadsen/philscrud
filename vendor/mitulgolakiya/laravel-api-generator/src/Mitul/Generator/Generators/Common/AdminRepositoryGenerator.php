<?php

namespace Mitul\Generator\Generators\Common;

use Config;
use Mitul\Generator\CommandData;
use Mitul\Generator\Generators\GeneratorProvider;
use Mitul\Generator\Utils\GeneratorUtils;

class AdminRepositoryGenerator implements GeneratorProvider
{
    /** @var  CommandData */
    private $commandData;

    /** @var string */
    private $path;

    public function __construct($commandData)
    {
        $this->commandData = $commandData;
        $this->path = Config::get('generator.path_admin_repository', app_path('/Libraries/Repositories/Admin/'));
    }

    public function generate()
    {
        $templateData = $this->commandData->templatesHelper->getTemplate('AdminRepository', 'common/admin');

        $templateData = GeneratorUtils::fillTemplate($this->commandData->dynamicVars, $templateData);

        $fileName = $this->commandData->modelName.'Repository.php';

        if (!file_exists($this->path)) {
            mkdir($this->path, 0755, true);
        }

        $path = $this->path.$fileName;

        $this->commandData->fileHelper->writeFile($path, $templateData);
        $this->commandData->commandObj->comment("\nAdmin Repository created: ");
        \Log::info('Admin ' . $fileName . ' Was Generated');
        $this->commandData->commandObj->info($fileName);
    }
}
