<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateNewService extends Command
{
    protected $signature = 'service:create {name}';

    protected $description = 'Create a new service file and its interface';

    public function handle()
    {
        $name = $this->argument('name');
        $servicePath = app_path('Services/' . $name . '.php');
        $interfacePath = app_path('Services/' . $name . 'Interface.php');
        $repositoryName = $name . 'Repository';
        $thiss = '$this->'. lcfirst($repositoryName);


        if (file_exists($servicePath) || file_exists($interfacePath)) {
            $this->error('Service or Interface already exists!');
            return;
        }

        $interfaceTemplate = "<?php\n\nnamespace App\Services;\n\ninterface " . $name . "Interface\n{\n    // Define your service interface methods here\n}\n";
        // $serviceTemplate = "<?php\n\nnamespace App\Services;\n\nuse App\Repositories\\" . $repositoryName . ";\n\nclass " . $name . "Service implements " . $name . "ServiceInterface\n{\n    protected $" . strtolower($repositoryName) . ";\n\n    public function __construct(" . $repositoryName . " $" . strtolower($repositoryName) . ")\n    {\n        $this->" . strtolower($repositoryName) . " = $" . strtolower($repositoryName) . ";\n    }\n\n    // Implement your service logic here\n}\n";

        $serviceTemplate = "<?php\n\nnamespace App\Services;\nuse App\Repositories\\$repositoryName;\n\nclass " . $name . " implements " . $name . "Interface\n{\n\tprotected $".lcfirst($repositoryName).";\n\n\tpublic function __construct($repositoryName $".lcfirst($repositoryName)."){\n\t\t$thiss = $".lcfirst($repositoryName).";\n\t}\n\t// Implement your service logic here\n}\n";

        file_put_contents($interfacePath, $interfaceTemplate);
        file_put_contents($servicePath, $serviceTemplate);

        $this->info('Service and Interface created successfully: ' . $servicePath . ', ' . $interfacePath);
    }
}
