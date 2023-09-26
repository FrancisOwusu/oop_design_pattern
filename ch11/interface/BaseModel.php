<?php

interface  BaseModel
{
public function create(): mixed;
public function edit(): mixed;
public function update(): mixed;
public function delete(): mixed;
}