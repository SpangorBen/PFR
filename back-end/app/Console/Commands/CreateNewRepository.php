<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateNewRepository extends Command
{
    protected $signature = 'repository:create {name}';

    protected $description = 'Create a new repository file and its interface';

    public function handle()
    {
        $name = $this->argument('name');
        $repositoryPath = app_path('Repositories/' . $name . '.php');
        $interfacePath = app_path('Repositories/' . $name . 'Interface.php');

        if (file_exists($repositoryPath) || file_exists($interfacePath)) {
            $this->error('Repository or Interface already exists!');
            return;
        }

        $interfaceTemplate = "<?php\n\nnamespace App\Repositories;\n\ninterface " . $name . "Interface\n{\n    // Define your service interface methods here\n}\n";
        $serviceTemplate = "<?php\n\nnamespace App\Repositories;\n\nclass " . $name . " implements " . $name . "Interface\n{\n\t// Implement your service logic here\n}\n";

        file_put_contents($interfacePath, $interfaceTemplate);
        file_put_contents($repositoryPath, $serviceTemplate);

        $this->info('Service and Interface created successfully: ' . $repositoryPath . ', ' . $interfacePath);
    }
}
