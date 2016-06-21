<?php

function flash($level, $message)
{
    session()->flash('flash_message', $message);
    session()->flash('flash_level', $level);
}