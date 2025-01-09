<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class MyProjects extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'MyProject';
    protected static ?int $navigationSort = 0;
    protected static ?string $slug = 'myprojects/project';

    protected static ?string $navigationLabel = 'My Project';
}
