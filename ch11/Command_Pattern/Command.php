<?php

namespace Comman_Pattern;

abstract class Command
{
    abstract public function execute(CommandContext$context): bool;
}