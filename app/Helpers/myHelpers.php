<?php

function administrador(): \App\Models\User
{
    return \App\Models\User::where('administrador', 1)->first();
}
