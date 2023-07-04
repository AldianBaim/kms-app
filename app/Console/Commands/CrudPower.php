<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
        $fields = [];

        // First, get table structure.
        $results = DB::select("SELECT COLUMN_NAME, DATA_TYPE from INFORMATION_SCHEMA.COLUMNS where table_schema = 'kms' and table_name = '$tableName'"); 
        
        foreach ($results as $result) {

            $default = '';

            if ($result->DATA_TYPE == 'enum') {
                $default = DB::select("SHOW COLUMNS FROM $tableName WHERE Field = '$result->COLUMN_NAME'"); 
                preg_match("/^enum\(\'(.*)\'\)$/", $default[0]->Type, $matches);
                $default = explode("','", $matches[1]);                
            }
            
            $fields[] = [
                'name' => $result->COLUMN_NAME,
                'type' => $result->DATA_TYPE,
                'default' => $default
            ];
        }
        
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
        
        // Generate loop code.
        $table = '
        <table class="table table-bordered">
        <thead>
        <tr>';

        foreach ($fields as $field) {
            if ($this->filter($field['name'], 'list')) {
                $table .= "\n<th>" . str_replace('_', ' ', ucfirst($field['name'])) . "</th>";
            }
        }
        
        $table .= "\n<th>Opsi</th>";

        $table .= '
        </tr>
        </thead>
        <tbody class="content">

        @foreach ($'. $plural .' as $'. $singular .')
        <tr>';

        foreach ($fields as $field) {
            $fieldName = $field['name'];
            if ($this->filter($field['name'], 'list')) {
                $table .= "\n<td>{{ $$singular->$fieldName }}</td>";
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
        foreach ($fields as $field) {
            if ($this->filter($field['name'], 'create')) {
                
                $name = str_replace('_', ' ', ucfirst($field['name']));
                $fieldName = $field['name'];

                if ($field['type'] == 'varchar') {
                    $input .= "\n\t\t<div class=\"mb-3\">";
                    $input .= "\n\t\t\t<label for=\"$name\" class=\"form-label\">$name</label>";
                    $input .= "\n\t\t\t<input type=\"text\" class=\"form-control\" name=\"$fieldName\" required />";
                    $input .= "\n\t\t\t<div class=\"form-text\">Penjelasan tentang $name</div>";
                    $input .= "\n\t\t</div>";
                }

                if ($field['type'] == 'int') {
                    $input .= "\n\t\t<div class=\"mb-3\">";
                    $input .= "\n\t\t\t<label for=\"$name\" class=\"form-label\">$name</label>";
                    $input .= "\n\t\t\t<input type=\"number\" class=\"form-control\" name=\"$fieldName\" required />";
                    $input .= "\n\t\t\t<div class=\"form-text\">Penjelasan tentang $name</div>";
                    $input .= "\n\t\t</div>";
                }

                if ($field['type'] == 'text') {
                    $input .= "\n\t\t<div class=\"mb-3\">";
                    $input .= "\n\t\t\t<label for=\"$name\" class=\"form-label\">$name</label>";
                    $input .= "\n\t\t\t<textarea cols=\"5\" rows=\"5\" class=\"form-control\" name=\"$fieldName\" required /></textarea>";
                    $input .= "\n\t\t\t<div class=\"form-text\">Penjelasan tentang $name</div>";
                    $input .= "\n\t\t</div>";
                }

                if ($field['type'] == 'enum') {
                    $input .= "\n\t\t<div class=\"mb-3\">";
                    $input .= "\n\t\t\t<label for=\"$name\" class=\"form-label\">$name</label>";
                    $input .= "\n\t\t\t<select class=\"form-control\" name=\"$fieldName\" required />";
                    
                    foreach ($field['default'] as $index => $value) {
                        $option = ucfirst($value);
                        $input .= "\n\t\t\t<option value=\"$value\">$option</option>";
                    }
                    
                    $input .= "\n\t\t\t</select>";
                    $input .= "\n\t\t\t<div class=\"form-text\">Penjelasan tentang $name</div>";
                    $input .= "\n\t\t</div>";
                }
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
        foreach ($fields as $field) {
            if ($this->filter($field['name'], 'edit')) {
                
                $name = str_replace('_', ' ', ucfirst($field['name']));
                $fieldName = $field['name'];

                if ($field['type'] == 'varchar') {
                    $input .= "\n\t\t<div class=\"mb-3\">";
                    $input .= "\n\t\t\t<label for=\"$name\" class=\"form-label\">$name</label>";
                    $input .= "\n\t\t\t<input type=\"text\" class=\"form-control\" value=\"{{ $$singular->$fieldName }}\" name=\"$fieldName\" required />";
                    $input .= "\n\t\t\t<div class=\"form-text\">Penjelasan tentang $name</div>";
                    $input .= "\n\t\t</div>";
                }

                if ($field['type'] == 'int') {
                    $input .= "\n\t\t<div class=\"mb-3\">";
                    $input .= "\n\t\t\t<label for=\"$name\" class=\"form-label\">$name</label>";
                    $input .= "\n\t\t\t<input type=\"number\" class=\"form-control\" value=\"{{ $$singular->$fieldName }}\" name=\"$fieldName\" required />";
                    $input .= "\n\t\t\t<div class=\"form-text\">Penjelasan tentang $name</div>";
                    $input .= "\n\t\t</div>";
                }

                if ($field['type'] == 'text') {
                    $input .= "\n\t\t<div class=\"mb-3\">";
                    $input .= "\n\t\t\t<label for=\"$name\" class=\"form-label\">$name</label>";
                    $input .= "\n\t\t\t<textarea cols=\"5\" rows=\"5\" class=\"form-control\" name=\"$fieldName\" required />{{ $$singular->$fieldName }}</textarea>";
                    $input .= "\n\t\t\t<div class=\"form-text\">Penjelasan tentang $name</div>";
                    $input .= "\n\t\t</div>";
                }

                if ($field['type'] == 'enum') {
                    $input .= "\n\t\t<div class=\"mb-3\">";
                    $input .= "\n\t\t\t<label for=\"$name\" class=\"form-label\">$name</label>";
                    $input .= "\n\t\t\t<select class=\"form-control\" name=\"$fieldName\" required />";
                    
                    foreach ($field['default'] as $index => $value) {
                        $option = ucfirst($value);
                        $input .= "\n\t\t\t<option value=\"$value\">$option</option>";
                    }
                    
                    $input .= "\n\t\t\t</select>";
                    $input .= "\n\t\t\t<div class=\"form-text\">Penjelasan tentang $name</div>";
                    $input .= "\n\t\t</div>";
                }
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
