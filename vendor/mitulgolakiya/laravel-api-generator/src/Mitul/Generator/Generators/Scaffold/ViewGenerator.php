<?php

namespace Mitul\Generator\Generators\Scaffold;

use Config;
use Illuminate\Support\Str;
use Mitul\Generator\CommandData;
use Mitul\Generator\FormFieldsGenerator;
use Mitul\Generator\Generators\GeneratorProvider;
use Mitul\Generator\Utils\GeneratorUtils;

class ViewGenerator implements GeneratorProvider
{
    /** @var  CommandData */
    private $commandData;

    /** @var string */
    private $path;

    /** @var string */
    private $viewsPath;

    public function __construct($commandData)
    {
        $this->commandData = $commandData;
        $this->path = Config::get('generator.path_live_views', base_path('resources/views')).'/'.$this->commandData->modelNamePluralCamel.'/';
        $this->viewsPath = 'scaffold/views';
    }

    public function generate()
    {
        if (!file_exists($this->path)) {
            mkdir($this->path, 0755, true);
        }

        $this->commandData->commandObj->comment("\nLive View created: ");

        $this->generateLive();

    }


    private function generateLive()
    {
        $templateData = $this->commandData->templatesHelper->getTemplate('live.blade', $this->viewsPath);

        $fileName = 'live.blade.php';

        $path = $this->path.$fileName;

        $this->commandData->fileHelper->writeFile($path, $templateData);
        $this->commandData->commandObj->info('live.blade.php created');
    }


}
