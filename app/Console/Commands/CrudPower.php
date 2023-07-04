<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class CrudPower extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crudpower:generate {tablename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate CRUD with Power';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tableName = $this->argument('tablename');

        // First, get table structure.
        $fields = Schema::getColumnListing($tableName);

        $this->generateController($tableName);
        $this->generateRoute($tableName);
        $this->generateList($tableName, $fields);
        $this->generateCreateForm($tableName, $fields);
        $this->generateEditForm($tableName, $fields);
    }

    protected function generateRoute($tableName)
    {
        // Take sample stub.
        $contents = file_get_contents(resource_path("stubs/route.stub"));

        // Init
        $plural = Str::plural($tableName);
        $title = ucfirst($plural);

        // Replace string.
        $template = str_replace([
            '{{ title }}',
            '{{ plural }}'
         ],
         [
            $title,
            $plural
         ], $contents);
        
        File::append(base_path('routes/web.php'), $template);
    }

    protected function generateController($tableName)
    {
        // Take sample stub.
        $contents = file_get_contents(resource_path("stubs/Controller.stub"));

        // Init
        $plural = Str::plural($tableName);
        $title = ucfirst($plural);
        $singular = Str::singular($tableName);

        // Replace string.
        $template = str_replace([
            '{{ title }}',
            '{{ plural }}',
            '{{ singular }}'
        ],
        [
            $title,
            $plural,
            $singular
        ], $contents);

        // Create new file.
        file_put_contents(app_path("/Http/Controllers/Admin/{$title}Controller.php"), $template);
    }

    protected function generateList($tableName, $fields)
    {
        // Take sample stub.
        $contents = file_get_contents(resource_path("stubs/index.stub"));

        // Init
        $plural = Str::plural($tableName);
        $title = ucfirst($plural);
        $singular = Str::singular($tableName);
        $total = count($fields);
       
        // Generate loop code.
        $table = '
        <table class="table table-bordered">
        <thead>
        <tr>';

        for ($i = 0; $i < $total; $i++) {
            if ($this->filter($fields[$i], 'list')) {
                $table .= "\n<th>" . str_replace('_', ' ', ucfirst($fields[$i])) . "</th>";
            }
        }
        
        $table .= "\n<th>Opsi</th>";

        $table .= '
        </tr>
        </thead>
        <tbody class="content">

        @foreach ($'. $plural .' as $'. $singular .')
        <tr>';

        for ($i = 0; $i < $total; $i++) {
            if ($this->filter($fields[$i], 'list')) {
                $table .= "\n<td>{{ $$singular->$fields[$i] }}</td>";
            }
        }
        
        $table .= "\n<td><a href=\"{{ url('admin/". $plural ."/edit/'. $$singular". "->id)" . " }}\">Edit<a> . <a onclick=\"return confirm('This record will be deleted, sure?')\" href=\"{{ url('admin/". $plural ."/delete/'. $$singular". "->id)" . " }}\">Delete<a></td>";
        
        $table .= 
        '</tr>

        @endforeach
                
        </tbody>
        </table>';

        // Replace string.
        $template = str_replace([
           '{{ title }}',
           '{{ plural }}',
           '{{ singular }}',
           '{{ table }}'
        ],
        [
            $title,
            $plural,
            $singular,
            $table
        ], $contents);

        // Create folder first.
        $path = public_path("../resources/views/admin/" . $plural);

        if (!File::isDirectory($path)){
            File::makeDirectory($path, 0775, true, true);
        }

        // Create new file.
        file_put_contents(public_path("../resources/views/admin/{$plural}/index.blade.php"), $template);
    }

    protected function generateCreateForm($tableName, $fields)
    {
        // Take sample stub.
        $contents = file_get_contents(resource_path("stubs/create.stub"));

        // Init
        $plural = Str::plural($tableName);
        $title = ucfirst($plural);
        $singular = Str::singular($tableName);
        $input = null;
        $total = count($fields);

        // Generate input form.
        for ($i = 0; $i < $total; $i++) {
            if ($this->filter($fields[$i], 'create')) {
                
                $name = str_replace('_', ' ', ucfirst($fields[$i]));

                $input .= "\n\t\t<div class=\"mb-3\">";
                $input .= "\n\t\t\t<label for=\"$name\" class=\"form-label\">$name</label>";
                $input .= "\n\t\t\t<input type=\"text\" class=\"form-control\" name=\"$fields[$i]\" required />";
                $input .= "\n\t\t\t<div class=\"form-text\">Penjelasan tentang $name</div>";
                $input .= "\n\t\t</div>";
            }
        }
        
        // Replace string.
        $template = str_replace([
           '{{ title }}',
           '{{ plural }}',
           '{{ singular }}',
           '{{ input }}'
        ],
        [
            $title,
            $plural,
            $singular,
            $input
        ], $contents);

        // Create folder first.
        $path = public_path("../resources/views/admin/" . $plural);

        if (!File::isDirectory($path)){
            File::makeDirectory($path, 0775, true, true);
        }

        // Create new file.
        file_put_contents(public_path("../resources/views/admin/{$plural}/create.blade.php"), $template);
    }

    protected function generateEditForm($tableName, $fields)
    {
        // Take sample stub.
        $contents = file_get_contents(resource_path("stubs/edit.stub"));

        // Init
        $plural = Str::plural($tableName);
        $title = ucfirst($plural);
        $singular = Str::singular($tableName);
        $input = null;
        $total = count($fields);

        // Generate edit form.
        for ($i = 0; $i < $total; $i++) {
            if ($this->filter($fields[$i], 'edit')) {
                
                $name = str_replace('_', ' ', ucfirst($fields[$i]));

                $input .= "\n\t\t<div class=\"mb-3\">";
                $input .= "\n\t\t\t<label for=\"$name\" class=\"form-label\">$name</label>";
                $input .= "\n\t\t\t<input type=\"text\" class=\"form-control\" value=\"{{ $$singular->$fields[$i] }}\" name=\"$fields[$i]\" required />";
                $input .= "\n\t\t\t<div class=\"form-text\">Penjelasan tentang $name</div>";
                $input .= "\n\t\t</div>";
            }
        }
        
        // Replace string.
        $template = str_replace([
           '{{ title }}',
           '{{ plural }}',
           '{{ singular }}',
           '{{ input }}'
        ],
        [
            $title,
            $plural,
            $singular,
            $input
        ], $contents);

        // Create folder first.
        $path = public_path("../resources/views/admin/" . $plural);

        if (!File::isDirectory($path)){
            File::makeDirectory($path, 0775, true, true);
        }

        // Create new file.
        file_put_contents(public_path("../resources/views/admin/{$plural}/edit.blade.php"), $template);
    }

    /**
     * Protect which column will shown
     */
    protected function filter($field, $mode)
    {
        if ($mode == 'list') {
            $hide = ['deleted_at'];
        } else if ($mode == 'create') {
            $hide = ['id', 'created_at', 'updated_at', 'deleted_at'];
        } else if ($mode == 'edit') {
            $hide = ['id', 'created_at', 'updated_at', 'deleted_at'];
        } else {
            $hide = [];
        }

        if (in_array($field, $hide)) {
            return false;
        }

        return true;
    }
}
