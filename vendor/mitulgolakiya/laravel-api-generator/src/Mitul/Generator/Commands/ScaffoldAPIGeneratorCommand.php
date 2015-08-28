<?php
    namespace Mitul\Generator\Commands;

    use Storage;
    use Mitul\Generator\CommandData;
    use Mitul\Generator\Generators\API\APIControllerGenerator;
    use Mitul\Generator\Generators\Common\AdminModelGenerator;
    use Mitul\Generator\Generators\Common\MigrationGenerator;
    use Mitul\Generator\Generators\Common\ModelGenerator;
    use Mitul\Generator\Generators\Common\RepositoryGenerator;
    use Mitul\Generator\Generators\Common\AdminRepositoryGenerator;
    use Mitul\Generator\Generators\Common\RequestGenerator;
    use Mitul\Generator\Generators\Common\RoutesGenerator;
    use Mitul\Generator\Generators\Common\AdminRequestGenerator;
    use Mitul\Generator\Generators\Scaffold\AdminViewGenerator;
    use Mitul\Generator\Generators\Scaffold\LiveViewGenerator;
    use Mitul\Generator\Generators\Scaffold\ViewControllerGenerator;
    use Mitul\Generator\Generators\Scaffold\AdminControllerGenerator;
    //use Mitul\Generator\Generators\Scaffold\ViewGenerator;

    class ScaffoldAPIGeneratorCommand extends BaseCommand
    {
        /**
         * The console command name.
         *
         * @var string
         */
        protected $name = 'phillips:crud';
        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Create a full CRUD for given model with initial views and APIs';

        /**
         * Create a new command instance.
         */
        public function __construct()
        {
            parent::__construct();
            $this->commandData = new CommandData($this, CommandData::$COMMAND_TYPE_SCAFFOLD_API);
        }

        /**
         * Execute the command.
         *
         * @return void
         */
        public function handle()
        {
            parent::handle();
            if (!$this->commandData->skipMigration) {
                $migrationGenerator = new MigrationGenerator($this->commandData);
                $migrationGenerator->generate();
            }
            $modelGenerator = new ModelGenerator($this->commandData);
            $modelGenerator->generate();

            \Storage::prepend('laravel.log', 'Model Generated');

            $AdminModelGenerator = new AdminModelGenerator($this->commandData);
            $AdminModelGenerator->generate();

            $requestGenerator = new RequestGenerator($this->commandData);
            $requestGenerator->generate();

            $adminRequestGenerator = new AdminRequestGenerator($this->commandData);
            $adminRequestGenerator->generate();

            $repositoryGenerator = new RepositoryGenerator($this->commandData);
            $repositoryGenerator->generate();

            $adminRepositoryGenerator = new AdminRepositoryGenerator($this->commandData);
            $adminRepositoryGenerator->generate();

            $adminViewsGenerator = new AdminViewGenerator($this->commandData);
            $adminViewsGenerator->generate();

            $liveViewsGenerator = new LiveViewGenerator($this->commandData);
            $liveViewsGenerator->generate();

                $repoAdminControllerGenerator = new AdminControllerGenerator($this->commandData);
                $repoAdminControllerGenerator->generate();

            $repoControllerGenerator = new ViewControllerGenerator($this->commandData);
            $repoControllerGenerator->generate();

            $repoControllerGenerator = new APIControllerGenerator($this->commandData);
            $repoControllerGenerator->generate();

            $routeGenerator = new RoutesGenerator($this->commandData);
            $routeGenerator->generate();

            if ($this->confirm("\nDo you want to migrate database? [y|N]", false)) {
                $this->call('migrate');
            }
        }

        /**
         * Get the console command arguments.
         *
         * @return array
         */
        protected function getArguments()
        {
            return array_merge(parent::getArguments(), []);
        }

        /**
         * Get the console command options.
         *
         * @return array
         */
        public function getOptions()
        {
            return array_merge(parent::getOptions(), []);
        }
    }
