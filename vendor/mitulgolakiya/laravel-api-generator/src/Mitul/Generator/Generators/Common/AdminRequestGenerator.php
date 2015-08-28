<?php

namespace Mitul\Generator\Generators\Common;

use Config;
use Mitul\Generator\CommandData;
use Mitul\Generator\Generators\GeneratorProvider;
use Mitul\Generator\Utils\GeneratorUtils;

class AdminRequestGenerator implements GeneratorProvider
{
    /** @var  CommandData */
    private $commandData;

    /** @var string */
    private $path;

    public function __construct($commandData)
    {
        $this->commandData = $commandData;
        $this->path = Config::get('generator.path_admin_request', app_path('Http/Requests/Admin/'));
    }

    public function generate()
    {
        $this->generateCreateRequest();
        $this->generateUpdateRequest();
    }

    private function generateCreateRequest()
    {
        $templateData = $this->commandData->templatesHelper->getTemplate('AdminCreateRequest', 'scaffold/requests/admin');

        $templateData = GeneratorUtils::fillTemplate($this->commandData->dynamicVars, $templateData);

        $fileName = 'Create'.$this->commandData->modelName.'Request.php';

        $path = $this->path.$fileName;

        $this->commandData->fileHelper->writeFile($path, $templateData);
        $this->commandData->commandObj->comment("\nAdmin Create Request created: ");
        \Log::info('Admin ' . $fileName . ' Was Generated');
        $this->commandData->commandObj->info($fileName);
    }

    private function generateUpdateRequest()
    {
        $templateData = $this->commandData->templatesHelper->getTemplate('AdminUpdateRequest', 'scaffold/requests/admin');

        $templateData = GeneratorUtils::fillTemplate($this->commandData->dynamicVars, $templateData);

        $fileName = 'Update'.$this->commandData->modelName.'Request.php';

        $path = $this->path.$fileName;

        $this->commandData->fileHelper->writeFile($path, $templateData);
        $this->commandData->commandObj->comment("\nAdmin Update Request created: ");
        \Log::info('Admin ' . $fileName . ' Was Generated');
        $this->commandData->commandObj->info($fileName);
    }
}
