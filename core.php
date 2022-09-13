<?php


function formatDate($date){
    return preg_replace('/[\.]/', '/', date('d.m.Y', strtotime($date)));
}
