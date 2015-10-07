<?php
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 * @copyright �2009-2015
 */
namespace Spiral\LODM\Commands;

use Illuminate\Console\Command;
use Spiral\ODM\ODM;

/**
 * Performs ODM schema update.
 */
class SchemaUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'odm:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update ODM behaviour schema.';

    /**
     * @var ODM
     */
    protected $odm = null;

    /**
     * @param ODM $odm
     */
    public function __construct(ODM $odm)
    {
        $this->odm = $odm;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $builder = $this->odm->updateSchema();

        $countModels = count($builder->getDocuments());
        $this->write(
            "<info>ODM Schema has been updated, found documents: <comment>{$countModels}</comment></info>"
        );
    }
}