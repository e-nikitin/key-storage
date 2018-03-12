<?php

namespace nikitin\KeyStorage\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use nikitin\KeyStorage\Exceptions\TableAlredyExistsException;


class CreateTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'key-storage:create-table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates KeyStorage table';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (Schema::connection(config('key-storage.connection'))->hasTable(config('key-storage.table'))) {
            throw new TableAlredyExistsException('Table ' . config('key-storage.table') . ' already exists');
        }

        Schema::connection(config('key-storage.connection'))
            ->create(config('key-storage.table'), function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('key')->unique();
                $table->tinyInteger('type')->default('string');
                $table->text('value')->nullable();
            });
    }

}