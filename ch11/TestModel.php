<?php

namespace ch11;

class TestModel
{
public function create() :mixed{
    return "created";
}

    public function update() :mixed{
        return "updated";
    }

    public function edit() :mixed{
        return "edited";
    }

    public function delete() :mixed{
        return "deleted";
    }
}